<?php 
use yii\helpers\Url;
use frontend\widgets\categoriesWidget;
use yii\widgets\LinkPager;
$this->title = 'ádada';
 ?>
<div class='col-md-3 sidebar'>
   <!-- ================================== TOP NAVIGATION ================================== -->
   <!-- <div class="side-menu animate-dropdown outer-bottom-xs">
         <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
         <nav class="yamm megamenu-horizontal" role="navigation">
            <ul class="nav">
               <li class="dropdown menu-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-desktop fa-fw"></i>Computer</a>
                  <ul class="dropdown-menu mega-menu">
                     <li class="yamm-content">
                        <div class="row">
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Lenovo</a></li>
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Fuhlen</a></li>
                                 <li><a href="category.html">Longsleeves</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Polos</a></li>
                                 <li><a href="category.html">Sweaters</a></li>
                                 <li><a href="category.html">Shirts</a></li>
                                 <li><a href="category.html">Hoodies</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                        </div>
                        /.row
                     </li>
                     /.yamm-content                    
                  </ul>
                  /.dropdown-menu            
               </li>
               /.menu-item
               <li class="dropdown menu-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-mobile fa-fw"></i>Smart Phone</a>
                  ================================== MEGAMENU VERTICAL ==================================
                  <ul class="dropdown-menu mega-menu">
                     <li class="yamm-content">
                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-lg-4">
                              <ul>
                                 <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                 <li><a href="#">CPUs, Processors</a></li>
                                 <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                 <li><a href="#">Graphics, Video Cards</a></li>
                                 <li><a href="#">Interface, Add-On Cards</a></li>
                                 <li><a href="#">Laptop Replacement Parts</a></li>
                                 <li><a href="#">Memory (RAM)</a></li>
                                 <li><a href="#">Motherboards</a></li>
                                 <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                 <li><a href="#">Motherboard Components &amp; Accs</a></li>
                              </ul>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-lg-4">
                              <ul>
                                 <li><a href="#">Power Supplies Power</a></li>
                                 <li><a href="#">Power Supply Testers Sound</a></li>
                                 <li><a href="#">Sound Cards (Internal)</a></li>
                                 <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                 <li><a href="#">Other</a></li>
                              </ul>
                           </div>
                           <div class="dropdown-banner-holder">
                              <a href="#"><img alt="" src="<?= Yii::$app->homeUrl?>vender/images/banners/banner-side.png" /></a>
                           </div>
                        </div>
                        /.row
                     </li>
                     /.yamm-content                    
                  </ul>
                  /.dropdown-menu
                  ================================== MEGAMENU VERTICAL ==================================            
               </li>
               /.menu-item
               <li class="dropdown menu-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-apple fa-fw"></i>Apple Store</a>
                  <ul class="dropdown-menu mega-menu">
                     <li class="yamm-content">
                        <div class="row">
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Lenovo</a></li>
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Fuhlen</a></li>
                                 <li><a href="category.html">Longsleeves</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Polos</a></li>
                                 <li><a href="category.html">Sweaters</a></li>
                                 <li><a href="category.html">Shirts</a></li>
                                 <li><a href="category.html">Hoodies</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                        </div>
                        /.row
                     </li>
                     /.yamm-content                    
                  </ul>
                  /.dropdown-menu            
               </li>
               /.menu-item
               <li class="dropdown menu-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-camera fa-fw"></i>Camera</a>
                  <ul class="dropdown-menu mega-menu">
                     <li class="yamm-content">
                        <div class="row">
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Lenovo</a></li>
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Fuhlen</a></li>
                                 <li><a href="category.html">Longsleeves</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Polos</a></li>
                                 <li><a href="category.html">Sweaters</a></li>
                                 <li><a href="category.html">Shirts</a></li>
                                 <li><a href="category.html">Hoodies</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                        </div>
                        /.row
                     </li>
                     /.yamm-content                    
                  </ul>
                  /.dropdown-menu            
               </li>
               /.menu-item
               <li class="dropdown menu-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-headphones fa-fw"></i>TV & Audio</a>
                  <ul class="dropdown-menu mega-menu">
                     <li class="yamm-content">
                        <div class="row">
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Lenovo</a></li>
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Fuhlen</a></li>
                                 <li><a href="category.html">Longsleeves</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Polos</a></li>
                                 <li><a href="category.html">Sweaters</a></li>
                                 <li><a href="category.html">Shirts</a></li>
                                 <li><a href="category.html">Hoodies</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                        </div>
                        /.row
                     </li>
                     /.yamm-content                    
                  </ul>
                  /.dropdown-menu            
               </li>
               /.menu-item
               <li class="dropdown menu-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-gamepad fa-fw"></i>Game & Video</a>
                  <ul class="dropdown-menu mega-menu">
                     <li class="yamm-content">
                        <div class="row">
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Lenovo</a></li>
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Fuhlen</a></li>
                                 <li><a href="category.html">Longsleeves</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Polos</a></li>
                                 <li><a href="category.html">Sweaters</a></li>
                                 <li><a href="category.html">Shirts</a></li>
                                 <li><a href="category.html">Hoodies</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                        </div>
                        /.row
                     </li>
                     /.yamm-content                    
                  </ul>
                  /.dropdown-menu            
               </li>
               /.menu-item
               <li class="dropdown menu-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-location-arrow fa-fw"></i>Car Electronic</a>
                  <ul class="dropdown-menu mega-menu">
                     <li class="yamm-content">
                        <div class="row">
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Lenovo</a></li>
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Fuhlen</a></li>
                                 <li><a href="category.html">Longsleeves</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Polos</a></li>
                                 <li><a href="category.html">Sweaters</a></li>
                                 <li><a href="category.html">Shirts</a></li>
                                 <li><a href="category.html">Hoodies</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                        </div>
                        /.row
                     </li>
                     /.yamm-content                    
                  </ul>
                  /.dropdown-menu            
               </li>
               /.menu-item
               <li class="dropdown menu-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-history fa-fw"></i>Old Products</a>
                  ================================== MEGAMENU VERTICAL ==================================
                  <ul class="dropdown-menu mega-menu">
                     <li class="yamm-content">
                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-lg-4">
                              <ul>
                                 <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                 <li><a href="#">CPUs, Processors</a></li>
                                 <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                 <li><a href="#">Graphics, Video Cards</a></li>
                                 <li><a href="#">Interface, Add-On Cards</a></li>
                                 <li><a href="#">Laptop Replacement Parts</a></li>
                                 <li><a href="#">Memory (RAM)</a></li>
                                 <li><a href="#">Motherboards</a></li>
                                 <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                 <li><a href="#">Motherboard Components &amp; Accs</a></li>
                              </ul>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-lg-4">
                              <ul>
                                 <li><a href="#">Power Supplies Power</a></li>
                                 <li><a href="#">Power Supply Testers Sound</a></li>
                                 <li><a href="#">Sound Cards (Internal)</a></li>
                                 <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                 <li><a href="#">Other</a></li>
                              </ul>
                           </div>
                           <div class="dropdown-banner-holder">
                              <a href="#"><img alt="" src="<?= Yii::$app->homeUrl?>vender/images/banners/banner-side.png" /></a>
                           </div>
                        </div>
                        /.row
                     </li>
                     /.yamm-content                    
                  </ul>
                  /.dropdown-menu
                  ================================== MEGAMENU VERTICAL ==================================            
               </li>
               /.menu-item
               <li class="dropdown menu-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-microphone fa-fw"></i>Accessories</a>
                  <ul class="dropdown-menu mega-menu">
                     <li class="yamm-content">
                        <div class="row">
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Lenovo</a></li>
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Fuhlen</a></li>
                                 <li><a href="category.html">Longsleeves</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Polos</a></li>
                                 <li><a href="category.html">Sweaters</a></li>
                                 <li><a href="category.html">Shirts</a></li>
                                 <li><a href="category.html">Hoodies</a></li>
                              </ul>
                           </div>
                           /.col
                           <div class="col-sm-12 col-md-3">
                              <ul class="links list-unstyled">
                                 <li><a href="category.html">Microsoft</a></li>
                                 <li><a href="category.html">Apple</a></li>
                                 <li><a href="category.html">Tees & Tanks</a></li>
                                 <li><a href="category.html">Graphic Tees</a></li>
                              </ul>
                           </div>
                           /.col
                        </div>
                        /.row
                     </li>
                     /.yamm-content                    
                  </ul>
                  /.dropdown-menu            
               </li>
               /.menu-item
            </ul>
            /.nav
         </nav>
         /.megamenu-horizontal
      </div>
      /.side-menu
       -->   
   <?= categoriesWidget::widget() ?>
   <!-- ================================== TOP NAVIGATION : END ================================== -->                  
   <!-- <div class="sidebar-module-container">
      <h3 class="section-title">shop by</h3>
      <div class="sidebar-filter">
         
         ============================================== PRICE SILDER==============================================
         <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
            <div class="widget-header">
               <h4 class="widget-title">Price Slider</h4>
            </div>
            <div class="sidebar-widget-body m-t-20">
               <div class="price-range-holder">
                  <span class="min-max">
                  <span class="pull-left">$2000.00</span>
                  <span class="pull-right">$8000.00</span>
                  </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" value="" >
               </div>
               /.price-range-holder
               <a href="#" class="lnk btn btn-primary">Show Now</a>
            </div>
            /.sidebar-widget-body
         </div>
         /.sidebar-widget
         ============================================== PRICE SILDER : END ==============================================
         ============================================== MANUFACTURES==============================================
         <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
            <div class="widget-header">
               <h4 class="widget-title">Manufactures</h4>
            </div>
            <div class="sidebar-widget-body m-t-10">
               <ul class="list">
                  <li><a href="#">Forever 18</a></li>
                  <li><a href="#">Nike</a></li>
                  <li><a href="#">Dolce & Gabbana</a></li>
                  <li><a href="#">Alluare</a></li>
                  <li><a href="#">Chanel</a></li>
                  <li><a href="#">Other Brand</a></li>
               </ul>
               <a href="#" class="lnk btn btn-primary">Show Now</a>
            </div>
            /.sidebar-widget-body
         </div>
         /.sidebar-widget
         ============================================== MANUFACTURES: END ==============   ================================
         
         ============================================== PRODUCT TAGS ==============================================
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
               /.tag-list
            </div>
            /.sidebar-widget-body
         </div>
         /.sidebar-widget
         ============================================== PRODUCT TAGS : END ==============================================                          ============================================== COLOR==============================================
         <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
            <div id="advertisement" class="advertisement">
               <div class="item bg-color">
                  <div class="container-fluid">
                     <div class="caption vertical-top text-left">
                        <div class="big-text">
                           Save<span class="big">50%</span>
                        </div>
                        <div class="excerpt">
                           on selected items
                        </div>
                     </div>
                     /.caption
                  </div>
                  /.container-fluid
               </div>
               /.item
               <div class="item" style="background-image: url('<?= Yii::$app->homeUrl?>vender/images/advertisement/1.jpg');">
               </div>
               /.item
               <div class="item bg-color">
                  <div class="container-fluid">
                     <div class="caption vertical-top text-left">
                        <div class="big-text">
                           Save<span class="big">50%</span>
                        </div>
                        <div class="excerpt fadeInDown-2">
                           on selected items
                        </div>
                     </div>
                     /.caption
                  </div>
                  /.container-fluid
               </div>
               /.item
            </div>
            /.owl-carousel
         </div>
         ============================================== COLOR: END ==============================================
      </div>
      /.sidebar-filter
   </div> -->
   <!-- /.sidebar-module-container -->
