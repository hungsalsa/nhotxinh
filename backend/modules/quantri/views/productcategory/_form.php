<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Productcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cateName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_parent_id')->dropDownList($dataCat,['prompt'=>'-- Chọn danh mục cha --']) ?>

    <?= $form->field($model, 'keyword')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'short_introduction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'home_page')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?php // $form->field($model, 'active')->textInput() ?>

    <div class="btn-group-toggle">
      <label class="btn btn-success btn-outline">
         <?= $form->field($model, 'active')->checkbox() ?>
      </label>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
