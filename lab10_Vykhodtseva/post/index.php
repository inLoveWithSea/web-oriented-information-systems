<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->registerCssFile('@web/css/blog.css');

$this->title = 'Modern Music Blog';
?>
<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h2><?= Html::encode($post->title) ?></h2>
            <p><?= Html::encode($post->content) ?></p>
            <p><small>Posted on: <?= Yii::$app->formatter->asDatetime($post->created_at) ?></small></p>
            <hr>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No posts found.</p>
<?php endif; ?>
<?= LinkPager::widget(['pagination' => $pagination]) ?>