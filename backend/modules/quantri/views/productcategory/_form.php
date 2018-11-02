<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;
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

    <?= $form->field($model, 'title',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true,'id'=>'title_slug']) ?>

    
    <?= $form->field($seo, 'slug',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true,'id'=>'slug_url']) ?>

    <?= $form->field($model, 'image',['options' => ['class' => 'col-md-2']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Click chọn ảnh']) ?>
    <div class="col-md-2" style="height: 80px">
        <img src="<?= (isset($model->image))? $model->image:''?>" id="previewImage" alt="" style="height: 100%">
    </div>
    <?= $form->field($model, 'order',['options' => ['class' => 'col-md-1']])->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'home_page',['options' => ['class' => 'activeform col-md-2']])->widget(CheckboxX::classname(),
        [
        'initInputType' => CheckboxX::INPUT_CHECKBOX,
        'options'=>['value' => $model->home_page],
        ])->label(false);
    ?>
    <?= $form->field($model, 'keyword',['options' => ['class' => 'col-md-10']])->textInput(['rows' => 6]) ?>
    <?= $form->field($model, 'active',['options' => ['class' => 'activeform col-md-2']])->widget(CheckboxX::classname(),
        [
        'initInputType' => CheckboxX::INPUT_CHECKBOX,
        'options'=>['value' => $model->active],
        ])->label(false);
    ?>
<div class="clearfix"></div>

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
