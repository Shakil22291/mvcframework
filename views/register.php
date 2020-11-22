<?php /** @var App\Models\User $model */ ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mb-2">
            <h2 class="display-4">Register yourself</h2>

            <?php $form = App\core\Form\Form::begin('', 'post') ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->field($model, 'firstname') ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->field($model, 'lastname') ?>
                    </div>
                </div>
                <?php echo $form->field($model, 'email') ?>
                <?php echo $form->field($model, 'password')->passwordField() ?>
                <?php echo $form->field($model, 'passwordConfirmation')->passwordField() ?>

                <button type="submit" class="btn btn-primary">Submit</button>
            <?php App\core\Form\Form::end() ?>
        </div>
    </div>
</div>
