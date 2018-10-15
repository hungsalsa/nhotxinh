<?php
use frontend\widgets\categoryWidget;
use frontend\widgets\productTagsWidget;
use frontend\widgets\newTagsWidget;
use frontend\widgets\socialMediaWidget;
use frontend\widgets\socialCommentWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\News */
// echo '<pre>';
// print_r($newInfo);
$this->title = $newInfo['htmltitle'];
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-md-9">
    <div class="blog-post wow fadeInUp">
        <section class="content">
            <h1><?= $newInfo['name'] ?></h1>
            <span class="author">Michael</span>
            <span class="review">6 Comments</span>
            <span class="date-time">14/06/2014 11.00AM</span>
            <article>
                <?= $newInfo['content'] ?>
            </article>

            <div class="social-media">
                <span>share post:</span>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href=""><i class="fa fa-rss"></i></a>
                <a href="" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
            </div>
        </section>
        <section class="social">
            <?= socialMediaWidget::widget() ?>
            <?= socialCommentWidget::widget() ?>
        </section>
    </div>
</div>
<div class="col-md-3 sidebar">
    <div class="sidebar-module-container">
        <?= categoryWidget::widget() ?>
        <?= productTagsWidget::widget() ?>
        <?= newTagsWidget::widget() ?>
    </div>
</div>
