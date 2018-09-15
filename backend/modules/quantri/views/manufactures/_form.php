<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Manufactures */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manufactures-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ManName',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id',['options' => ['class' => 'col-md-4']])->widget(Select2::classname(), [
            'data' => $dataManufac,
            'language' => 'en',
            'options' => ['placeholder' => 'Select a category ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'image',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Click chọn ảnh']) ?>
    <div class="clearfix"></div>
    
    <?= $form->field($model, 'slug',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'title',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>
    <?php // $form->field($model, 'active',['options' => ['class' => 'col-md-2']])->textInput() ?>

    <?= $form->field($model, 'order',['options' => ['class' => 'col-md-2']])->textInput(['type' => 'number']) ?>
    
    <div class="btn-group-toggle col-md-2 clickform">
      <label class="btn btn-success btn-outline">
         <?= $form->field($model, 'active',['options' => ['class' => 'activeform']])->checkbox() ?>
      </label>
    </div>

    <div class="clearfix"></div>

    <?= $form->field($model, 'keyword')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6,'class' => 'content']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6,'class' => 'content']) ?>

    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
