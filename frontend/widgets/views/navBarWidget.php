<?php 
use frontend\models\Menus;
$menu = new Menus();
?>
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                    <div class="nav-outer">
                        <ul class="nav navbar-nav">
                            
                            <li class="dropdown yamm-fw">
                                    <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8">
                                                        <div class="row">
                                                            <div class='col-md-12'>

                                                             <div class="col-xs-12 col-sm-6 col-md-3">
                                                                <h2 class="title">Computer</h2>
                                                                <ul class="links">
                                                                    <li><a href="#">Lenovo</a></li>
                                                                    <li><a href="#">Microsoft </a></li>
                                                                    <li><a href="#">Fuhlen</a></li>
                                                                    <li><a href="#">Longsleeves</a></li>
                                                                </ul>
                                                            </div><!-- /.col -->

                                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                                <h2 class="title">Camera</h2>
                                                                <ul class="links">
                                                                    <li><a href="#">Fuhlen</a></li>
                                                                    <li><a href="#">Lenovo</a></li>
                                                                    <li><a href="#">Microsoft </a></li>                   
                                                                    <li><a href="#">Longsleeves</a></li>
                                                                </ul>
                                                            </div><!-- /.col -->

                                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                                <h2 class="title">Apple Store</h2>
                                                                <ul class="links">
                                                                    <li><a href="#">Longsleeves</a></li>
                                                                    <li><a href="#">Fuhlen</a></li>
                                                                    <li><a href="#">Lenovo</a></li>
                                                                    <li><a href="#">Microsoft </a></li>                                       
                                                                </ul>
                                                            </div><!-- /.col -->

                                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                                <h2 class="title">Smart Phone</h2>
                                                                <ul class="links">
                                                                    <li><a href="#">Microsoft </a></li> 
                                                                    <li><a href="#">Longsleeves</a></li>
                                                                    <li><a href="#">Fuhlen</a></li>
                                                                    <li><a href="#">Lenovo</a></li>

                                                                </ul>
                                                            </div><!-- /.col -->

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                </div>
                                            </div><!-- /.row -->

                                            <!-- ============================================== WIDE PRODUCTS ============================================== -->
                                            <div class="wide-banners megamenu-banner">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="wide-banner cnt-strip">
                                                                        <div class="image">
                                                                            <img class="img-responsive" data-echo="<?= Yii::$app->homeUrl ?>vender/images/banners/4.jpg" src="<?= Yii::$app->homeUrl ?>vender/images/blank.gif" alt="">
                                                                        </div>  
                                                                        <div class="strip">
                                                                            <div class="strip-inner text-right">
                                                                                <h3 class="white">new trend</h3>
                                                                                <h2 class="white">apple product</h2>
                                                                            </div>  
                                                                        </div>
                                                                    </div><!-- /.wide-banner -->
                                                                </div><!-- /.col -->

                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="wide-banner cnt-strip">
                                                                        <div class="image">
                                                                            <img class="img-responsive" data-echo="<?= Yii::$app->homeUrl ?>vender/images/banners/5.jpg" src="<?= Yii::$app->homeUrl ?>vender/images/blank.gif" alt="">
                                                                        </div>  
                                                                        <div class="strip">
                                                                            <div class="strip-inner text-left">
                                                                               <h3 class="white">camera collection</h3>
                                                                               <h2 class="white">new arrivals</h2>
                                                                           </div>  
                                                                       </div>
                                                                   </div><!-- /.wide-banner -->
                                                               </div><!-- /.col -->
                                                           </div>

                                                       </div><!-- /.row -->
                                                   </div>
                                                   <div class="col-sm-12 col-md-4 hidden-xs hidden-sm">
                                                      <p class="text ">LenovoProin gravida nibh vel velit auctor aliquet es  Aenean sollicitudin,lorem quis bibendu auctor,nisi elit consequat ipsum auctor.</p>
                                                  </div>
                                              </div>
                                          </div><!-- /.wide-banners -->

                                          <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

                                      </div><!-- /.yamm-content -->                   
                                  </li>
                              </ul>
                            </li>
                            
                            <?php foreach ($dataMenu as $key => $value): ?>
                                <?php $link_1 = $menu->getLinkType($value['type']); 
                                if($value['link_cate']==''){
                                     $link_1 = str_replace(strstr($link_1,'/'),'',$link_1);
                                }else{
                                    $link_1 .= $value['link_cate'];
                                }
                                ?> 

                            <li class="dropdown<?= ($value['type']!=3)?' yamm':'' ?>">
                                <a href="<?= ($value['type']==3)?Yii::$app->homeUrl.$link_1:'' ?>"<?php if ($value['type']!=3): ?> data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"<?php endif ?>><?= $value['name'] ?></a> 
                                <?php $dataMenuSub1 = $menu->getMenusByParent($value['id']); ?> 
                                <?php if (!empty($dataMenuSub1) && $value['type']!=3): ?>
                                <ul class="dropdown-menu">
                                   <li>
                                      <div class="yamm-content">
                                         <div class="row">
                                            <div class='col-sm-12'>
                                              
                                                   <?php foreach ($dataMenuSub1 as $key1 => $value1): ?>
                                                   <?php if (count($dataMenuSub1)): ?>
                                                    <div class="col-xs-12 col-sm-12 <?php if (count($dataMenuSub1)==2) {echo 'col-md-6'; } elseif(count($dataMenuSub1)>2){echo 'col-md-4'; }else{echo 'col-md-12'; } ?>">
                                                      <h2 class="title"><a href="<?= Yii::$app->homeUrl.$menu->getLinkType($value1['type']).$value1['link_cate'] ?>"><?= $value1['name'] ?></a></h2>
                                                      <?php $dataMenuSub2 = $menu->getMenusByParent($value1['id']);  ?>
                                                      <?php if (!empty($dataMenuSub2)): ?>
                                                      <ul class="links">
                                                        <?php foreach ($dataMenuSub2 as $key2 => $value2): ?>
                                                         <li><a href="<?= Yii::$app->homeUrl.$menu->getLinkType($value2['type']).$value2['link_cate'] ?>">Computer Cases &amp; Accessories</a></li>
                                                        <?php endforeach ?>
                                                         
                                                      </ul>
                                                  <?php endif ?>
                                                   </div>
                                                   
                                                   <!-- /.col --> 
                                                   <?php endif ?>
                                                <?php endforeach ?> 
                                            
                                            </div>
                                         </div>
                                         <!-- /.row --> 
                                      </div>
                                      <!-- /.yamm-content --> 
                                   </li>
                                </ul>
                                <?php endif ?>
                             </li>
                            <?php endforeach ?>

                        </ul><!-- /.navbar-nav -->
                        <div class="clearfix"></div>                
                    </div><!-- /.nav-outer -->
                </div><!-- /.navbar-collapse -->


            </div><!-- /.nav-bg-class -->
        </div><!-- /.navbar-default -->
    </div><!-- /.container-class -->

</div><!-- /.header-nav -->