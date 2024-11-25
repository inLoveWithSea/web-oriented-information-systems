<?php
use yii\helpers\Html;
$this->registerCssFile('@web/css/custom.css'); // Include the custom CSS file
?>

<p>Ви вказали наступну інформацію:</p>

<div class="info-display">
    <ul>
        <li><label>Ім’я</label>: <?= Html::encode($model->name) ?></li>
        <li><label>Адреса електронної пошти</label>: <?= Html::encode($model->email) ?></li>
    </ul>
</div>
