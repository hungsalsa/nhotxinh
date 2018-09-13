<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\widgets\topNavbarWidget;
use backend\widgets\sidebarWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	
<div class="wrapper">
	<!-- ######## Sidebar -->
	<?= sidebarWidget::widget() ?>

	<div class="main-panel">
		

	<?= topNavbarWidget::widget() ?>


		<div class="content">
			<div class="container-fluid">
				<?= $content ?>
			</div>
		</div>


		<footer class="footer">
			<div class="container-fluid">
				<nav class="pull-left">
					<ul>
						<li>
							<a href="#">
								Home
							</a>
						</li>
						<li>
							<a href="#">
								Company
							</a>
						</li>
						<li>
							<a href="#">
								Portfolio
							</a>
						</li>
						<li>
							<a href="#">
								Blog
							</a>
						</li>
					</ul>
				</nav>
				
			</div>
		</footer>

	</div>
</div>


<?php $this->endBody() ?>
<?php if(Yii::$app->session->hasFlash('messeage')): ?>
<script type="text/javascript">
	demo.initChartist();

	$.notify({
		icon: 'pe-7s-gift',
		message: "<?= Yii::$app->session->getFlash('messeage') ?>"

	},{
		type: 'info',
		timer: 1200
	});
</script>
<?php endif; ?>
</body>
</html>
<?php $this->endPage() ?>
