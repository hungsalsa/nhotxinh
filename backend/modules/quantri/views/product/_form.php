<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;
use kartik\number\NumberControl;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
 

<div class="product-form">

    <?php $form = ActiveForm::begin([
        'id' => 'contact-form',
        'enableAjaxValidation' => true,
        'validationUrl'=>Url::toRoute('product/validation'),
    ]); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success pull-right']) ?>
    </div>
    <div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist" style="font-size: 1.5em">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin SP

            </a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" style="padding: 10px 30px">   Seo  </a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">  Liên kết  </a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
        </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <?= $form->field($model, 'pro_name',['options'=>['class'=>'col-md-6']],['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'image',['options'=>['class'=>'col-md-3']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Chọn ảnh 195x243 pixel']) ?>
            <div class="col-md-1" style="height: 80px">
                <img src="<?= (isset($model->image))? Yii::$app->request->hostInfo.'/'.$model->image:''?>" id="previewImage" alt="" style="height: 100%">
            </div>
            <div class="clearfix"></div>
            <?= $form->field($model, 'code',['options'=>['class'=>'col-md-3']])->textInput(['maxlength' => true]) ?>

            <?php 
                echo $form->field($model, 'price',['options'=>['class'=>'col-md-3']])->widget(NumberControl::classname(), [
                    'maskedInputOptions' => [
                        'prefix' => 'vnđ ',
                        'suffix' => '',
                        'allowMinus' => false,
                        'groupSeparator' => '.',
                        'radixPoint' => ','
                    ],
                    // 'options' => [
                    //         'type' => 'text', 
                    //         'label'=>'<label>Saved Value: </label>', 
                    //         'class' => 'kv-saved',
                    //         'readonly' => true, 
                    //         'tabindex' => 1000
                    //     ],
                    'displayOptions' => ['class' => 'form-control kv-monospace'],
                    // 'saveInputContainer' => ['class' => 'kv-saved-cont']
                ]);
             ?>
            <?php 
                echo $form->field($model, 'price_sales',['options'=>['class'=>'col-md-3']])->widget(NumberControl::classname(), [
                    'maskedInputOptions' => [
                        'prefix' => 'vnđ ',
                        'suffix' => '',
                        'allowMinus' => false,
                        'groupSeparator' => '.',
                        'radixPoint' => ','
                    ],
                    'displayOptions' => ['class' => 'form-control kv-monospace'],
                    'saveInputContainer' => ['class' => 'kv-saved-cont']
                ]);
             ?>

            <?= $form->field($model, 'start_sale',['options'=>['class'=>'col-md-3']])->textInput() ?>
            <?= $form->field($model, 'end_sale',['options'=>['class'=>'col-md-3']])->textInput() ?>

            
            <?= $form->field($model, 'order',['options'=>['class'=>'col-md-3']])->textInput(['type'=>'number']) ?>
            <?= $form->field($model, 'active',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
                [
                    'initInputType' => CheckboxX::INPUT_CHECKBOX,
                    'options'=>['value' => $model->active],
                ])->label(false);
            ?>
            <div class="clearfix"></div>
            <?= $form->field($model, 'short_introduction')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'content',['enableAjaxValidation' => true])->textarea(['rows' => 6,'class'=>'content']) ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="profile">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true,'id'=>'title_slug'])?>
            <?= $form->field($seo, 'slug')->textInput(['maxlength' => true,'id'=>'slug_url'])?>
            <?= $form->field($model, 'keyword')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="messages">
            <?= $form->field($model, 'product_category_id',['options'=>['class'=>'col-md-6']])->widget(Select2::classname(), [
                'data' => $dataCate,
                'options' => ['placeholder' => 'Select a color ...'],
                'pluginOptions' => [
                    'tags' => true,
                    'tokenSeparators' => [',', ' '],
                    'maximumInputLength' => 10
                ],
            ]) ?>

            <?= $form->field($model, 'manufacturer_id',['options'=>['class'=>'col-md-6']])->widget(Select2::classname(), [
                'data' => $dataManufac,
                'options' => ['placeholder' => 'Select a manufacturer ...'],
                'pluginOptions' => [
                    'tags' => true,
                    'tokenSeparators' => [',', ' '],
                    'maximumInputLength' => 10
                ],
            ]) ?>

            <?= $form->field($model, 'product_type_id')->widget(Select2::classname(), [
                'data' => $dataType,
                'language' => 'vi',
                'options' => ['placeholder' => 'Select a product Type ...', 'multiple' => true],
                'pluginOptions' => [
                    'tags' => true,
                    'tokenSeparators' => [',', ' '],
                    'maximumInputLength' => 10,
                    'allowClear' => true
                ],
            ]);?>

            <?php // $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
            

            <?= $form->field($model, 'related_articles')->widget(Select2::classname(), [
                'data' => $dataNews,
                'language' => 'en',
                'options' => ['placeholder' => 'Chọn bài viết liên quan ...', 'multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>

            <?= $form->field($model, 'related_products')->widget(Select2::classname(), [
                'data' => $dataProduct,
                'language' => 'en',
                'options' => ['placeholder' => 'Select a product Type ...', 'multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>

            <?= $form->field($model, 'models_id')->widget(Select2::classname(), [
                'data' => $dataModel,
                'language' => 'en',
                'options' => ['placeholder' => 'Select a product Type ...', 'multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>

        </div>
        <div role="tabpanel" class="tab-pane" id="settings">
            <?= $form->field($model, 'salse')->textInput() ?>
            <?= $form->field($model, 'hot')->textInput() ?>
            <?= $form->field($model, 'best_seller')->textInput() ?>
            <?= $form->field($model, 'guarantee')->textInput() ?>
            <?= $form->field($model, 'views')->textInput() ?>
        </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
