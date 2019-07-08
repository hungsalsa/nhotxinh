<?php use yii\helpers\Url; if (!empty($data)): ?>
  <div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Sản phẩm đặc biệt</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
        <div class="item">
          <div class="products special-product">
            <?php foreach ($data as $key => $value): $imagePro = ($value['image']=='')? 'images/products/p30.jpg': $value['image'];?>
            <div class="product">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <div class="image">
                        <a href="<?= Url::to(['product/index', 'slug'=>$value['slug']],true) ?>">
                          <img src="<?= Yii::$app->homeUrl.$imagePro?>" alt="<?= $value['title'] ?>">
                        </a>          
                      </div>
                      <!-- /.image -->
                    </div>
                    <!-- /.product-image -->
                  </div>
                  <!-- /.col -->
                  <div class="col col-xs-7">
                    <div class="product-info">
                      <h3 class="name"><a href="<?= Url::to(['product/index', 'slug'=>$value['slug']],true) ?>"><?= $value['pro_name'] ?></a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="product-price"> 
                        <span class="price">
                        <?= Yii::$app->formatter->asDecimal($value['price_sales'])?></span>
                      </div>
                      <!-- /.product-price -->
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.product-micro-row -->
              </div>
              <!-- /.product-micro -->
            </div>
            <?php if (($key+1)%3==0 && ($key+1) != count($data)):?>
              </div>
            </div>
            <div class="item">
              <div class="products special-product">
            <?php endif ?>
            <?php endforeach ?>
            
          </div>
        </div>
        
      </div>
    </div>
    <!-- /.sidebar-widget-body -->
  </div>
  <!-- /.sidebar-widget -->
  <?php endif ?>