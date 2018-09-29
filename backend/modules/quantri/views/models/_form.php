<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Models */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="models-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name',['options' => ['class' => 'col-md-5']])->textInput(['maxlength' => true]) ?>

    <?= 
        $form->field($model, 'parent_id',['options' => ['class' => 'col-md-3']])->widget(Select2::classname(), [
            'data' => $dataModel,
            'language' => 'en',
            'options' => ['placeholder' => 'Select a Model ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    <?= $form->field($model, 'order',['options' => ['class' => 'col-md-2']])->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'active',['options' => ['class' => 'activeform col-md-2']])->widget(CheckboxX::classname(),
        [
        'initInputType' => CheckboxX::INPUT_CHECKBOX,
        'options'=>['value' => $model->active],
        ])->label(false);
    ?>
	<div class="clearfix"></div>

    <div class="form-group col-md-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
