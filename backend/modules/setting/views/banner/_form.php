<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\Banner */
/* @var $form yii\widgets\ActiveForm */
$image='';
$file_path_current =  $_SERVER['DOCUMENT_ROOT'] .'/'. $model->image;
if (file_exists($file_path_current)){
    $image = $model->image;
}

?>

<div class="banner-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image',['options' => ['class' => 'col-md-3']])->fileInput(['maxlength' => true,'placeholder'=>'Chọn ảnh cỡ 870x370px','id'=>'uploadImage', "onchange"=>"PreviewImage();","value"=>$image])->label('Chon ảnh cỡ 870x370px') ?>

    <div class="col-md-3" style="height: 80px">
        <img src="<?= (isset($model->image))? Yii::$app->request->hostinfo.'/'.$model->image:''?>" id="uploadPreview" alt="" style="height: 100%;max-width: 100%">
    </div>

    <?= $form->field($model, 'order',['options' => ['class' => 'col-md-1']])->textInput(['type'=>'number','max'=>999,'placeholder'=>'Bằng 999 nếu không nhập']) ?>

    <?= $form->field($model, 'status',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
        [
        'initInputType' => CheckboxX::INPUT_CHECKBOX,
        'options'=>['value' => $model->status],
        ])->label(false);
    ?>
    <div class="clearfix"></div>
    <?= $form->field($model, 'url',['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alt',['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6,'class' => 'content']) ?>

    <div class="clearfix"></div>

    <div class="form-group btn_save">
        <?= Html::submitButton($model->isNewRecord ? ' Thêm mới ': ' Chỉnh sửa ', ['class' => 'btn btn-success btn_luu']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
// $this->registerJsFile('@web/js/dichvu/addchitiet.js', ['depends' => [\yii\web\JqueryAsset::class]] );
$this->registerJsFile("@web/tinymce/tinymce.min.js", ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile("@web/js/main2.js", ['depends' => [yii\web\JqueryAsset::className()]]);
?>