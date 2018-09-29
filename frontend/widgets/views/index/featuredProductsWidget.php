<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">Featured products</h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs" data-item="5">
        <?php foreach ($productRan as $value): ?>
        <div class="item item-carousel">
            <div class="products">
                <div class="product">       
                    <div class="product-image">
                        <div class="image">
                            <a href="<?= $value['image'] ?>" data-lightbox="image-1" data-title="Nunc ullamcors">
                                <img width="98%" src="<?= Yii::$app->homeUrl ?>vender/images/blank.gif" data-echo="<?= $value['image'] ?>" alt="">
                                <div class="zoom-overlay"></div>
                            </a>
                        </div><!-- /.image -->          
                        <div class="tag <?= (count($tag_s = json_decode($value['product_type_id'])))? $dataProType[$tag_s[0]] :'' ?>"><span><?= (count($tag_s = json_decode($value['product_type_id'])))? $dataProType[$tag_s[0]] :'' ?></span></div>                      
                    </div><!-- /.product-image -->
                    <div class="product-info text-left">
                        <h3 class="name"><a href="detail.html"><?= $value['pro_name'] ?></a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>
                        <div class="product-price"> 
                            <span class="price">
                            $<?= $value['price_sales'] ?>             </span>
                            <span class="price-before-discount">$ <?= $value['price'] ?></span>
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
</section><!-- /.section -->