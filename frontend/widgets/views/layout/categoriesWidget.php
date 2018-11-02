<?php 
use yii\helpers\Url;
use frontend\models\SettingCategories;
$cate = new SettingCategories();
if (!empty($dataCateSet)): ?>

<div class="side-menu animate-dropdown outer-bottom-xs">
      <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
      <nav class="yamm megamenu-horizontal" role="navigation">
         <ul class="nav">

            <?php foreach ($dataCateSet as $value): ?>
               
            <li class="dropdown menu-item">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-motorcycle fa-fw" aria-hidden="true"></i><?= $value['name'] ?></a>
               <?php 
                  $subCate = $cate->getAllCat($value['id']);
                  // echo'<pre>';print_r($subCate);
                  if (!empty($subCate)): 
                ?>
                <?php ?>
                
               <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                     <div class="row">
                        <?php foreach ($subCate as $subCate): ?>
                        <?php //print_r($subCate['slug_cate']); ?>
                        <div class="col-sm-12 col-md-3">
                           <ul class="links list-unstyled">
                              <li><a href="<?= Yii::$app->homeUrl.'san-pham/'.$subCate['slug_cate'] ;?>"><?= $subCate['name'] ?></a></li>
                           </ul>
                        </div>
                        <!-- /.col -->
                        <?php endforeach ?>
                        
                     </div>
                     <!-- /.row -->
                  </li>
                  <!-- /.yamm-content -->                    
               </ul>
               <!-- /.dropdown-menu -->    
               <?php endif ?>        
            </li>
            <!-- /.menu-item -->
            
            <?php endforeach ?>
            
         </ul>
         <!-- /.nav -->
      </nav>
      <!-- /.megamenu-horizontal -->
   </div>
   <!-- /.side-menu -->
<?php endif ?>