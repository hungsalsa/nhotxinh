<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\AppAsset;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Imgprolist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imgprolist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pro_id',['options' => ['class' => '']])->widget(Select2::classname(), [
            'data' => $listPro,
            'language' => 'en',
            'options' => ['placeholder' => 'Select a category ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    <?= $form->field($model, 'image',['options' => ['class' => 'col-md-10']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Click chọn ảnh']) ?>
    <div class="col-md-2" style="height: 80px">
        <img src="<?= (isset($model->image))? Yii::$app->request->hostInfo.'/'.$model->image:''?>" id="previewImage" alt="" style="height: 100%">
    </div>
	
	<div class="clearfix"></div>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alt')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
