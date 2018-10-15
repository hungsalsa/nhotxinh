<div class='col-md-9'>
   <div class="row  wow fadeInUp">
      <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
         <div class="product-item-holder size-big single-product-gallery small-gallery">
            <div id="owl-single-product">
               
               <?php if (count($listImg)): $i=1;?>
                  <?php foreach ($listImg as $value): ?>
                  
                  <div class="single-product-gallery-item" id="slide<?= $i ?>">
                     <a data-lightbox="image-1" data-title="Gallery" href="<?= Yii::$app->homeUrl.$value['image']?>">
                     <img class="img-responsive" alt="<?= $value['alt']?> ?>" src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl.$value['image']?>?>" />
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
                  <?php foreach ($listImg as $value): ?>
                  <div class="item">
                     <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?= $j ?>" href="#slide<?= $j ?>">
                     <img class="img-responsive" width="85" alt="<?= $value['alt']?> ?>" src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl.$value['image']?>"/>
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
            <h1 class="name"><?= $product['pro_name'] ?></h1><?= $product['slug'] ?>
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
                        <span class="price">$<?= number_format($product['price_sales'],0,",",".") ?></span>
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
                           <input type="text" value="1">
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-7">
                     <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
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
   <!-- ============================================== UPSELL PRODUCTS ============================================== -->
   <section class="section featured-product wow fadeInUp">
      <h3 class="section-title">upsell products</h3>
      <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
         <div class="item item-carousel">
            <div class="products">
               <div class="product">
                  <div class="product-image">
                     <div class="image">
                        <a href="detail.html"><img  src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl?>vender/images/products/4.jpg" alt=""></a>
                     </div>
                     <!-- /.image -->			
                     <div class="tag sale"><span>sale</span></div>
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
         <div class="item item-carousel">
            <div class="products">
               <div class="product">
                  <div class="product-image">
                     <div class="image">
                        <a href="detail.html"><img  src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl?>vender/images/products/3.jpg" alt=""></a>
                     </div>
                     <!-- /.image -->			
                     <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->
                  <div class="product-info text-left">
                     <h3 class="name"><a href="detail.html">Apple Iphone 5s 32GB</a></h3>
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
         <div class="item item-carousel">
            <div class="products">
               <div class="product">
                  <div class="product-image">
                     <div class="image">
                        <a href="detail.html"><img  src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl?>vender/images/products/1.jpg" alt=""></a>
                     </div>
                     <!-- /.image -->			
                     <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->
                  <div class="product-info text-left">
                     <h3 class="name"><a href="detail.html">Sony Ericson Vaga</a></h3>
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
         <div class="item item-carousel">
            <div class="products">
               <div class="product">
                  <div class="product-image">
                     <div class="image">
                        <a href="detail.html"><img  src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl?>vender/images/products/2.jpg" alt=""></a>
                     </div>
                     <!-- /.image -->			
                     <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
                  <div class="product-info text-left">
                     <h3 class="name"><a href="detail.html">Samsung Galaxy S4</a></h3>
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
         <div class="item item-carousel">
            <div class="products">
               <div class="product">
                  <div class="product-image">
                     <div class="image">
                        <a href="detail.html"><img  src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl?>vender/images/products/2.jpg" alt=""></a>
                     </div>
                     <!-- /.image -->			
                     <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->
                  <div class="product-info text-left">
                     <h3 class="name"><a href="detail.html">Samsung Galaxy S4</a></h3>
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
         <div class="item item-carousel">
            <div class="products">
               <div class="product">
                  <div class="product-image">
                     <div class="image">
                        <a href="detail.html"><img  src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl?>vender/images/products/6.jpg" alt=""></a>
                     </div>
                     <!-- /.image -->			
                     <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
                  <div class="product-info text-left">
                     <h3 class="name"><a href="detail.html">Nokia Lumia 520</a></h3>
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
      </div>
      <!-- /.home-owl-carousel -->
   </section>
   <!-- /.section -->
   <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
