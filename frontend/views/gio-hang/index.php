<?php use common\libs\Docso; $docso = new Docso() ?>
<h1>Giỏ hàng của bạn <?= (empty($cart))?': đang trống ':'' ?></h1>
<!-- <div class="row inner-bottom-sm"> -->
   <div class="shopping-cart">
      <div class="col-md-12 col-sm-12 shopping-cart-table ">
         <div class="table-responsive" id="listCart">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     
                     <th class="cart-description item" width="10%">Ảnh</th>
                     <th class="cart-product-name item" width="40%">Tên sản phẩm</th>
                     <th class="cart-qty item" width="12%">Số lượng</th>
                     <th class="cart-sub-total item">Giá</th>
                     <th class="cart-total last-item">Thành tiền</th>
                     <th class="cart-romove item">Xóa</th>
                  </tr>
               </thead>
               <!-- /thead --> 
               
               <tbody>
               		<?php 
                     $subtotal = $amount = 0;
                     foreach ($cart as $key => $value): $image = str_replace("uploads", "icon", $value['image'])?>
                  <tr>
                     
                     <td class="cart-image"> <a class="entry-thumbnail" href="detail.html"> <img id="img_<?= $key ?>" height="90px" src="<?= $image ?>" alt=""> </a> </td>
                     <td class="cart-product-name-info">
                        <h4 class='cart-product-description' id="txtPro_<?= $key ?>"><a href="<?= Yii::$app->homeUrl.$value['slug'] ?>.html"><?= $value['pro_name'] ?></a></h4>
                        <!-- <div class="row">
                           <div class="col-sm-4">
                              <div class="rating rateit-small"></div>
                           </div>
                           <div class="col-sm-8">
                              <div class="reviews"> (06 Reviews) </div>
                           </div>
                        </div> -->
                        <!-- /.row --> 
                        <div class="cart-product-info"> 
                        	<!-- <span class="product-imel">IMEL:<span>084628312</span></span><br>  -->
                        	<span class="product-color">Hãng :  <?=($value['manufacturer_id'] !='')? $dataManu[$value['manufacturer_id']]:'' ?></span> 
                        </div>
                     </td>
                     <td class="cart-product-quantity">
                        <div class="quant-input">
                           <!-- <div class="arrows">
                              <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                              <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                           </div> -->
                           
                           <a href="javascript:void(0)" onclick="itemDown(<?= $key ?>)" style="position: absolute; left: -19px; top: 9px;"><i class="fa fa-minus"></i></a>
                           <input onchange="onchange_num(<?= $key ?>)" type="number" min="1" value="<?= $value['pro_sl'] ?>" id="quantity_<?= $key ?>" name="quantity_<?= $key ?>" style="padding: 0 11px;" class="text-center"> 
                           <a href="javascript:void(0)" onclick="itemUp(<?= $key ?>)" style="position: absolute; right: -19px; top: 9px;"><i class="fa fa-plus"></i></a>
                           <?php $amount += (int)$value['pro_sl'] ?>
                        </div>
                     </td>
                     <td class="cart-product-sub-total" id="txtPrice_<?= $key ?>"><span class="cart-sub-total-price text-right"><?= number_format($value['price_sales'],0,'.','.') ?></span></td>
                     <td class="cart-product-grand-total"><span class="cart-grand-total-price text-right" id="total_item_<?= $key ?>"><?= number_format($value['price_sales']*$value['pro_sl'],0,'.','.') ?></span></td>
                     <td class="romove-item"><a href="javascript:void(0)" onclick="deleteItem(<?= $key ?>)" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                     <?php $subtotal += (int)$value['price_sales']*$value['pro_sl'] ?>
                  </tr>
					<?php endforeach ?>
                  

               </tbody>
               <!-- /tbody --> 
               <tfoot>
                  <tr>
                     <td colspan="3" class="text-right">
                        <div class="shopping-cart-btn">Tổng tiền : </div>
                        <!-- /.shopping-cart-btn --> 
                     </td>
                     <td colspan="2" class="text-right"><strong>
                        <?= number_format($subtotal,0,'.','.') ?></strong>
                     </td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>Bằng chữ :</td>
                     <td colspan="5" class="text-right pr-4"><strong><?= $docso->convert_number_to_words($subtotal) ?></strong></td>
                  </tr>
               </tfoot>
            </table>
            <!-- /table --> 
         </div>
      </div>
      <!-- /.shopping-cart-table -->				
       
      <div class="col-md-12 col-sm-12 estimate-ship-tax" id="infoCustomer_cart">
         <form method="post" class="form-horizontal">
         <table class="table">
            <thead>
               <tr>
                  <th colspan="6">
                     <span class="estimate-title">Thông tin khách hàng</span> 
                  </th>
               </tr>
            </thead>
            <tfoot>
                  <tr>
                     <td colspan="6">
                        <p class="text-center first" style="margin-left: 183px;">
                           <button type="submit" class="btn btn-default first" style="color: #fff;">
                              <strong>Tiếp tục</strong>
                              <span style="font-size: 11px;">(Chọn hình thức nhận hàng)</span>
                           </button>
                        </p>
                        <p style="margin-top: 15px;">Hoặc</p>
                        <p class="text-center">
                           <button type="submit" class="btn btn-default">
                              <strong style="color: #337ab7">Đặt hàng luôn</strong>
                              <span style="color: #656565;font-size: 11px;">Mototech shop sẽ gọi điện cho quý khách</span>
                           </button>
                        </p>
                     </td>
                  </tr>
                  
               </tfoot>
            <tbody>
               <tr>
                  <td colspan="6">
                     
                        <div class="form-group">
                             <label class="col-sm-2 control-label">Tên đầy đủ <span style="color: red">*</span></label>
                             <div class="col-sm-8">
                              <input type="text" name="fullname" class="form-control unicase-form-control text-input" placeholder="Nhập tên đầy đủ" required="required"> 
                           </div>
                           </div>
                           <div class="form-group">
                             <label for="inputPassword" class="col-sm-2 control-label">Số điện thoại <span style="color: red">*</span></label>
                             <div class="col-sm-8">
                              <input type="text" name="phone" class="form-control unicase-form-control text-input" placeholder="Nhập số điện thoại" required="required"> 
                           </div>
                        </div>
                        <div class="form-group">
                             <label for="inputPassword" class="col-sm-2 control-label">Email<br><span>(không bắt buộc)</span></label>
                             <div class="col-sm-8">
                              <input type="text" name="email" class="form-control unicase-form-control text-input" placeholder="Nhập email">
                              <span>Chi tiết đơn hàng sẽ được gửi vào email</span>
                           </div>
                        </div>
                        <div class="form-group">
                             <label for="inputPassword" class="col-sm-2 control-label">Ghi chú</label>
                             <div class="col-sm-8">
                              <input type="text" name="note" class="form-control unicase-form-control text-input" placeholder="Ghi chú">
                           </div>
                        </div>
                    
                  </td>
               </tr>
            </tbody>
            <!-- /tbody --> 
         </table>
         <!-- /table --> 
          </form>
      </div>
      <!-- /.estimate-ship-tax --> 
      
   </div>
   <!-- /.shopping-cart --> 
<!-- </div> -->
<!-- /.row -->