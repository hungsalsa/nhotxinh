<?php use yii\helpers\Url; ?>
<div class="header-nav animate-dropdown">
  <div class="container">
    <div class="yamm navbar navbar-default" role="navigation">
      <div class="navbar-header">
        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="nav-bg-class">
        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
          <div class="nav-outer">
            <ul class="nav navbar-nav">
              <li class="active dropdown yamm-fw">
                <a href="<?= Yii::$app->homeUrl ?>" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Trang chủ</a>
              </li>
              <?php foreach ($dataMenu as $value): ?>
                <?php if ($value['type']==1): ?>
                  <li class="dropdown yamm mega-menu">
                    <a href="<?= Url::to(['categories/index', 'slug'=>$value['slug']],true) ?>" data-hover="dropdown" class="dropdown-toggle"><?= $value['name'] ?></a>
                    
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-8 col-menu">
                            <?php 
                              $childs = $value['child']; //pr($childs);
                            foreach ($childs as $child1): ?>
                              
                            
                              <?php if (empty($child1['child'])): ?>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                  <ul class="links">
                                    <li><a href="<?= Url::to(['categories/index', 'slug'=>$child1['slug']],true) ?>"><?= $child1['name'] ?></a></li>
                                  </ul>
                                </div>
                              <?php else: 
                                $childs2 = $child1['child'];?>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                  <h2 class="title"><?= $child1['name'] ?></h2>
                                  <ul class="links">
                                <?php foreach ($childs2 as $child2): ?>
                                    <li><a href="<?= Url::to(['categories/index', 'slug'=>$child2['slug']],true) ?>"><?= $child2['name'] ?></a></li>
                                <?php endforeach ?>
                                  </ul>
                                </div>
                              <?php endif ?>
                              <!-- <h2 class="title">Nam</h2>
                              <ul class="links">
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Shoes </a></li>
                                <li><a href="#">Jackets</a></li>
                                <li><a href="#">Sunglasses</a></li>
                                <li><a href="#">Sport Wear</a></li>
                                <li><a href="#">Blazers</a></li>
                                <li><a href="#">Shirts</a></li>
                              </ul> -->
                            <!-- /.col -->
                            <?php endforeach ?>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                              <img class="img-responsive" src="<?= ($value['image']=='') ? Yii::$app->homeUrl.'images/banners/top-menu-banner.jpg':$value['image']?>" alt="">
                            </div>
                            <!-- /.yamm-content -->         
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
              <?php endif ?>
              <?php if ($value['type']==2): ?>
                <li class="dropdown mega-menu">
                  <a href="<?= Yii::$app->homeUrl.$value['name'] ?>" class="dropdown-toggle" data-hover="dropdown"><?= $value['name'] ?></a>
                  <ul class="dropdown-menu pages container">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <?php $childs = $value['child'];?>
                              <div class="col-xs-12 col-sm-6 col-md-8 col-menu">
                                <ul class="links">
                                  <?php foreach ($childs as $child1): ?>
                                    <li><a href="<?= Yii::$app->homeUrl.$child1['name'] ?>"><?= $child1['name'] ?></a></li>
                                  <?php endforeach ?>
                                </ul>
                              </div>
                              <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image text-right">
                                <img class="img-responsive" src="<?= Yii::$app->homeUrl?>images/banners/top-menu-banner.jpg" alt="">
                              </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              <?php endif ?>
              <?php endforeach ?>
              <!-- <li class="dropdown mega-menu">
                <a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Diện tử
                  <span class="menu-label hot-menu hidden-xs">hot</span>
                </a>
                <ul class="dropdown-menu container">
                  <li>
                    <div class="yamm-content">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                          <h2 class="title">Laptops</h2>
                          <ul class="links">
                            <li><a href="#">Gaming</a></li>
                            <li><a href="#">Laptop Skins</a></li>
                            <li><a href="#">Apple</a></li>
                            <li><a href="#">Dell</a></li>
                            <li><a href="#">Lenovo</a></li>
                            <li><a href="#">Microsoft</a></li>
                            <li><a href="#">Asus</a></li>
                            <li><a href="#">Adapters</a></li>
                            <li><a href="#">Batteries</a></li>
                            <li><a href="#">Cooling Pads</a></li>
                          </ul>
                        </div>
                        /.col
                        <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                          <h2 class="title">Desktops</h2>
                          <ul class="links">
                            <li><a href="#">Routers & Modems</a></li>
                            <li><a href="#">CPUs, Processors</a></li>
                            <li><a href="#">PC Gaming Store</a></li>
                            <li><a href="#">Graphics Cards</a></li>
                            <li><a href="#">Components</a></li>
                            <li><a href="#">Webcam</a></li>
                            <li><a href="#">Memory (RAM)</a></li>
                            <li><a href="#">Motherboards</a></li>
                            <li><a href="#">Keyboards</a></li>
                            <li><a href="#">Headphones</a></li>
                          </ul>
                        </div>
                        /.col
                        <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                          <h2 class="title">Cameras</h2>
                          <ul class="links">
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Binoculars</a></li>
                            <li><a href="#">Telescopes</a></li>
                            <li><a href="#">Camcorders</a></li>
                            <li><a href="#">Digital</a></li>
                            <li><a href="#">Film Cameras</a></li>
                            <li><a href="#">Flashes</a></li>
                            <li><a href="#">Lenses</a></li>
                            <li><a href="#">Surveillance</a></li>
                            <li><a href="#">Tripods</a></li>
                          </ul>
                        </div>
                        /.col
                        <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                          <h2 class="title">Mobile Phones</h2>
                          <ul class="links">
                            <li><a href="#">Apple</a></li>
                            <li><a href="#">Samsung</a></li>
                            <li><a href="#">Lenovo</a></li>
                            <li><a href="#">Motorola</a></li>
                            <li><a href="#">LeEco</a></li>
                            <li><a href="#">Asus</a></li>
                            <li><a href="#">Acer</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Headphones</a></li>
                            <li><a href="#">Memory Cards</a></li>
                          </ul>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner">
                          <a href="#"><img alt="" src="<?= Yii::$app->homeUrl?>images/banners/banner-side.png"></a>
                        </div>
                      </div>
                      /.row
                    </div>
                    /.yamm-content         
                  </li>
                </ul>
              </li>
              <li class="dropdown hidden-sm">
                <a href="category.html">Health & Beauty
                  <span class="menu-label new-menu hidden-xs">new</span>
                </a>
              </li>
              <li class="dropdown hidden-sm">
                <a href="category.html">Watches</a>
              </li>
              <li class="dropdown">
                <a href="contact.html">Jewellery</a>
              </li>
              <li class="dropdown">
                <a href="contact.html">Shoes</a>
              </li>
              <li class="dropdown">
                <a href="contact.html">Kids & Girls</a>
              </li>
              <li class="dropdown mega-menu">
                <a href="#page" class="dropdown-toggle" data-hover="dropdown">Pages</a>
              
                <ul class="dropdown-menu pages container">
                  <li>
                    <div class="yamm-content">
                      <div class="row">
                        <div class="col-xs-12 col-menu">
                          <ul class="links">
                            <li><a href="home.html">Home</a></li>
                            <li><a href="category.html">Category</a></li>
                            <li><a href="detail.html">Detail</a></li>
                            <li><a href="shopping-cart.html">Shopping Cart Summary</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-details.html">Blog Detail</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="sign-in.html">Sign In</a></li>
                            <li><a href="my-wishlist.html">Wishlist</a></li>
                            <li><a href="terms-conditions.html">Terms and Condition</a></li>
                            <li><a href="track-orders.html">Track Orders</a></li>
                            <li><a href="product-comparison.html">Product-Comparison</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="404.html">404</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown  navbar-right special-menu">
                <a href="#">Todays offer</a>
              </li> -->
            </ul>
            <!-- /.navbar-nav -->
            <div class="clearfix"></div>
          </div>
          <!-- /.nav-outer -->
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.nav-bg-class -->
    </div>
    <!-- /.navbar-default -->
  </div>
  <!-- /.container-class -->
</div>