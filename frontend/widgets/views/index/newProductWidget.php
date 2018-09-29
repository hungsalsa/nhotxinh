<?php 
use frontend\models\Product;
?>
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix ">
        <h3 class="new-product-title pull-left">Sản phẩm mới</h3>
        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
            <li class="active"><a href="#all" data-toggle="tab">All</a></li>
            <?php foreach ($dataCat as $key => $value): ?>
                <li><a href="#cate_<?= $key ?>" data-toggle="tab"><?= $value ?></a></li>
            <?php endforeach ?>
            
        </ul><!-- /.nav-tabs -->
    </div>
    <div class="tab-content outer-top-xs">
        <div class="tab-pane in active" id="all">           
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="5">
                    <?php foreach ($dataproduct as $value): ?>
<!-- =============================================                         -->
                    
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">       
                                <div class="product-image">
                                    <div class="image">
                                        <a href="<?= Yii::$app->homeUrl.'product/detail/'.$value['id'] ?>"><img  src="<?= Yii::$app->homeUrl.$value->image ?>" data-echo="<?= Yii::$app->homeUrl.$value->image ?>" alt="<?= $value->title ?>" width="98%"></a>
                                    </div><!-- /.image -->          
                                    <div class="tag new"><span>new</span></div>                                
                                </div><!-- /.product-image -->
                                <div class="product-info text-left">
                                    <h3 class="name"><a href="<?= Yii::$app->homeUrl.'product/detail/'.$value['id'] ?>"><?= $value->pro_name ?></a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"> 
                                        <span class="price">
                                        $<?= $value->price_sales ?>             </span>
                                        <span class="price-before-discount">$ <?= $value->price ?></span>
                                    </div><!-- /.product-price -->
                                </div><!-- /.product-info -->
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
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->
                        </div><!-- /.products -->
                    </div><!-- /.item -->
<?php endforeach ?>
                    
<!-- ====================================================== -->
                </div><!-- /.home-owl-carousel -->
            </div><!-- /.product-slider -->
        </div><!-- /.tab-pane All Product -->
<?php 
$product = new Product();
 ?>     <?php foreach ($dataCat as $keyCat => $valueCat): ?>
     
 
        <div class="tab-pane" id="cate_<?= $keyCat ?>">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="5">
                    <?php 
                    $product_byCat = $product->getAllProductByCateId($keyCat);
                    ?>
                    <?php foreach ($product_byCat as $valueP): ?>
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">       
                                <div class="product-image">
                                    <div class="image">
                                        <a href="<?= Yii::$app->homeUrl.'product/detail/'.$valueP['id'] ?>"><img  src="<?= Yii::$app->homeUrl.$valueP['image'] ?>" data-echo="<?= Yii::$app->homeUrl.$valueP['image'] ?>" alt="<?= $valueP['title'] ?>" width="98%"></a>
                                    </div><!-- /.image -->          
                                    <div class="tag new"><span>new</span></div>                                
                                </div><!-- /.product-image -->
                                <div class="product-info text-left">
                                    <h3 class="name"><a href="<?= Yii::$app->homeUrl.'product/detail/'.$valueP['id'] ?>"><?= $valueP['pro_name'] ?></a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"> 
                                        <span class="price">
                                        $<?= $valueP['price_sales'] ?>             </span>
                                        <span class="price-before-discount">$ <?= $valueP['price'] ?></span>
                                    </div><!-- /.product-price -->
                                </div><!-- /.product-info -->
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
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->
                        </div><!-- /.products -->
                    </div><!-- /.item -->
                    <?php endforeach ?>
                </div><!-- /.home-owl-carousel -->
            </div><!-- /.product-slider -->
        </div><!-- /.tab-pane -->
        <?php endforeach ?>
        <!-- END TAB CAT -->

    </div><!-- /.tab-content -->
</div><!-- /.scroll-tabs -->