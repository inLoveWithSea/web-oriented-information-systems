<?php
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Register now!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup container mt-5 mb-5"> <!-- Added mb-5 for spacing -->
    <h1 class="text-center mb-4"><?= Html::encode($this->title) ?></h1>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'card p-4 shadow'],
                'fieldConfig' => [
                    'template' => "<div class='mb-3'>{label}\n{input}\n{error}</div>",
                    'labelOptions' => ['class' => 'form-label'],
                    'inputOptions' => ['class' => 'form-control'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Enter your username']) ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Enter your email']) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Enter your password']) ?>

            <div class="d-flex justify-content-center mt-3">
                <?= Html::submitButton('Register', ['class' => 'btn btn-primary btn-lg', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
