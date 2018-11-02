<?php if (!empty($dataNew)): ?>
    

<section class="section wow fadeInUp outer-bottom-vs blogHome">
    <h3 class="section-title">latest form blog</h3>
    <div class="blog-slider-container wow fadeInUp  outer-top-xs">
        <div class="owl-carousel blog-slider custom-carousel">
            <?php foreach ($dataNew as $value): ?>
                
            
            <div class="item">
                <div class="blog-post">
                    <div class="blog-post-image">
                        <div class="image">
                            <a href="<?= Yii::$app->homeUrl.'tin-tuc/'.$value['link'] ?>.html"><img data-echo="<?= Yii::$app->homeUrl.$value['images'] ?>" src="<?= Yii::$app->homeUrl ?>vender/images/blank.gif" width="370" height="165" alt=""></a>
                        </div>
                    </div><!-- /.blog-post-image -->
                    <div class="blog-post-info text-left">
                        <h3 class="name"><a href="<?= Yii::$app->homeUrl.'tin-tuc/'.$value['link'] ?>.html"><?= $value['name'] ?></a></h3> 
                        <span class="info">By Jone Doe-22 april 2014 -03 comments</span>
                        <article class="text short_description"><?= $value['short_description'] ?></article>
                        <a href="<?= Yii::$app->homeUrl.'tin-tuc/'.$value['link'] ?>.html" class="lnk btn btn-primary">Read more</a>
                    </div><!-- /.blog-post-info -->
                </div><!-- /.blog-post -->
            </div><!-- /.item -->

            
            <?php endforeach ?>
        </div><!-- /.owl-carousel -->
    </div><!-- /.blog-slider-container -->
</section><!-- /.section -->
<?php endif ?>