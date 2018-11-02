<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use frontend\widgets\categoryWidget;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
// echo '<pre>';
// print_r($dataNew);
?>
<div class="col-md-9">
	<?php if (!empty($dataNew)): ?>
		<?php foreach ($dataNew as $value): ?>
		
		<div class="blog-post wow fadeInUp">
			<!-- Lamf anhr cỡ lớn cho trường images_category
			<a href="blog-details.html"><img class="img-responsive" src="" alt=""></a>
			 -->
			<h2><?= Html::a(Html::encode($value['name']),Url::to($value['link'].'.html')) ?></h2>
			<span class="author"><?= $value['user_add'] ?></span>
			<span class="review">6 Comments</span>
			<span class="date-time">14/06/2014 11.00AM</span>
			<p><?= Html::decode($value['short_description']) ?></p>
			<a href="<?= $value['link'].'.html' ?>" class="btn btn-upper btn-primary read-more">read more</a>
		</div>
		<?php endforeach ?>
	<?php endif ?>
	
	<div class="clearfix blog-pagination filters-container  wow fadeInUp outer-top-bd">
		<div class="text-right">
			<div class="pagination-container">
				<ul class="list-inline list-unstyled">
					<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
					<li><a href="#">1</a></li>
					<li class="active"><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
				</ul>
				<!-- /.list-inline -->
			</div>
			<!-- /.pagination-container -->    
		</div>
		<!-- /.text-right -->
	</div>
	<!-- /.filters-container -->				
</div>
<div class="col-md-3 sidebar">
	<div class="sidebar-module-container">
		
		<!-- ==============================================CATEGORY============================================== -->
		<?= categoryWidget::widget() ?>
		<!-- ============================================== CATEGORY : END ============================================== -->						
		<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
			<h3 class="section-title">tab widget</h3>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
				<li><a href="#recent" data-toggle="tab">recent post</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active m-t-20" id="popular">
					<div class="blog-post inner-bottom-30 " >
						<img class="img-responsive" src="<?= Yii::$app->homeUrl ?>vender/images/blog-post/sm1.jpg" alt="">
						<h4><a href="blog-details.html">Simple Blog Post</a></h4>
						<span class="author">Michael</span>
						<span class="review">6 Comments</span>
						<span class="date-time">24/06/14</span>
						<p>Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros.</p>
					</div>
					<div class="blog-post" >
						<img class="img-responsive" src="<?= Yii::$app->homeUrl ?>vender/images/blog-post/sm2.jpg" alt="">
						<h4><a href="blog-details.html">Simple Blog Post</a></h4>
						<span class="author">Michael</span>
						<span class="review">6 Comments</span>
						<span class="date-time">24/06/14</span>
						<p>Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros.</p>
					</div>
				</div>
				<div class="tab-pane m-t-20" id="recent">
					<div class="blog-post inner-bottom-30" >
						<img class="img-responsive" src="<?= Yii::$app->homeUrl ?>vender/images/blog-post/sm2.jpg" alt="">
						<h4><a href="blog-details.html">Simple Blog Post</a></h4>
						<span class="author">Michael</span>
						<span class="review">6 Comments</span>
						<span class="date-time">24/06/14</span>
						<p>Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros.</p>
					</div>
					<div class="blog-post">
						<img class="img-responsive" src="<?= Yii::$app->homeUrl ?>vender/images/blog-post/sm1.jpg" alt="">
						<h4><a href="blog-details.html">Simple Blog Post</a></h4>
						<span class="author">Michael</span>
						<span class="review">6 Comments</span>
						<span class="date-time">24/06/14</span>
						<p>Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================== PRODUCT TAGS ============================================== -->
		<div class="sidebar-widget product-tag wow fadeInUp">
			<h3 class="section-title">Product tags</h3>
			<div class="sidebar-widget-body outer-top-xs">
				<div class="tag-list">					
					<a class="item" title="Phone" href="category.html">Phone</a>
					<a class="item active" title="Vest" href="category.html">Vest</a>
					<a class="item" title="Smartphone" href="category.html">Smartphone</a>
					<a class="item" title="Furniture" href="category.html">Furniture</a>
					<a class="item" title="T-shirt" href="category.html">T-shirt</a>
					<a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
					<a class="item" title="Sneaker" href="category.html">Sneaker</a>
					<a class="item" title="Toys" href="category.html">Toys</a>
					<a class="item" title="Rose" href="category.html">Rose</a>
				</div>
				<!-- /.tag-list -->
			</div>
			<!-- /.sidebar-widget-body -->
		</div>
		<!-- /.sidebar-widget -->
		<!-- ============================================== PRODUCT TAGS : END ============================================== -->					
	</div>
</div>