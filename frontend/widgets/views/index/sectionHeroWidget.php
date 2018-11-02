
<div id="hero" class="home-page-slider4">
    <div id="owl-main" class="owl-carousel silder4 owl-inner-nav owl-ui-sm">
        
        <?php if (!empty($dataBanner)): ?>
            <?php foreach ($dataBanner as $value): ?>
                
        <div class="item" style="background-image: url(<?= $value['image'] ?>);">
            <div class="container-fluid">
                <div class="caption vertical-center text-left">
                    <div class="big-text fadeInDown-1">
                        <?php// $value['alt'] ?>
                    </div>

                    <div class="excerpt m-t-20 fadeInDown-2 hidden-xs">
                            <?php $value['content'] ?>
                    </div>
                    <div class="button-holder fadeInDown-3">
                        <a href="<?= $value['url'] ?>.html" class="btn btn-black btn-uppercase shop-now-button">Shop Now</a>
                    </div>
                </div><!-- /.caption -->
            </div><!-- /.container-fluid -->
        </div><!-- /.item -->
            <?php endforeach ?>
        <?php endif ?>

    </div><!-- /.owl-carousel -->
    <div class="customNavigation">
        <div class="container">

            <div class="controls clearfix hidden-xs">
                <a href="#" data-target=".silder4" class="btn btn-primary pull-left owl-prev"><i class="fa fa-angle-left"></i></a>
                <a href="#" data-target=".silder4" class="btn btn-primary pull-right owl-next"><i class="fa fa-angle-right"></i></a>
            </div><!-- /.controls -->

        </div>
    </div>
</div>