</div>
<!-- /.sidebar -->
<div class='col-md-9'>
   <!-- ========================================== SECTION – HERO ========================================= -->
   <div id="category" class="category-carousel hidden-xs">
      <div class="item">
         <div class="image">
            <img src="<?= Yii::$app->homeUrl?>vender/images/banners/fashion.jpg" alt="" class="img-responsive">
         </div>
         <div class="container-fluid">
            <div class="caption vertical-top text-left">
               <div class="big-text">
                  Sale
               </div>
               <div class="excerpt hidden-sm hidden-md">
                  up to 50% off
               </div>
            </div>
            <!-- /.caption -->
         </div>
         <!-- /.container-fluid -->
      </div>
   </div>
   <!-- ========================================= SECTION – HERO : END ========================================= -->
   <div class="clearfix filters-container m-t-10">
      <div class="row">
         <div class="col col-sm-6 col-md-2">
            <div class="filter-tabs">
               <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active">
                     <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-list"></i>Grid</a>
                  </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th"></i>List</a></li>
               </ul>
            </div>
            <!-- /.filter-tabs -->
         </div>
         <!-- /.col -->
        <!--  <div class="col col-sm-12 col-md-6">
           <div class="col col-sm-3 col-md-6 no-padding">
              <div class="lbl-cnt">
                 <span class="lbl">Sort by</span>
                 <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                       <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                       Position <span class="caret"></span>
                       </button>
                       <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                       </ul>
                    </div>
                 </div>
                 /.fld
              </div>
              /.lbl-cnt
           </div>
           /.col
           <div class="col col-sm-3 col-md-6 no-padding">
              <div class="lbl-cnt">
                 <span class="lbl">Show</span>
                 <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                       <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                       1 <span class="caret"></span>
                       </button>
        
                       <ul role="menu" class="dropdown-menu">
        
                          <li role="presentation"><a href="#">1</a></li>
                          <li role="presentation"><a href="#">2</a></li>
                          <li role="presentation"><a href="#">3</a></li>
                          <li role="presentation"><a href="#">4</a></li>
                          <li role="presentation"><a href="#">5</a></li>
                          <li role="presentation"><a href="#">6</a></li>
                          <li role="presentation"><a href="#">7</a></li>
                          <li role="presentation"><a href="#">8</a></li>
                          <li role="presentation"><a href="#">9</a></li>
                          <li role="presentation"><a href="#">10</a></li>
                       </ul>
                    </div>
                 </div>
                 /.fld
              </div>
              /.lbl-cnt
           </div>
           /.col
        </div>
        /.col -->
         <div class="col col-sm-6 col-md-10">
            <div class="text-right">
                <?php
                  echo    LinkPager::widget([
                        'pagination' => $pages,
                        'firstPageLabel'=>'|<',
                        'lastPageLabel'=>'>|',
                        'prevPageLabel'=>'<<',
                        'nextPageLabel'=>'>>',
                        'maxButtonCount'=>3,
                        // 'linkAttributes'=>['class' => 'page-link'],
                        // 'route' => 'article/index'
                        // 'pageParam' => 'page',

                     ]);
                   ?>
               <!-- /.list-inline -->
            </div>
            <!-- /.pagination-container -->     
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <div class="search-result-container">
      <div id="myTabContent" class="tab-content">
         <div class="tab-pane active" id="grid-container">
            <div class="category-product  inner-top-vs">
               <div class="row">
                  <?php $i=1; foreach ($productCat as $value): ?>
                  <div class="col-sm-6 col-md-4">
                     <div class="products">
                        <div class="product">
                           <div class="product-image">
                              <div class="image">
                                
                                 <ahref="<?= Url::to(['product/view', 'slug' => $value['slug']]) ?>"><img id="img_<?= $value['id'] ?>"  src="<?= Yii::$app->homeUrl ?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl.$value['image'] ?>" alt="<?= 'sad' ?>" width="98%"></a>
                              </div>
                              <!-- /.image -->  
                              <?php 
                                 $product_type_id = json_decode($value['product_type_id']); 
                                 if(!empty($product_type_id)){
                                    $product_type = $dataProType[$product_type_id[array_rand($product_type_id)]];
                                 }
                              ?> 
                              <div class="tag <?= (isset($product_type))? $product_type :'' ?>"><span><?= (isset($product_type))? $product_type :'' ?></span></div>
                           </div>
                           <!-- /.product-image -->
                           <div class="product-info text-left">
                              <h3 class="name"><a id="txtPro_<?= $value['id'] ?>" href="<?= Url::to(['product/view', 'slug' => $value['slug']]) ?>"><?= $value['pro_name'] ?></a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price">   
                                 <span class="price" id="txtPrice_<?= $value['id'] ?>">
                                 <?= number_format((int)$value['price_sales'], 0, ',', '.');  ?> VNĐ                </span>
                                 <span class="price-before-discount"><?= ($value['price'])?number_format((int)$value['price_sales'], 0, ',', '.').' VNĐ':'' ?></span>
                              </div>
                              <!-- /.product-price -->
                           </div>
                           <!-- /.product-info -->
                           <div class="cart clearfix animate-effect">
                              <div class="action">
                                 <button class="btn btn-primary" type="button" onclick="addCart(<?= $value['id'] ?>,1)">Add to cart</button>
                                 <button class="left btn btn-primary" type="button"><i class="icon fa fa-heart"></i></button>
                                 <button class="left btn btn-primary" type="button"><i class="fa fa-retweet"></i></button>                      
                              </div>
                              <!-- /.action -->
                           </div>
                           <!-- /.cart -->
                        </div>
                        <!-- /.product -->
                     </div>
                     <!-- /.products -->
                  </div>
                  <!-- /.item -->
                  <?php if ($i%3==0): ?>
                     <div class="clearfix"></div>
                  <?php endif ?>
                  <?php $i++; endforeach ?>
               </div>
               <!-- /.row -->
            </div>
            <!-- /.category-product -->
         </div>
         <!-- /.tab-pane -->
         <div class="tab-pane"  id="list-container">
            <div class="category-product inner-top-vs">
               <?php foreach ($productCat as $value): ?>
               <div class="category-product-inner">
                  <div class="products">
                     <div class="product-list product">
                        <div class="row product-list-row">
                           <div class="col col-sm-4 col-lg-4">
                              <div class="product-image">
                                 <div class="image">
                                    <img id="img_<?= $value['id'] ?>" width="98%" data-echo="<?= Yii::$app->homeUrl.$value['image'] ?>" src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" alt="">
                                 </div>
                              </div>
                              <!-- /.product-image -->
                           </div>
                           <!-- /.col -->
                           <div class="col col-sm-8 col-lg-8">
                              <div class="product-info">
                                 <h3 class="name"><a id="txtPro_<?= $value['id'] ?>" href="<?= Yii::$app->homeUrl.'product/view/'.$value['id'] ?>"><?= $value['pro_name'] ?></a></h3>
                                 <div class="rating rateit-small"></div>
                                 <div class="product-price">    
                                    <span class="price">
                                    <?= number_format((int)$value['price_sales'], 0, ',', '.');  ?> VNĐ                 </span>
                                    <span class="price-before-discount"> <?= ($value['price'])? number_format((int)$value['price_sales'], 0, ',', '.').' VNĐ':'' ?></span>
                                 </div>
                                 <!-- /.product-price -->
                                 <div class="description m-t-10"><?= $value['short_introduction'] ?></div>
                                 <div class="cart clearfix animate-effect">
                                    <div class="action">
                                       <button class="btn btn-primary" type="button">Add to cart</button>
                                       <button class="left btn btn-primary" type="button"><i class="icon fa fa-heart"></i></button>
                                       <button class="left btn btn-primary" type="button"><i class="fa fa-retweet"></i></button>                        
                                    </div>
                                    <!-- /.action -->
                                 </div>
                                 <!-- /.cart -->
                              </div>
                              <!-- /.product-info -->   
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.product-list-row -->
                        <?php 
                           $product_type_id = json_decode($value['product_type_id']); 
                           if(!empty($product_type_id)){
                              $product_type = $dataProType[$product_type_id[array_rand($product_type_id)]];
                           }
                        ?> 

                        <div class="tag <?= (isset($product_type))? $product_type:'' ?>"><span><?= (isset($product_type))? $product_type:'' ?></span></div>

                     </div>
                     <!-- /.product-list -->
                  </div>
                  <!-- /.products -->
               </div>
               <!-- /.category-product-inner -->
               <?php endforeach ?>
            </div>
            <!-- /.category-product -->
         </div>
         <!-- /.tab-pane #list-container -->
      </div>
      <!-- /.tab-content -->
      <div class="clearfix filters-container">
         <div class="text-right">
              
                  <?php
                  echo    LinkPager::widget([
                        'pagination' => $pages,
                        'firstPageLabel'=>'|<',
                        'lastPageLabel'=>'>|',
                        'prevPageLabel'=>'<<',
                        'nextPageLabel'=>'>>',
                        'maxButtonCount'=>3,
                        // 'linkAttributes'=>['class' => 'page-link'],
                        // 'route' => 'article/index'
                        // 'pageParam' => 'page',

                     ]);
                   ?>
                  <!-- <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li> -->
               <!-- /.list-inline -->
            <!-- /.pagination-container -->                             
         </div>
         <!-- /.text-right -->
      </div>
      <!-- /.filters-container -->
   </div>
   <!-- /.search-result-container -->
</div>
<!-- /.col -->

<!-- 'options' => ['class' => 'page-item'],
    //First option value
    'firstPageLabel' => '&nbsp;',
    //Last option value
    'lastPageLabel' => '&nbsp;',
    //Previous option value
    'prevPageLabel' => '&nbsp;',
    //Next option value
    'nextPageLabel' => '&nbsp;',
    //Current Active option value
    'activePageCssClass' => 'active',
    //Max count of allowed options
    'maxButtonCount' => 8,
    'disableCurrentPageButton'=>true,

    // Css for each options. Links
    'linkOptions' => ['class' => ''],
    'disabledPageCssClass' => 'disabled',

    // Customzing CSS class for navigating link
    'prevPageCssClass' => 'prev',
    'nextPageCssClass' => 'next',
    'firstPageCssClass' => 'p-first',
    'lastPageCssClass' => 'p-last', -->