<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerCssFile('@web/css/custom.css'); // Include the custom CSS file
?>

<div class="custom-form">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'email') ?>

        <div class="form-group">
            <?= Html::submitButton('Надіслати', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
