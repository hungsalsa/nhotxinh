<?php 
$totalAmount = $total =0;
if(!empty($infoCart)){
foreach ($infoCart as $value) {
   $totalAmount += $value['pro_sl'];
   $total += $value['price_sales']*$value['pro_sl'];
}
}
?>
<div class="dropdown dropdown-cart">
   <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
      <div class="items-cart-inner">
         <div class="total-price-basket">
            <span class="lbl">giỏ hàng -</span>
            <span class="total-price">
               <span class="sign">$</span>
               <span class="value" id="total"><?= number_format($total,0,'.','.') ?></span>
            </span>
         </div>
         <div class="basket">
            <i class="glyphicon glyphicon-shopping-cart"></i>
         </div>
         <div class="basket-item-count"><span class="count" id="amount"><?= $totalAmount ?></span></div>
      </div>
   </a>
   <?php if (!empty($infoCart)): ?>
   <ul class="dropdown-menu">
      <li>
         <div class="cart-item product-summary" id="dropdown-sub-cart">
            <?php foreach ($infoCart as $key=> $value): ?>
            <div class="row" id="item_<?= $key ?>">
               <div class="col-xs-4">
                  <div class="image">
                     <a href="###"><img style="max-height: 80px" src="<?= Yii::$app->homeUrl.$value['image'] ?>" alt="<?= $value['pro_name'] ?>"></a>
                  </div>
               </div>
               <div class="col-xs-7">
                  <h3 class="name"><a href="index.php?page-detail"><?= $value['pro_name'] ?></a></h3>
                  <div class="price">$<?= number_format($value['price_sales'],0,'.','.') ?></div>
               </div>
               <div class="col-xs-1 action">
                  <a href="javascript:void(0)" onclick="delCart(<?= $key ?>)"><i class="fa fa-trash"></i></a>
               </div>
            </div>
            <?php endforeach ?>
            
         </div>
         <!-- /.cart-item -->
         <div class="clearfix"></div>
         <hr>
         <div class="clearfix cart-total">
            <div class="pull-right">
               <span class="text">Tổng tiền :</span><span class='price'>$<?= number_format($total,0,'.','.') ?></span>
            </div>
            <div class="clearfix"></div>
            <a href="<?= Yii::$app->homeUrl ?>gio-hang" class="btn btn-upper btn-primary btn-block m-t-20">Đến giỏ hàng</a> 
         </div>
         <!-- /.cart-total-->
      </li>
   </ul>
   <!-- /.dropdown-menu-->
   <?php endif ?>
</div>
            <!-- /.dropdown-cart -->