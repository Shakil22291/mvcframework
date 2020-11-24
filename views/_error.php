<?php
/** @var $exception \Exception */
?>

<div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
    <h1 class="display-4 text-danger">
        <?= $exception->getCode() ?> -
        <?= $exception->getMessage() ?>
    </h1>
</div>
