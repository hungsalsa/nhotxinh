<?php
use frontend\models\SettingCategory;
$cate = new SettingCategory();
if (!empty($dataCateSet)): ?>

<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
   <h3 class="section-title">Category</h3>
   <div class="sidebar-widget-body m-t-10">
      <div class="accordion">
         <?php $i=1; foreach ($dataCateSet as $value): 
            $catesub = $cate->getAllCat($value['id']);
         ?>
             
            <div class="accordion-group">
            <div class="accordion-heading">
               <a href="<?= count($catesub)? "#collapseOne_".$i:Yii::$app->homeUrl.'san-pham/'.$value['slug']; ?>" <?= count($catesub)? 'data-toggle="collapse"':'' ?> class="accordion-toggle collapsed">
               <?= $value['name'] ?>
               </a>
            </div>
            <!-- /.accordion-heading -->
            <?php 
            
            ?>   
            <?php if (!empty($catesub)): ?>

            <div class="accordion-body collapse" id="collapseOne_<?= $i ?>" style="height: 0px;">
               <div class="accordion-inner">
                  <ul>
                     <?php foreach ($catesub as $valuesub): ?>
                     <li><a href="<?= Yii::$app->homeUrl.'san-pham/'.$valuesub['slug'] ?>"><?= $valuesub['name'] ?></a></li>
                     <?php endforeach ?>
                  </ul>
               </div>
               <!-- /.accordion-inner -->
            </div>
            <!-- /.accordion-body -->
            <?php endif ?>
         </div>
         <?php $i++; endforeach?>

         
         <!-- /.accordion-group -->
      </div>
      <!-- /.accordion -->
   </div>
   <!-- /.sidebar-widget-body -->
</div>
<?php endif ?>