<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>


    <div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs tab_header" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin

        </a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Seo</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Liên kết</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <?= $form->field($model, 'name',['options'=>['class'=>'col-md-3']])->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'images',['options' => ['class' => 'col-md-2']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Chọn ảnh cỡ 370x165 px']) ?>
            <div class="col-md-1" style="height: 80px">
                <img src="<?= (isset($model->images))? Yii::$app->request->hostInfo.'/'.$model->images:''?>" id="previewImage" alt="" style="height: 100%">
            </div>

            <?= $form->field($model, 'hot',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
                [
                    'initInputType' => CheckboxX::INPUT_CHECKBOX,
                    'options'=>['value' => $model->hot],
                ])->label(false);
                ?>
                <?= $form->field($model, 'status',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
                    [
                        'initInputType' => CheckboxX::INPUT_CHECKBOX,
                        'options'=>['value' => $model->status],
                    ])->label(false);
                    ?>
                    <?= $form->field($model, 'sort',['options' => ['class' => 'col-md-2']])->textInput(['type' => 'number']) ?>
                    <?= $form->field($model, 'view',['options' => ['class' => 'col-md-2']])->textInput(['type' => 'number']) ?>
                    <div class="clearfix"></div>
                    <?= $form->field($model, 'short_description')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'content')->textarea(['rows' => 6,'class' => 'content']) ?>

                </div>

                <div role="tabpanel" class="tab-pane" id="profile">
                    <?= $form->field($model, 'htmltitle',['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true,'id'=>'title_slug']) ?>
                    <?= $form->field($seo, 'slug',['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true,'id'=>'slug_url']) ?>
                    <?= $form->field($model, 'htmlkeyword')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'htmldescriptions')->textarea(['rows' => 6]) ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">

                   <?= $form->field($model, 'category_id',['options' => ['class' => 'col-md-6']])->widget(Select2::classname(), [
                    'data' => $datacat,
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select a category ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?= $form->field($model, 'related_products',['options' => ['class' => 'col-md-6']])->widget(Select2::classname(), [
                    'data' => $dataProduct,
                    'language' => 'vi',
                    'options' => ['placeholder' => 'Select a product ...', 'multiple' => true],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
                <?= $form->field($model, 'related_news')->widget(Select2::classname(), [
                    'data' => $dataNews,
                    'language' => 'vi',
                    'options' => ['placeholder' => 'Select a product ...', 'multiple' => true],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>

        </div>
    </div>

     <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('  Hủy  ', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
