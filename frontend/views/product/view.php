<?php 
use frontend\widgets\categoryWidget;
$this->title = $product['title']; 

?> 
<?php
       //   echo '<pre>';
       // print_r($related_products);
         ?>
<div class='col-md-9'>
   <div class="row  wow fadeInUp">
      <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
         <div class="product-item-holder size-big single-product-gallery small-gallery">
            <div id="owl-single-product">
               
               <?php if (count($listImg)): $i=1;?>
                  <?php foreach ($listImg as $value): ?>
                  
                  <div class="single-product-gallery-item" id="slide<?= $i ?>">
                     <a data-lightbox="image-1" data-title="Gallery" href="<?= Yii::$app->homeUrl.$value['image']?>">
                     <img id="img_<?= $value['pro_id'] ?>" class="img-responsive" alt="<?= $value['alt'] ?>" src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl.$value['image']?>?>" />
                     </a>
                  </div>
                  <?php $i++ ?>
                  <!-- /.single-product-gallery-item -->
                  <?php endforeach ?>
               <?php endif ?>
            </div>
            <!-- /.single-product-slider -->
            <div class="single-product-gallery-thumbs gallery-thumbs">
               <div id="owl-single-product-thumbnails">
                  <?php if (count($listImg)): $j=0;?>
                     <?php foreach ($listImg as $listimg): ?>
                  <div class="item">
                     <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?= $j ?>" href="#slide<?= $j ?>">
                     <img class="img-responsive" width="85" alt="<?= $listimg['alt'] ?>" src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl.$listimg['image']?>"/>
                     </a>
                  </div>
                     <?php $j++; endforeach ?>
                  <?php endif ?>
                  
               </div>
               <!-- /#owl-single-product-thumbnails -->
            </div>
            <!-- /.gallery-thumbs -->
         </div>
         <!-- /.single-product-gallery -->
      </div>
      <!-- /.gallery-holder -->        			
      <div class='col-sm-6 col-md-7 product-info-block'>
         <div class="product-info">
            <h1 class="name" id="txtPro_<?= $product['id'] ?>"><?= $product['pro_name'] ?></h1>
            <div class="rating-reviews m-t-20">
               <div class="row">
                  <div class="col-sm-3">
                     <div class="rating rateit-small"></div>
                  </div>
                  <div class="col-sm-8">
                     <div class="reviews">
                        <a href="#" class="lnk">(06 Reviews)</a>
                     </div>
                  </div>
               </div>
               <!-- /.row -->		
            </div>
            <!-- /.rating-reviews -->
            <div class="stock-container info-container m-t-10">
               <div class="row">
                  <div class="col-sm-3">
                     <div class="stock-box">
                        <span class="label">Availability :</span>
                     </div>
                  </div>
                  <div class="col-sm-9">
                     <div class="stock-box">
                        <span class="value">In Stock</span>
                     </div>
                  </div>
               </div>
               <!-- /.row -->	
            </div>
            <!-- /.stock-container -->
            <div class="description-container m-t-20">
               <?= $product['short_introduction'] ?>
            </div>
            <!-- /.description-container -->
            <div class="price-container info-container m-t-20">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="price-box">
                        <span class="price" id="txtPrice_<?= $product['id'] ?>"><?= number_format($product['price_sales'],0,",",".") ?></span>
                        <span class="price-strike">$<?= number_format($product['price'],0,",",".") ?></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="favorite-button m-t-10">
                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                        <i class="fa fa-heart"></i>
                        </a>
                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                        <i class="fa fa-retweet"></i>
                        </a>
                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                        <i class="fa fa-envelope"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <!-- /.row -->
            </div>
            <!-- /.price-container -->
            <div class="quantity-container info-container">
               <div class="row">
                  <div class="col-sm-2">
                     <span class="label">Qty :</span>
                  </div>
                  <div class="col-sm-2">
                     <div class="cart-quantity">
                        <div class="quant-input">
                           <div class="arrows">
                              <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                              <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                           </div>
                           <input type="text" value="1" id="number" name="number">
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-7">
                     <a href="#" class="btn btn-primary" onclick="addCart(<?= $product['id']?>)"><i class="fa fa-shopping-cart inner-right-vs"></i> Thêm vào giỏ hàng</a>
                  </div>
               </div>
               <!-- /.row -->
            </div>
            <!-- /.quantity-container -->
            <div class="product-social-link m-t-20 text-right">
               <span class="social-label">Share :</span>
               <div class="social-icons">
                  <ul class="list-inline">
                     <li><a class="fa fa-facebook" href="http://facebook.com/transvelo"></a></li>
                     <li><a class="fa fa-twitter" href="#"></a></li>
                     <li><a class="fa fa-linkedin" href="#"></a></li>
                     <li><a class="fa fa-rss" href="#"></a></li>
                     <li><a class="fa fa-pinterest" href="#"></a></li>
                  </ul>
                  <!-- /.social-icons -->
               </div>
            </div>
         </div>
         <!-- /.product-info -->
      </div>
      <!-- /.col-sm-7 -->
   </div>
   <!-- /.row -->
   <div class="product-tabs inner-bottom-xs  wow fadeInUp">
      <div class="row">
         
            <div class="tab-content">
               <div id="description" class="tab-pane in active">
                  <div class="product-tab">
                     <?= $product['content'] ?>
                  </div>
               </div>
               <!-- /.tab-pane -->
               
            </div>
            <!-- /.tab-content -->
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.product-tabs -->
   <?php if (!empty($related_products)): ?>
   <!-- ============================================== UPSELL PRODUCTS ============================================== -->
   <section class="section featured-product wow fadeInUp">
      <h3 class="section-title">Sản phẩm liên quan</h3>
      <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
         
         
            <?php foreach ($related_products as $value): ?>
         
         <div class="item item-carousel">
            <div class="products">
               <div class="product">
                  <div class="product-image">
                     <div class="image">
                        <a href="detail.html"><img style="max-width: 195px;max-height: 243px" src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl.$value['image'] ?>" alt="<?= $value['title'] ?> ?>"></a>
                     </div>
                     <!-- /.image -->
                     <?php if ($value['product_type_id'] != ''): 
                        $product_type_id = json_decode($value['product_type_id']);
                        $protype = $typePro[$product_type_id[array_rand($product_type_id)]];
                        // print_r($product_type_id);
                     ?>
                                 
                     <div class="tag <?= $protype ?>"><span><?= $protype ?></span></div>
                     <?php endif ?>			
                  </div>
                  <!-- /.product-image -->
                  <div class="product-info text-left">
                     <h3 class="name"><a href="detail.html">LG Smart Phone LP68</a></h3>
                     <div class="rating rateit-small"></div>
                     <div class="description"></div>
                     <div class="product-price">	
                        <span class="price">
                        $650.99				</span>
                        <span class="price-before-discount">$ 800</span>
                     </div>
                     <!-- /.product-price -->
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                     <div class="action">
                        <ul class="list-unstyled">
                           <li class="add-cart-button btn-group">
                              <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                              <i class="fa fa-shopping-cart"></i>													
                              </button>
                              <button class="btn btn-primary" type="button">Add to cart</button>
                           </li>
                           <li class="lnk wishlist">
                              <a class="add-to-cart" href="detail.html" title="Wishlist">
                              <i class="icon fa fa-heart"></i>
                              </a>
                           </li>
                           <li class="lnk">
                              <a class="add-to-cart" href="detail.html" title="Compare">
                              <i class="fa fa-retweet"></i>
                              </a>
                           </li>
                        </ul>
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
            <?php endforeach ?>
         


      </div>
      <!-- /.home-owl-carousel -->
   </section>
   <!-- /.section -->
   <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
   <?php endif ?>
