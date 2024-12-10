<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Assign Tags to Article';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="article-form container mt-4">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <div class="mb-3">
        <?= Html::label('Tags', null, ['class' => 'form-label']) ?>
        <?= Html::dropDownList('tags', $selectedTags, $tags, [
            'class' => 'form-select', // Bootstrap 5 class for dropdowns
            'multiple' => true,
        ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
