<?php use yii\helpers\Url;use yii\helpers\Html; ?>
<div class="modal fade" tabindex="-1" role="dialog" id="shoppingcart">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Bạn vửa thêm sản phẩm vào giỏ hàng</h4>
        </div>
        <div class="modal-body" style="overflow: hidden;">
            <div class="col-md-4">
                <img src="" id="imgPreview" alt="" width="60%">
            </div>
            <div class="col-md-8">
                <h4>Tên sản phẩm : <span id="txtNameProduct"></span></h4>
                <p>Giá sản phẩm: <span id="txtprice"></span></p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            <?= Html::a('Dến giỏ hàng', Yii::$app->request->hostInfo.'/gio-hang',['data-method' => 'post','class' => 'btn btn-default']) ?>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" tabindex="-1" role="dialog" id="deleteshopping">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Bạn có muốn xóa sản phẩm này khỏi giỏ hàng</h4>
        </div>
        <div class="modal-body" style="overflow: hidden;">
            <div class="col-md-4">
                <img src="" id="imgPreviewdel" alt="" width="60%">
            </div>
            <div class="col-md-8">
                <h4>Tên sản phẩm : <span id="txtNameProductdel"></span></h4>
                <p>Giá sản phẩm: <span id="txtpricedel"></span></p>
            </div>
        </div>
        <div class="modal-footer">
            <button id="modal_delete" type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteItem('0')"><span class="glyphicon glyphicon-trash"></span>Xóa sản phẩm</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
