<?php
/**
 * @var $this App\Core\View
 * @var $model App\Models\ContactForm
 */

 $this->title = "Contact us";
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 mb-2">
            <h3 class="dispaly-3">contact with <?= $name ?></h3>
            <?php $form = App\core\Form\Form::begin('', 'post') ?>
            <?= $form->field($model, 'subject'); ?>
            <?= $form->field($model, 'email')->email(); ?>
            <?= $form->field($model, 'body'); ?>
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            <?php $form = App\core\Form\Form::end() ?>
        </div>
    </div>
</div>