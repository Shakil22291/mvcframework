<?php

namespace App\Core\Form;

abstract class BaseField
{
    abstract public function renderInput(): string;

    public function __toString(): string
    {
        return sprintf(
            '
                <div class="form-group">
                    <label>%s</label>
                    %s
                    <div class="invalid-feedback">%s</div>
                </div>
            ',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}