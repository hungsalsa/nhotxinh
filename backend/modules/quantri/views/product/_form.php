<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\number\NumberControl;
use kartik\checkbox\CheckboxX;
/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pro_name',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_category_id',['options' => ['class' => 'col-md-3']])->widget(Select2::classname(), [
            'data' => $dataCat,
            'language' => 'en',
            'options' => ['placeholder' => 'Select a category ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    
    <?= 
        $form->field($model, 'manufacturer_id',['options' => ['class' => 'col-md-3']])->widget(Select2::classname(), [
            'data' => $dataManufac,
            'language' => 'en',
            'options' => ['placeholder' => 'Select a manufacture ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <div class="col-md-2">
        <label>Giá</label>
        <?php 
            echo NumberControl::widget([
                'model' => $model,
                'attribute' => 'price',
                'maskedInputOptions' => ['digits' => 0  ],
                 'displayOptions' => ['label'=>'<label>Giá sản phẩm: </label>'],
            ]);
        ?>
    </div>
    <div class="clearfix"></div>
    <?= $form->field($model, 'image',['options' => ['class' => 'col-md-2']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Click chọn ảnh']) ?>
    <div class="col-md-1" style="height: 80px">
        <img src="<?= (isset($model->image))? Yii::$app->request->hostInfo.'/'.$model->image:''?>" id="previewImage" alt="" style="height: 100%">
    </div>
    <?php // $form->field($model, 'images_list',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true,'id'=>'title_slug']) ?>

    <?= $form->field($model, 'slug',['options' => ['class' => 'col-md-5']])->textInput(['maxlength' => true,'id'=>'slug_url']) ?>
    <div class="clearfix"></div>
    <?= $form->field($model, 'start_sale',['options' => ['class' => 'col-md-2']])->textInput() ?>

    <?= $form->field($model, 'end_sale',['options' => ['class' => 'col-md-2']])->textInput() ?>
    

    <div class="col-md-2">
        <label>Giá bán</label>
        <?php 
            echo NumberControl::widget([
                'model' => $model,
                'attribute' => 'price_sales',
                'maskedInputOptions' => ['digits' => 0  ],
                 'displayOptions' => ['label'=>'<label>Giá sản phẩm: </label>'],
            ]);
        ?>
    </div>

    <?= $form->field($model, 'code',['options' => ['class' => 'col-md-2']])->textInput(['maxlength' => true]) ?>

    <div class="col-md-4">
        <label class="control-label">Cho xe</label>
    <?php
        echo Select2::widget([
        // 'model' => $model,
        // 'attribute' => 'models_id',
        'name' => 'Product[models_id]',
        'hideSearch' => false,
        'value' => json_decode($model->models_id), // initial value (will be ordered accordingly and pushed to the top)
        'data' => $dataModel,
        'maintainOrder' => true,
        'options' => ['placeholder' => 'Select xe sử dụng ...', 'multiple' => true],
        'pluginOptions' => [
            'maximumInputLength' => 10
        ],
    ]);
    ?>
    </div>
    <div class="clearfix"></div>
    <?php // $form->field($model, 'tags',['options' => ['class' => 'col-md-2']])->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'related_articles',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order',['options' => ['class' => 'col-md-1']])->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'guarantee',['options' => ['class' => 'col-md-1']])->textInput(['type'=>'number']) ?>
    
    <?php //echo $form->field($model, 'salse',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(), ['initInputType' => CheckboxX::INPUT_CHECKBOX, 'options'=>['value' => $model->salse], ])->label(false); ?>
    <?php //echo $form->field($model, 'hot',['options' => ['class' => 'activeform col-md-2']])->widget(CheckboxX::classname(), ['initInputType' => CheckboxX::INPUT_CHECKBOX, 'options'=>['value' => $model->hot], ])->label(false); ?>
    <?php //echo  $form->field($model, 'best_seller',['options' => ['class' => 'activeform col-md-2']])->widget(CheckboxX::classname(), ['initInputType' => CheckboxX::INPUT_CHECKBOX, 'options'=>['value' => $model->best_seller], ])->label(false); ?>
    <?php  //echo $form->field($model, 'new',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(), ['initInputType' => CheckboxX::INPUT_CHECKBOX, 'options'=>['value' => $model->new], ])->label(false); ?>

     <?= 
        $form->field($model, 'product_type_id',['options' => ['class' => 'col-md-3']])->widget(Select2::classname(), [
            'data' => $dataType,
            'language' => 'en',
            'options' => ['placeholder' => 'Select a product Type ...', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    

    <?= $form->field($model, 'active',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
        [
        'initInputType' => CheckboxX::INPUT_CHECKBOX,
        'options'=>['value' => $model->active],
        ])->label(false);
    ?>
    

    

    <?php // $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'keyword',['options' => ['class' => 'col-md-12']])->textInput() ?>
    <div class="clearfix"></div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6,'class' => 'content']) ?>

    <?= $form->field($model, 'short_introduction')->textarea(['rows' => 6,'class' => 'content']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6,'class' => 'content']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
