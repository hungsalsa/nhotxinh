<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;
/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cateName',['options'=>['class'=>'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'groupId',['options'=>['class'=>'col-md-4']])->widget(Select2::classname(), [
            'data' => $dataGroups,
            'language' => 'en',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
     ?>

    <?=
        $form->field($model, 'parent_id',['options'=>['class'=>'col-md-4']])->widget(Select2::classname(), [
            'data' => $datacat,
            'language' => 'en',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
     ?>
    <div class="clearfix"></div>

    <?= $form->field($model, 'title',['options'=>['class'=>'col-md-4']])->textInput(['maxlength' => true,'id'=>'title_slug']) ?>

    <?= $form->field($seo, 'slug',['options'=>['class'=>'col-md-3']])->textInput(['maxlength' => true,'id'=>'slug_url','placeholder' => 'Tự động sinh nếu để trông']) ?>

    <?= $form->field($model, 'images',['options' => ['class' => 'col-md-2']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Click chọn ảnh']) ?>
    <div class="col-md-1" style="height: 80px">
        <img src="<?= (isset($model->image))? Yii::$app->request->hostInfo.'/'.$model->image:''?>" id="previewImage" alt="" style="height: 100%">
    </div>

    <?= $form->field($model, 'sort',['options' => ['class' => 'col-md-2']])->textInput() ?>
    <div class="clearfix"></div>
    <?= $form->field($model, 'keyword',['options' => ['class' => 'col-md-11']])->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
        [
        'initInputType' => CheckboxX::INPUT_CHECKBOX,
        'options'=>['value' => $model->status],
        ])->label(false);
    ?>
    <div class="clearfix"></div>
    <?= $form->field($model, 'descriptions')->textarea(['rows' => 6]) ?>

    

    <div class="form-group" style="float:left;margin:21px">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
