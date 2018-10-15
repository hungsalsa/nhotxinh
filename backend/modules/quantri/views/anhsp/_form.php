<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\AppAsset;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;
/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Imgprolist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imgprolist-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'pro_id',['options' => ['class' => 'col-md-4']])->dropDownList($listPro,[ 'disabled' => 'disabled']) ?>
    <?= $form->field($model, 'image',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Chọn ảnh cỡ 370x450 px']) ?>
    <div class="col-md-1" style="height: 80px">
        <img src="<?= (isset($model->image))? Yii::$app->request->hostInfo.'/'.$model->image:''?>" id="previewImage" alt="" style="height: 100%">
    </div>
    <?= $form->field($model, 'status',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
        [
        'initInputType' => CheckboxX::INPUT_CHECKBOX,
        'options'=>['value' => $model->status],
        ])->label(false);
    ?>
    <?= $form->field($model, 'title',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alt',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    
    <div class="clearfix"></div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