</div>
<!-- /.col -->
<div class='col-md-3 sidebar'>
   <div class="sidebar-module-container">
      <!-- ==============================================CATEGORY============================================== -->
      <?= categoryWidget::widget() ?>
      <!-- ============================================== CATEGORY : END ============================================== -->					<!-- ============================================== HOT DEALS ============================================== -->
      <div class="sidebar-widget hot-deals wow fadeInUp">
         <h3 class="section-title">hot deals</h3>
         <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
            <?php if (!empty($producthot)): ?>
               <?php foreach ($producthot as $productshot): ?>
                  
               
            <div class="item">
               <div class="products">
                  <div class="hot-deal-wrapper">
                     <div class="image">
                        <img src="<?= Yii::$app->homeUrl.$productshot['image']?>" alt="" style="width: 270px;height:334px">
                     </div>
                     <div class="sale-offer-tag"><span>35%<br>off</span></div>
                     <div class="timing-wrapper">
                        <div class="box-wrapper">
                           <div class="date box">
                              <span class="key">120</span>
                              <span class="value">Days</span>
                           </div>
                        </div>
                        <div class="box-wrapper">
                           <div class="hour box">
                              <span class="key">20</span>
                              <span class="value">HRS</span>
                           </div>
                        </div>
                        <div class="box-wrapper">
                           <div class="minutes box">
                              <span class="key">36</span>
                              <span class="value">MINS</span>
                           </div>
                        </div>
                        <div class="box-wrapper hidden-md">
                           <div class="seconds box">
                              <span class="key">60</span>
                              <span class="value">SEC</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.hot-deal-wrapper -->
                  <div class="product-info text-left m-t-20">
                     <h3 class="name"><a href="detail.html"><?= $productshot['pro_name'] ?></a></h3>
                     <div class="rating rateit-small"></div>
                     <div class="product-price">	
                        <span class="price">
                        <?= $productshot['price_sales'] ?> VND
                        </span>
                        <span class="price-before-discount"><?= $productshot['price'] ?> VND</span>					
                     </div>
                     <!-- /.product-price -->
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                     <div class="action">
                        <div class="add-cart-button btn-group">
                           <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                           <i class="fa fa-shopping-cart"></i>													
                           </button>
                           <button class="btn btn-primary" type="button">Add to cart</button>
                        </div>
                     </div>
                     <!-- /.action -->
                  </div>
                  <!-- /.cart -->
               </div>
            </div>
               <?php endforeach ?>
            <?php endif ?>
            
         </div>
         <!-- /.sidebar-widget -->
      </div>
      <!-- ============================================== HOT DEALS: END ============================================== -->					<!-- ============================================== COLOR============================================== -->
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
                  <!-- /.caption -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.item -->
            <div class="item" style="background-image: url('<?= Yii::$app->homeUrl?>vender/images/advertisement/1.jpg');">
            </div>
            <!-- /.item -->
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
                  <!-- /.caption -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.item -->
         </div>
         <!-- /.owl-carousel -->
      </div>
      <!-- ============================================== COLOR: END ============================================== -->
   </div>
</div>
<!-- /.sidebar -->
<div class="clearfix"></div>