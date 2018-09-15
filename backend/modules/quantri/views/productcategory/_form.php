<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Productcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cateName',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_parent_id',['options' => ['class' => 'col-md-4']])->widget(Select2::classname(), [
            'data' => $dataCat,
            'language' => 'vi',
            'options' => ['placeholder' => 'Select a category ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'title',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order',['options' => ['class' => 'col-md-2']])->textInput(['type' => 'number']) ?>

    <div class="btn-group-toggle col-md-2 clickform">
      <label class="btn btn-success btn-outline">
         <?= $form->field($model, 'home_page',['options' => ['class' => 'activeform']])->checkbox() ?>
      </label>
    </div>
    <div class="clearfix"></div>
    <div class="btn-group-toggle col-md-2 clickform">
      <label class="btn btn-success btn-outline">
         <?= $form->field($model, 'active',['options' => ['class' => 'activeform']])->checkbox() ?>
      </label>
    </div>
    <?= $form->field($model, 'keyword',['options' => ['class' => 'col-md-10']])->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6,'class'=>'content']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6,'class'=>'content']) ?>

    <?= $form->field($model, 'short_introduction')->textarea(['rows' => 6,'class'=>'content']) ?>


    <?php // $form->field($model, 'active')->textInput() ?>

    
    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
