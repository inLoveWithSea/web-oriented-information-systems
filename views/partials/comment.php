<?php if(!empty($comments)): ?>

    <?php foreach($comments as $comment): ?>
        <div class="bottom-comment d-flex mb-4"><!-- bottom comment -->

            <div class="comment-text flex-grow-1">
                <a href="#" class="replay btn pull-right">Reply</a>
                <h5 class="mb-1"><?= $comment->user->username; ?></h5>

                <p class="comment-date text-muted small mb-2">
                    <?= $comment->getDate(); ?>
                </p>

                <p class="para mb-0"><?= $comment->text; ?></p>
            </div>
        </div>
    <?php endforeach; ?>

<?php endif; ?>
<!-- end bottom comment -->

<?php if(!Yii::$app->user->isGuest): ?>
    <div class="leave-comment mt-5"><!-- leave comment -->
        <h4>Leave a reply</h4>
        <?php if(Yii::$app->session->getFlash('comment')): ?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('comment'); ?>
            </div>
        <?php endif; ?>
        <?php $form = \yii\widgets\ActiveForm::begin([
            'action' => ['site/comment', 'id' => $article->id],
            'options' => ['class' => 'contact-form', 'role' => 'form']
        ]) ?>
        <div class="mb-3">
            <?= $form->field($commentForm, 'comment')->textarea([
                'class' => 'form-control', 
                'placeholder' => 'Write a message',
                'rows' => 4
            ])->label(false) ?>
        </div>
        <button type="submit" class="btn send-btn">Post Comment</button>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div><!-- end leave comment -->
<?php endif; ?>
