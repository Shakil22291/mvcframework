<?php

namespace App\Core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public array $errors;

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules(): array;

    /**
     * core of teh validation
     *
     * @return bool errors
     */
    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }

                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addError($attribute, self::RULE_MATCH, $rule);
                }
            }
        }

        return empty($this->errors);
    }

    /**
     * Sore error in the object error property
     *
     * @param string $attribute The actual input field name
     * @param string $rule
     * @param array $params
     * @return void
     */
    public function addError(string $attribute, string $rule, $params = [])
    {
        $message = $this->errorMessage()[$rule] ?? '';

        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }

        $this->errors[$attribute][] = $message;
    }

    /**
     * Store all the validation Error message
     *
     * @return array messages
     */
    public function errorMessage()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This must should be a valid email address',
            self::RULE_MIN => 'The minimam length of this field must be {min}',
            self::RULE_MAX => 'This length of this field must be {max}',
            self::RULE_MATCH => '{match} is not mached',
        ];
    }

    public function hasError($arribute)
    {
        return $this->errors[$arribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }
}
