<div id="hero">
  <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
    <?php foreach ($dataBanner as $value): ?>
      
    
    <div class="item" style="background-image: url(<?= Yii::$app->homeUrl.$value['image']?>">
      <div class="container-fluid">
        <div class="caption bg-color vertical-center text-left">
          <div class="slider-header fadeInDown-1">Top Brands</div>
          <div class="big-text fadeInDown-1">
            <?= $value['name']?>
          </div>
          <div class="excerpt fadeInDown-2 hidden-xs">
            <span><?= $value['content']?></span>
          </div>
          <div class="button-holder fadeInDown-3">
            <a href="<?= $value['url']?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
          </div>
        </div>
        <!-- /.caption -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.item -->
    <?php endforeach ?>
    <!-- <div class="item" style="background-image: url(<?= Yii::$app->homeUrl?>images/sliders/02.jpg);">
      <div class="container-fluid">
        <div class="caption bg-color vertical-center text-left">
          <div class="slider-header fadeInDown-1">Spring 2016</div>
          <div class="big-text fadeInDown-1">
            Women <span class="highlight">Fashion</span>
          </div>
          <div class="excerpt fadeInDown-2 hidden-xs">
            <span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</span>
          </div>
          <div class="button-holder fadeInDown-3">
            <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
          </div>
        </div>
        /.caption
      </div>
      /.container-fluid
    </div>
    /.item -->
  </div>
  <!-- /.owl-carousel -->
</div>