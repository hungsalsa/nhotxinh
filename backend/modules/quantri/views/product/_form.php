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
        'enableClientValidation' => true, 'enableAjaxValidation' => false
        // 'validationUrl'=>Url::toRoute('product/validation'),
    ]); ?>
    <div class="form-group btn_save">
        <?= Html::submitButton($model->isNewRecord ? ' Thêm mới ':' Cập nhật ', ['class' => 'btn btn-success pull-right btn_luu']) ?>
    </div>
    <div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist" style="font-size: 1.5em">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin SP

            </a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" style="padding: 10px 30px">   Seo  </a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">  Liên kết  </a></li>
        </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <?= $form->field($model, 'pro_name',['options'=>['class'=>'col-md-4']])->textInput(['maxlength' => true,'id'=>'title_slug']) ?>
            <?= $form->field($model, 'slug',['options'=>['class'=>'col-md-4']])->textInput(['maxlength' => true,'id'=>'slug_url'])?>
            <?= $form->field($model, 'image',['options'=>['class'=>'col-md-3']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Chọn ảnh 247x270 pixel']) ?>
            <div class="col-md-1" style="height: 80px">
                <img src="<?= (isset($model->image))? Yii::$app->request->hostInfo.'/'.$model->image:''?>" id="previewImage" alt="" style="height: 100%">
            </div>
            <div class="clearfix"></div>
            <?= $form->field($model, 'code',['options'=>['class'=>'col-md-2']])->textInput(['maxlength' => true]) ?>

            <?php 
                echo $form->field($model, 'price',['options'=>['class'=>'col-md-1']])->widget(NumberControl::classname(), [
                    'maskedInputOptions' => [
                        'prefix' => '',
                        'suffix' => ' đ',
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
                echo $form->field($model, 'price_sales',['options'=>['class'=>'col-md-1']])->widget(NumberControl::classname(), [
                    'maskedInputOptions' => [
                        'prefix' => '',
                        'suffix' => ' đ',
                        'allowMinus' => false,
                        'groupSeparator' => '.',
                        'radixPoint' => ','
                    ],
                    'displayOptions' => ['class' => 'form-control kv-monospace'],
                    'saveInputContainer' => ['class' => 'kv-saved-cont']
                ]);
             ?>

            <?= $form->field($model, 'start_sale',['options'=>['class'=>'col-md-2']])->textInput() ?>
            <?= $form->field($model, 'end_sale',['options'=>['class'=>'col-md-2']])->textInput() ?>

            
            <?= $form->field($model, 'order',['options'=>['class'=>'col-md-1']])->textInput(['type'=>'number','placeholder'=>'Bằng 999 nếu rỗng']) ?>
            <?= $form->field($model, 'active',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
                [
                    'initInputType' => CheckboxX::INPUT_CHECKBOX,
                    'options'=>['value' => $model->active],
                ])->label(false);
            ?>
            <?= $form->field($model, 'salse',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
                [
                    'initInputType' => CheckboxX::INPUT_CHECKBOX,
                    'options'=>['value' => $model->salse],
                ])->label(false);
            ?>
            <?= $form->field($model, 'hot',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
                [
                    'initInputType' => CheckboxX::INPUT_CHECKBOX,
                    'options'=>['value' => $model->hot],
                ])->label(false);
            ?>
            <div class="clearfix"></div>
            <?= $form->field($model, 'best_seller',['options' => ['class' => 'activeform col-md-1']])->widget(CheckboxX::classname(),
                [
                    'initInputType' => CheckboxX::INPUT_CHECKBOX,
                    'options'=>['value' => $model->best_seller],
                ])->label(false);
            ?>
            <?= $form->field($model, 'guarantee',['options' => ['class' => 'col-md-2']])->textInput() ?>
            <?= $form->field($model, 'product_category_id',['options'=>['class'=>'col-md-2']])->widget(Select2::classname(), [
                'data' => $dataCate,
                'options' => ['placeholder' => 'Select a color ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>

            <?= $form->field($model, 'manufacturer_id',['options'=>['class'=>'col-md-2']])->widget(Select2::classname(), [
                'data' => $dataManufac,
                'options' => ['placeholder' => 'Select a manufacturer ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>

            <?= $form->field($model, 'models_id',['options'=>['class'=>'col-md-2']])->widget(Select2::classname(), [
                'data' => $dataModel,
                'language' => 'en',
                'options' => ['placeholder' => 'Select a product Type ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
            <div class="clearfix"></div>
            <?= $form->field($model, 'short_introduction')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'content',['enableAjaxValidation' => true])->textarea(['rows' => 6,'class'=>'content']) ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="profile">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true])?>
            
            <?= $form->field($model, 'keyword')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="messages">
            <?= $form->field($model, 'product_type_id')->widget(Select2::classname(), [
                'data' => $dataType,
                'language' => 'vi',
                'options' => ['placeholder' => 'Select a product Type ...', 'multiple' => true],
                'pluginOptions' => [
                    'tags' => true,
                    'allowClear' => true
                ],
            ]);?>

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

           
            <?= $form->field($model, 'tags')->widget(Select2::classname(), [
                'data' => $dataProduct,
                'language' => 'en',
                'options' => ['placeholder' => 'Select a product Type ...', 'multiple' => true],
                'pluginOptions' => [
                    'tags' => true,
                    'allowClear' => true
                ],
            ]);?>


        </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-center" id="myLargeModalLabel">Quản lý ảnh</h4> </div>
                <div class="modal-body">
                    <?php 
                    $user =  Yii::$app->user->identity->username;
                    $auth_key =  Yii::$app->user->identity->auth_key;
                    ?>
                    <iframe  width="100%" height="450" frameborder="0"
                    src="../../../filemanager/dialog.php?type=1&field_id=imageFile&lang=en_EN&akey=<?= md5($user.$auth_key) ?>">
                </iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
// $this->registerJsFile('@web/js/dichvu/addchitiet.js', ['depends' => [\yii\web\JqueryAsset::class]] );
$this->registerJsFile("@web/tinymce/tinymce.min.js", ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile("@web/js/main.js", ['depends' => [yii\web\JqueryAsset::className()]]);
?>