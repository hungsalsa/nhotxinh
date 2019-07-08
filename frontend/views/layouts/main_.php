<?php
use yii\helpers\Html;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\topMenu;
use frontend\widgets\mainHeader;
use frontend\widgets\headerNav;
use frontend\widgets\index\brandsCarousel;
use frontend\widgets\footerWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="icon" type="image/ico" sizes="16x16" href="<?=Yii::$app->homeUrl ?>images/favicon.ico">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="cnt-home">
    <?php $this->beginBody() ?>
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?= topMenu::widget() ?>
        <!-- ============================================== HEADER : END ============================================== -->
        <!-- ============================================== mainHeader : Start ============================================== -->
        <?= mainHeader::widget() ?>
        <!-- ============================================== mainHeader : END ============================================== -->
        <!-- ============================================== NAVBAR ============================================== -->

        <?= headerNav::widget() ?>
        <!-- ============================================== NAVBAR : END ============================================== -->
    </header>
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <?= $content ?>
            </div>
            <!-- /.row -->
                <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <?= brandsCarousel::widget() ?>
                <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->
    <!-- ============================================================= FOOTER ============================================================= -->
    <?= footerWidget::widget() ?>
    <!-- ============================================================= FOOTER : END============================================================= -->

    





    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>