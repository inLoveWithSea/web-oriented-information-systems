<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\PublicAsset;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark bg-dark fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'], // Use 'ms-auto' to align menu items to the right
        'items' => [
            ['label' => 'Home', 'url' => ['/admin/default/index']],
            ['label' => 'Articles', 'url' => ['/admin/article/index']],
            ['label' => 'Comments', 'url' => ['/admin/comment/index']],
            ['label' => 'Categories', 'url' => ['/admin/category/index']],
            ['label' => 'Tags', 'url' => ['/admin/tag/index']],
        ],
    ]);

    NavBar::end();
    ?>

    <div class="container mt-5 pt-4"> <!-- Added top margin for fixed navbar space -->
        <?= Breadcrumbs::widget([
            'options' => ['class' => 'breadcrumb'], // Adjusted for Bootstrap 5
            'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n", // Use Bootstrap 5 structure
            'activeItemTemplate' => "<li class='breadcrumb-item active' aria-current='page'>{link}</li>\n",
            'links' => $this->params['breadcrumbs'] ?? [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer bg-light py-3">
    <div class="container text-center">
        <p class="mb-0">&copy; My Music Blog <?= date('Y') ?></p>
        <p class="mb-0"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

<?php $this->registerJsFile('/ckeditor/ckeditor.js'); ?>
<?php $this->registerJsFile('/ckfinder/ckfinder.js'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor(editor);
    });
</script>

</body>
</html>
<?php $this->endPage() ?>
