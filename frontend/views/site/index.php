<?php
use frontend\widgets\sectionHeroWidget;
use frontend\widgets\newProductWidget;
use frontend\widgets\wideProductsWidget;
use frontend\widgets\wideBannersWidget;
use frontend\widgets\featuredProductsWidget;
use frontend\widgets\wideBanners2Widget;
use frontend\widgets\bestSellerWidget;
use frontend\widgets\blogSliderWidget;
use frontend\widgets\brandsCarouselWidget;
/* @var $this yii\web\View */

$this->title = 'Chào mừng đến với nhớt xinh.vn';
?>

	<!-- ========================================== SECTION – HERO ========================================= -->
	<?= sectionHeroWidget::widget() ?>    
	<!-- ========================================= SECTION – HERO : END ========================================= -->   
	<div class="container">
		
		<!-- ============================================== WIDE PRODUCTS ============================================== -->
		<?= wideProductsWidget::widget() ?>    
		<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
		<!-- ============================================== NEW PRODUCT ============================================== -->
		<?= newProductWidget::widget() ?>  
		<!-- ============================================== NEW PRODUCT : END ============================================== -->
		<!-- ============================================== WIDE BANNERS ============================================== -->
		<?= wideBannersWidget::widget() ?>  

		<!-- ============================================== WIDE BANNERS : END ============================================== -->
		<!-- ============================================== FEATURED PRODUCTS ============================================== -->
		<?= featuredProductsWidget::widget() ?>  
		<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
		<!-- ============================================== WIDE BANNERS ============================================== -->
		<?= wideBanners2Widget::widget() ?>  
		<!-- ============================================== WIDE BANNERS : END ============================================== -->
		<!-- ============================================== BEST SELLER ============================================== -->
		<?= bestSellerWidget::widget() ?>  
		<!-- ============================================== BEST SELLER : END ============================================== -->
		<!-- ============================================== BLOG SLIDER ============================================== -->
		<?= blogSliderWidget::widget() ?>  
		<!-- ============================================== BLOG SLIDER : END ============================================== -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		<?= brandsCarouselWidget::widget() ?> 
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
	</div><!-- /.container -->
