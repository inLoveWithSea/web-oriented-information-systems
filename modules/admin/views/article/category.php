<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $categories */

$this->title = 'Assign Category to Article';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-form container mt-4">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation'], // Add Bootstrap 5 validation styling
    ]); ?>

    <div class="mb-3">
        <?= $form->field($article, 'category_id')->dropDownList($categories, [
            'prompt' => 'Select a Category',
            'value' => $selectedCategory,
            'class' => 'form-select' // Bootstrap 5 class for select elements
        ])->label('Category') ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
