<?php use frontend\widgets\cartWidget; ?>
<div class="main-header">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo">
               <a href="<?= Yii::$app->homeUrl ?>">
               <img src="<?= Yii::$app->homeUrl ?>vender/images/logo.png" alt="">
               </a>
            </div>
            <!-- /.logo -->
            <!-- ============================================================= LOGO : END ============================================================= -->             
         </div>
         <!-- /.logo-holder -->
         <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
            <div class="contact-row">
               <div class="phone inline">
                  <i class="icon fa fa-phone"></i> (400) 888 888 868
               </div>
               <div class="contact inline">
                  <i class="icon fa fa-envelope"></i> saler@unicase.com
               </div>
            </div>
            <!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
               <form action="tim-kiem" method="get">
                  <div class="control-group">
                     <!-- <ul class="categories-filter animate-dropdown">
                        <li class="dropdown">
                           <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                           <ul class="dropdown-menu" role="menu" >
                              <li class="menu-header">Computer</li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Laptops</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Tv & audio</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Gadgets</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Cameras</a></li>
                           </ul>
                        </li>
                     </ul> -->
                     <input type="text" class="search-field" name="key" placeholder="Nhập từ khóa tìm kiếm..." style="width: 90%;" value="<?= (isset($_GET['key'])? $_GET['key']:'' ) ; ?>" />
                     <input type="submit" class="inputsubmitsearch" />    
                  </div>
               </form>
            </div>
            <!-- /.search-area -->
            <!-- ============================================================= SEARCH AREA : END ============================================================= -->              
         </div>
         <!-- /.top-search-holder -->
         <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            <?= cartWidget::widget() ?>
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->                
         </div>
         <!-- /.top-cart-row -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</div>
<!-- /.main-header -->