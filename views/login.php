<?php /** @var App\Models\User $model */ ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mb-2">
            <h2 class="display-4">Login</h2>

            <?php $form = App\core\Form\Form::begin('', 'post') ?>

            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->password() ?>

            <button type="submit" class="btn btn-primary">Submit</button>
            <?php App\core\Form\Form::end() ?>
        </div>
    </div>
</div>
