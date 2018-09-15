<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pro_name',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?= 
        $form->field($model, 'product_category_id',['options' => ['class' => 'col-md-3']])->widget(Select2::classname(), [
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
            'options' => ['placeholder' => 'Select a category ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'price',['options' => ['class' => 'col-md-2']])->textInput() ?>

    <?= $form->field($model, 'image',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'images_list',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_sale',['options' => ['class' => 'col-md-2']])->textInput() ?>

    <?= $form->field($model, 'end_sale',['options' => ['class' => 'col-md-2']])->textInput() ?>

    <?= $form->field($model, 'price_sales',['options' => ['class' => 'col-md-2']])->textInput() ?>

    <?= $form->field($model, 'code',['options' => ['class' => 'col-md-2']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'models_id',['options' => ['class' => 'col-md-2']])->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tags',['options' => ['class' => 'col-md-2']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'related_articles',['options' => ['class' => 'col-md-12']])->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'keyword')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6,'class' => 'content']) ?>

    <?= $form->field($model, 'short_introduction')->textarea(['rows' => 6,'class' => 'content']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6,'class' => 'content']) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'salse')->textInput() ?>

    <?= $form->field($model, 'hot')->textInput() ?>

    <?= $form->field($model, 'best_seller')->textInput() ?>

    <?= $form->field($model, 'new')->textInput() ?>
    

    <?= $form->field($model, 'guarantee')->textInput() ?>

    <?= $form->field($model, 'views')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