</div>
<!-- /.col -->
<div class='col-md-3 sidebar'>
   <div class="sidebar-module-container">
      <!-- ==============================================CATEGORY============================================== -->
      <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
         <h3 class="section-title">Category</h3>
         <div class="sidebar-widget-body m-t-10">
            <div class="accordion">
               <div class="accordion-group">
                  <div class="accordion-heading">
                     <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed">
                     Camera
                     </a>
                  </div>
                  <!-- /.accordion-heading -->
                  <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                     <div class="accordion-inner">
                        <ul>
                           <li><a href="#">gaming</a></li>
                           <li><a href="#">office</a></li>
                           <li><a href="#">kids</a></li>
                           <li><a href="#">for women</a></li>
                        </ul>
                     </div>
                     <!-- /.accordion-inner -->
                  </div>
                  <!-- /.accordion-body -->
               </div>
               <!-- /.accordion-group -->
               <div class="accordion-group">
                  <div class="accordion-heading">
                     <a href="#collapseTwo" data-toggle="collapse" class="accordion-toggle collapsed">
                     Desktops
                     </a>
                  </div>
                  <!-- /.accordion-heading -->
                  <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                     <div class="accordion-inner">
                        <ul>
                           <li><a href="#">gaming</a></li>
                           <li><a href="#">office</a></li>
                           <li><a href="#">kids</a></li>
                           <li><a href="#">for women</a></li>
                        </ul>
                     </div>
                     <!-- /.accordion-inner -->
                  </div>
                  <!-- /.accordion-body -->
               </div>
               <!-- /.accordion-group -->
               <div class="accordion-group">
                  <div class="accordion-heading">
                     <a href="#collapseThree" data-toggle="collapse" class="accordion-toggle collapsed">
                     Pants
                     </a>
                  </div>
                  <!-- /.accordion-heading -->
                  <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
                     <div class="accordion-inner">
                        <ul>
                           <li><a href="#">gaming</a></li>
                           <li><a href="#">office</a></li>
                           <li><a href="#">kids</a></li>
                           <li><a href="#">for women</a></li>
                        </ul>
                     </div>
                     <!-- /.accordion-inner -->
                  </div>
                  <!-- /.accordion-body -->
               </div>
               <!-- /.accordion-group -->
               <div class="accordion-group">
                  <div class="accordion-heading">
                     <a href="#collapseFour" data-toggle="collapse" class="accordion-toggle collapsed">
                     Bags
                     </a>
                  </div>
                  <!-- /.accordion-heading -->
                  <div class="accordion-body collapse" id="collapseFour" style="height: 0px;">
                     <div class="accordion-inner">
                        <ul>
                           <li><a href="#">gaming</a></li>
                           <li><a href="#">office</a></li>
                           <li><a href="#">kids</a></li>
                           <li><a href="#">for women</a></li>
                        </ul>
                     </div>
                     <!-- /.accordion-inner -->
                  </div>
                  <!-- /.accordion-body -->
               </div>
               <!-- /.accordion-group -->
               <div class="accordion-group">
                  <div class="accordion-heading">
                     <a href="#collapseFive" data-toggle="collapse" class="accordion-toggle collapsed">
                     Hats
                     </a>
                  </div>
                  <!-- /.accordion-heading -->
                  <div class="accordion-body collapse" id="collapseFive" style="height: 0px;">
                     <div class="accordion-inner">
                        <ul>
                           <li><a href="#">gaming</a></li>
                           <li><a href="#">office</a></li>
                           <li><a href="#">kids</a></li>
                           <li><a href="#">for women</a></li>
                        </ul>
                     </div>
                     <!-- /.accordion-inner -->
                  </div>
                  <!-- /.accordion-body -->
               </div>
               <!-- /.accordion-group -->
               <div class="accordion-group">
                  <div class="accordion-heading">
                     <a href="#collapseSix" data-toggle="collapse" class="accordion-toggle collapsed">
                     Accessories
                     </a>
                  </div>
                  <!-- /.accordion-heading -->
                  <div class="accordion-body collapse" id="collapseSix" style="height: 0px;">
                     <div class="accordion-inner">
                        <ul>
                           <li><a href="#">gaming</a></li>
                           <li><a href="#">office</a></li>
                           <li><a href="#">kids</a></li>
                           <li><a href="#">for women</a></li>
                        </ul>
                     </div>
                     <!-- /.accordion-inner -->
                  </div>
                  <!-- /.accordion-body -->
               </div>
               <!-- /.accordion-group -->
            </div>
            <!-- /.accordion -->
         </div>
         <!-- /.sidebar-widget-body -->
      </div>
      <!-- /.sidebar-widget -->
      <!-- ============================================== CATEGORY : END ============================================== -->					<!-- ============================================== HOT DEALS ============================================== -->
      <div class="sidebar-widget hot-deals wow fadeInUp">
         <h3 class="section-title">hot deals</h3>
         <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
            <div class="item">
               <div class="products">
                  <div class="hot-deal-wrapper">
                     <div class="image">
                        <img src="<?= Yii::$app->homeUrl?>vender/images/hot-deals/1.jpg" alt="">
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
                     <h3 class="name"><a href="detail.html">Apple Iphone 5s 32GB Gold</a></h3>
                     <div class="rating rateit-small"></div>
                     <div class="product-price">	
                        <span class="price">
                        $600.00
                        </span>
                        <span class="price-before-discount">$800.00</span>					
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
            <div class="item">
               <div class="products">
                  <div class="hot-deal-wrapper">
                     <div class="image">
                        <img src="<?= Yii::$app->homeUrl?>vender/images/hot-deals/2.jpg" alt="">
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
                     <h3 class="name"><a href="detail.html">Apple Iphone 5s 32GB Gold</a></h3>
                     <div class="rating rateit-small"></div>
                     <div class="product-price">	
                        <span class="price">
                        $600.00
                        </span>
                        <span class="price-before-discount">$800.00</span>					
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
            <div class="item">
               <div class="products">
                  <div class="hot-deal-wrapper">
                     <div class="image">
                        <img src="<?= Yii::$app->homeUrl?>vender/images/hot-deals/3.jpg" alt="">
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
                     <h3 class="name"><a href="detail.html">Apple Iphone 5s 32GB Gold</a></h3>
                     <div class="rating rateit-small"></div>
                     <div class="product-price">	
                        <span class="price">
                        $600.00
                        </span>
                        <span class="price-before-discount">$800.00</span>					
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