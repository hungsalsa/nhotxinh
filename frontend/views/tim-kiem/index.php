<?php 
use yii\helpers\Url;
use frontend\widgets\categoriesWidget;
use yii\widgets\LinkPager;
$this->title = (isset($_GET['key'])? $_GET['key']:'' );
 ?>
 <div class='col-md-3 sidebar'>
 	<?= categoriesWidget::widget() ?>
 </div>
<!-- /.sidebar -->
<div class='col-md-9'>
   <!-- ========================================== SECTION – HERO ========================================= -->
   <div id="category" class="">
      <div class="item">
         <h1>Quí khách tìm kiếm : <?= (isset($_GET['key'])? $_GET['key']:'' ) ; ?></h1>
      </div>
   </div>

   <!-- ========================================= SECTION – HERO : END ========================================= -->
   <div class="clearfix filters-container m-t-10">
      <div class="row">
         <div class="col col-sm-6 col-md-2">
            <div class="filter-tabs">
               <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active">
                     <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-list"></i>Grid</a>
                  </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th"></i>List</a></li>
               </ul>
            </div>
            <!-- /.filter-tabs -->
         </div>
         <!-- /.col -->
        <!--  <div class="col col-sm-12 col-md-6">
           <div class="col col-sm-3 col-md-6 no-padding">
              <div class="lbl-cnt">
                 <span class="lbl">Sort by</span>
                 <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                       <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                       Position <span class="caret"></span>
                       </button>
                       <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                       </ul>
                    </div>
                 </div>
                 /.fld
              </div>
              /.lbl-cnt
           </div>
           /.col
           <div class="col col-sm-3 col-md-6 no-padding">
              <div class="lbl-cnt">
                 <span class="lbl">Show</span>
                 <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                       <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                       1 <span class="caret"></span>
                       </button>
        
                       <ul role="menu" class="dropdown-menu">
        
                          <li role="presentation"><a href="#">1</a></li>
                          <li role="presentation"><a href="#">2</a></li>
                          <li role="presentation"><a href="#">3</a></li>
                          <li role="presentation"><a href="#">4</a></li>
                          <li role="presentation"><a href="#">5</a></li>
                          <li role="presentation"><a href="#">6</a></li>
                          <li role="presentation"><a href="#">7</a></li>
                          <li role="presentation"><a href="#">8</a></li>
                          <li role="presentation"><a href="#">9</a></li>
                          <li role="presentation"><a href="#">10</a></li>
                       </ul>
                    </div>
                 </div>
                 /.fld
              </div>
              /.lbl-cnt
           </div>
           /.col
        </div>
        /.col -->
         <div class="col col-sm-6 col-md-10">
            <div class="text-right">
                <?php
                  echo    LinkPager::widget([
                        'pagination' => $pages,
                        'firstPageLabel'=>'|<',
                        'lastPageLabel'=>'>|',
                        'prevPageLabel'=>'<<',
                        'nextPageLabel'=>'>>',
                        'maxButtonCount'=>3,
                        // 'linkAttributes'=>['class' => 'page-link'],
                        // 'route' => 'article/index'
                        // 'pageParam' => 'page',

                     ]);
                   ?>
               <!-- /.list-inline -->
            </div>
            <!-- /.pagination-container -->     
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <?php if (empty($productCat)): ?>
   		<h2>Chúng tôi không tìm thấy sản phẩm nào phù hợp với từ khóa: <?= $_GET['key'] ?></h2>
   <?php else: ?>
   	
   
   <div class="search-result-container">
      <div id="myTabContent" class="tab-content">
         <div class="tab-pane active" id="grid-container">
            <div class="category-product  inner-top-vs">
               <div class="row">
                  <?php $i=1; foreach ($productCat as $value): ?>
                  <div class="col-sm-6 col-md-4">
                     <div class="products">
                        <div class="product">
                           <div class="product-image">
                              <div class="image">
                                
                                 <a href="<?= Url::to(['product/view', 'slug' => $value['slug']]) ?>"><img  src="<?= Yii::$app->homeUrl ?>vender/images/blank.gif" data-echo="<?= Yii::$app->homeUrl.$value['image'] ?>" alt="<?= 'sad' ?>" width="98%"></a>
                              </div>
                              <!-- /.image -->  
                              <?php 
                                 $product_type_id = json_decode($value['product_type_id']); 
                                 if(!empty($product_type_id)){
                                    $product_type = $dataProType[$product_type_id[array_rand($product_type_id)]];
                                 }
                              ?> 
                              <div class="tag <?= (isset($product_type))? $product_type :'' ?>"><span><?= (isset($product_type))? $product_type :'' ?></span></div>
                           </div>
                           <!-- /.product-image -->
                           <div class="product-info text-left">
                              <h3 class="name"><a href="<?= Url::to(['product/view', 'slug' => $value['slug']]) ?>"><?= $value['pro_name'] ?></a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price">   
                                 <span class="price">
                                 <?= number_format((int)$value['price_sales'], 0, ',', '.');  ?> VNĐ                </span>
                                 <span class="price-before-discount"><?= ($value['price'])?number_format((int)$value['price_sales'], 0, ',', '.').' VNĐ':'' ?></span>
                              </div>
                              <!-- /.product-price -->
                           </div>
                           <!-- /.product-info -->
                           <div class="cart clearfix animate-effect">
                              <div class="action">
                                 <button class="btn btn-primary" type="button">Add to cart</button>
                                 <button class="left btn btn-primary" type="button"><i class="icon fa fa-heart"></i></button>
                                 <button class="left btn btn-primary" type="button"><i class="fa fa-retweet"></i></button>                      
                              </div>
                              <!-- /.action -->
                           </div>
                           <!-- /.cart -->
                        </div>
                        <!-- /.product -->
                     </div>
                     <!-- /.products -->
                  </div>
                  <!-- /.item -->
                  <?php if ($i%3==0): ?>
                     <div class="clearfix"></div>
                  <?php endif ?>
                  <?php $i++; endforeach ?>
               </div>
               <!-- /.row -->
            </div>
            <!-- /.category-product -->
         </div>
         <!-- /.tab-pane -->
         <div class="tab-pane"  id="list-container">
            <div class="category-product inner-top-vs">
               <?php foreach ($productCat as $value): ?>
               <div class="category-product-inner">
                  <div class="products">
                     <div class="product-list product">
                        <div class="row product-list-row">
                           <div class="col col-sm-4 col-lg-4">
                              <div class="product-image">
                                 <div class="image">
                                    <img width="98%" data-echo="<?= Yii::$app->homeUrl.$value['image'] ?>" src="<?= Yii::$app->homeUrl?>vender/images/blank.gif" alt="">
                                 </div>
                              </div>
                              <!-- /.product-image -->
                           </div>
                           <!-- /.col -->
                           <div class="col col-sm-8 col-lg-8">
                              <div class="product-info">
                                 <h3 class="name"><a href="<?= Yii::$app->homeUrl.'product/view/'.$value['id'] ?>"><?= $value['pro_name'] ?></a></h3>
                                 <div class="rating rateit-small"></div>
                                 <div class="product-price">    
                                    <span class="price">
                                    <?= number_format((int)$value['price_sales'], 0, ',', '.');  ?> VNĐ                 </span>
                                    <span class="price-before-discount"> <?= ($value['price'])? number_format((int)$value['price_sales'], 0, ',', '.').' VNĐ':'' ?></span>
                                 </div>
                                 <!-- /.product-price -->
                                 <div class="description m-t-10"><?= $value['short_introduction'] ?></div>
                                 <div class="cart clearfix animate-effect">
                                    <div class="action">
                                       <button class="btn btn-primary" type="button">Add to cart</button>
                                       <button class="left btn btn-primary" type="button"><i class="icon fa fa-heart"></i></button>
                                       <button class="left btn btn-primary" type="button"><i class="fa fa-retweet"></i></button>                        
                                    </div>
                                    <!-- /.action -->
                                 </div>
                                 <!-- /.cart -->
                              </div>
                              <!-- /.product-info -->   
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.product-list-row -->
                        <?php 
                           $product_type_id = json_decode($value['product_type_id']); 
                           if(!empty($product_type_id)){
                              $product_type = $dataProType[$product_type_id[array_rand($product_type_id)]];
                           }
                        ?> 

                        <div class="tag <?= (isset($product_type))? $product_type:'' ?>"><span><?= (isset($product_type))? $product_type:'' ?></span></div>

                     </div>
                     <!-- /.product-list -->
                  </div>
                  <!-- /.products -->
               </div>
               <!-- /.category-product-inner -->
               <?php endforeach ?>
            </div>
            <!-- /.category-product -->
         </div>
         <!-- /.tab-pane #list-container -->
      </div>
      <!-- /.tab-content -->
      <div class="clearfix filters-container">
         <div class="text-right">
              
                  <?php
                  echo    LinkPager::widget([
                        'pagination' => $pages,
                        'firstPageLabel'=>'|<',
                        'lastPageLabel'=>'>|',
                        'prevPageLabel'=>'<<',
                        'nextPageLabel'=>'>>',
                        'maxButtonCount'=>3,
                        // 'linkAttributes'=>['class' => 'page-link'],
                        // 'route' => 'article/index'
                        // 'pageParam' => 'page',

                     ]);
                   ?>
                  <!-- <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li> -->
               <!-- /.list-inline -->
            <!-- /.pagination-container -->                             
         </div>
         <!-- /.text-right -->
      </div>
      <!-- /.filters-container -->
   </div>
   <!-- /.search-result-container -->
   <?php endif ?>
</div>
<!-- /.col -->

