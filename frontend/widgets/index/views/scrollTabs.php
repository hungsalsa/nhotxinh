<?php use yii\helpers\Url; ?>
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
  <div class="more-info-tab clearfix ">
    <h3 class="new-product-title pull-left">Sản phẩm mới</h3>
    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
      <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
      <?php if (!empty($data['tabs'])): ?>
        <?php foreach ($data['tabs'] as $value): ?>
          <li><a data-transition-type="backSlide" href="#tabpane<?= $value['id']?>" data-toggle="tab"><?= $value['name']?></a></li>
        
      <?php endforeach ?>
      <?php endif ?>
    </ul>
    <!-- /.nav-tabs -->
  </div>
  <div class="tab-content outer-top-xs">
    <?php if (!empty($data['all'])): ?>
    <div class="tab-pane in active" id="all">
      <div class="product-slider">
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
          <?php foreach ($data['all'] as $value): ($value['image']=='') ? $imagePro = 'images/products/p1.jpg': $imagePro = $value['image'];?>
          <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image">
                    <a href="<?= Url::to(['product/index', 'slug'=>$value['slug']],true) ?>"><img src="<?= Yii::$app->homeUrl.$imagePro ?>" alt="<?= $value['title'] ?>"></a>
                  </div>
                  <!-- /.image -->      
                  <div class="tag new"><span>new</span></div>
                </div>
                <!-- /.product-image -->
                <div class="product-info text-left">
                  <h3 class="name"><a href="<?= Url::to(['product/index', 'slug'=>$value['slug']],true) ?>"><?= $value['pro_name'] ?></a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  <div class="product-price"> 
                    <?php if ($value['price_sales'] !=''): ?>
                      <span class="price"> <?= Yii::$app->formatter->asDecimal($value['price_sales']) ?>       </span>
                    <?php endif ?>
                    <?php if ($value['price'] !=''): ?>
                      <span class="price-before-discount"><?= Yii::$app->formatter->asDecimal($value['price']) ?></span>
                    <?php endif ?>
                  </div>
                  <!-- /.product-price -->
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                          <i class="fa fa-shopping-cart"></i>                         
                        </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </li>
                      <li class="lnk wishlist">
                        <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
                          <i class="icon fa fa-heart"></i>
                        </a>
                      </li>
                      <li class="lnk">
                        <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
                          <i class="fa fa-signal" aria-hidden="true"></i>
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
      </div>
      <!-- /.product-slider -->
    </div>
    <!-- /.tab-pane -->
    <?php endif ?>
    <?php if (!empty($data['tabs'])): ?>
      <?php foreach ($data['tabs'] as $valuetabs): $products = $valuetabs['product']?>
        <div class="tab-pane" id="tabpane<?= $valuetabs['id']?>">
          <div class="product-slider">
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
              <?php foreach ($products as $product): ($product['image']=='') ? $imagePro = 'images/products/p5.jpg': $imagePro = $product['image']; ?>
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image">
                        <a href="<?= Url::to(['product/index', 'slug'=>$product['slug']],true) ?>"><img src="<?= Yii::$app->homeUrl .$imagePro?>" alt="<?= $product['title'] ?>"></a>
                      </div>
                      <!-- /.image -->      
                      <div class="tag sale"><span>sale</span></div>
                    </div>
                    <!-- /.product-image -->
                    <div class="product-info text-left">
                      <h3 class="name"><a href="<?= Url::to(['product/index', 'slug'=>$product['slug']],true) ?>"><?= $product['pro_name'] ?></a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description">Lorem ipsum or</div>
                      <div class="product-price">
                        <?php if ($product['price_sales'] !=''): ?>
                          <span class="price"> <?= Yii::$app->formatter->asDecimal($product['price_sales']) ?>       </span>
                        <?php endif ?>
                        <?php if ($product['price'] !=''): ?>
                          <span class="price-before-discount"><?= Yii::$app->formatter->asDecimal($product['price']) ?></span>
                        <?php endif ?> 
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
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist">
                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                              <i class="icon fa fa-heart"></i>
                            </a>
                          </li>
                          <li class="lnk">
                            <a class="add-to-cart" href="detail.html" title="Compare">
                              <i class="fa fa-signal" aria-hidden="true"></i>
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

              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image">
                        <a href="/all"><img src="<?= Yii::$app->homeUrl?>images/products/p5.jpg" alt=""></a>
                      </div>
                      <!-- /.image -->      
                      <div class="tag sale"><span>sale</span></div>
                    </div>
                    <!-- /.product-image -->
                    <div class="product-info text-left">
                      <h3 class="name"><a href="/tat-ca">Xem thêm</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>
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
                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                          </li>
                          <li class="lnk wishlist">
                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                              <i class="icon fa fa-heart"></i>
                            </a>
                          </li>
                          <li class="lnk">
                            <a class="add-to-cart" href="detail.html" title="Compare">
                              <i class="fa fa-signal" aria-hidden="true"></i>
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
          </div>
          <!-- /.product-slider -->
        </div>
        <!-- /.tab-pane -->
      <?php endforeach ?>
    <?php endif ?>
    
    
  </div>
  <!-- /.tab-content -->
</div>