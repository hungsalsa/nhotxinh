<?php use yii\helpers\Url; ?>
<div class="side-menu animate-dropdown outer-bottom-xs">
  <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Danh mục sản phẩm</div>
  <nav class="yamm megamenu-horizontal" role="navigation">
    <ul class="nav">
      
      
      <?php foreach ($dataSidebar as $value): //dbg($value);?>
      <li class="dropdown menu-item">
        <a href="<?= Url::to(['categories/index', 'slug'=>$value['slug']],true) ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-laptop" aria-hidden="true"></i><?= $value['name'] ?></a>
        <!-- ================================== MEGAMENU VERTICAL ================================== -->
        <?php if (isset($value['child'])): $child = $value['child']; $counthalf = count($child);?>
        <ul class="dropdown-menu mega-menu">
          <li class="yamm-content">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-lg-4">
                <ul>
                  <?php foreach ($child as $key => $chil): ?>
                    <?php if ($key == 8 && $counthalf > 8): ?>
                    </ul>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-lg-4">
                    <ul>
                    <?php endif ?>

                    <li><a href="<?= Url::to(['categories/index', 'slug'=>$chil['slug']],true) ?>"><?= $chil['name'] ?></a></li>
                  <?php endforeach ?>
                </ul>
              </div>
              <div class="dropdown-banner-holder">
                <a href="#"><img alt="" src="<?= Yii::$app->homeUrl?>images/banners/banner-side.png" /></a>
              </div>
            </div>
            <!-- /.row -->
          </li>
          <!-- /.yamm-content -->                    
        </ul>
        <!-- /.dropdown-menu -->
        <?php endif ?>
        <!-- ================================== MEGAMENU VERTICAL ================================== -->            
      </li>
      <!-- /.menu-item -->
      <?php endforeach ?>
      
    </ul>
    <!-- /.nav -->
  </nav>
  <!-- /.megamenu-horizontal -->
</div>
            <!-- /.side-menu -->