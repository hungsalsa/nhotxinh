<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <h3 class="section-title">Các nhãn hiệu</h3>
    <div class="logo-slider-inner"> 
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            
            <?php if (!empty($dataBrands)): ?>
                <?php foreach ($dataBrands as $dataBrand): ?>


                    <div class="item m-t-10">
                        <a href="#" class="image">
                            <img data-echo="<?= Yii::$app->homeUrl.$dataBrand['image'] ?>" src="<?= Yii::$app->homeUrl ?>vender/images/blank.gif" alt="">
                        </a>    
                    </div><!--/.item-->
                <?php endforeach ?>
            <?php endif ?>
        </div><!-- /.owl-carousel #logo-slider -->
    </div><!-- /.logo-slider-inner -->
</div><!-- /.logo-slider -->