<?php
use frontend\models\SettingCategory;
$cate = new SettingCategory();
if (!empty($dataCateSet)): ?>

<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
   <h3 class="section-title">Category</h3>
   <div class="sidebar-widget-body m-t-10">
      <div class="accordion">
         <?php $i=1; foreach ($dataCateSet as $value): ?>
            
         <div class="accordion-group">
            <div class="accordion-heading">
               <a href="#collapseOne_<?= $i ?>" data-toggle="collapse" class="accordion-toggle collapsed">
               <?= $value['name'] ?>
               </a>
            </div>
            <!-- /.accordion-heading -->
            <?php 
            $catesub = $cate->getAllCat($value['id']);
            ?>   
            <?php if (!empty($catesub)): ?>

            <div class="accordion-body collapse" id="collapseOne_<?= $i ?>" style="height: 0px;">
               <div class="accordion-inner">
                  <ul>
                     <?php foreach ($catesub as $valuesub): ?>
                     <li><a href="<?= Yii::$app->homeUrl.'danh-sach/'.$valuesub['slug_cate'] ?>"><?= $valuesub['name'] ?></a></li>
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