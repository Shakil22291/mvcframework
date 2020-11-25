<?php

namespace App\core\Form;

use App\core\Model;
use App\Core\Form\BaseField;

class InputField extends BaseField
{
    public const TYPE_TEXT     = 'text';
    public const TYPE_EMAIL    = 'email';
    public const TYPE_NUMBER   = 'number';
    public const TYPE_PASSWORD = 'password';

    public string $type;

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;

        parent::__construct($model, $attribute);
    }

    public function renderInput(): string
    {
        return sprintf(
            '<input type="%s" name="%s" value="%s" class="form-control %s">',
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
        );
    }

    public function password(): InputField
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function email()
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }
}
