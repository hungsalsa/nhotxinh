<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Manufactures */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manufactures-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ManName',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true,'id'=>'title_slug']) ?>

    <?= $form->field($model, 'parent_id',['options' => ['class' => 'col-md-4']])->widget(Select2::classname(), [
            'data' => $dataManufac,
            'language' => 'en',
            'options' => ['placeholder' => 'Select a category ...','multiple' => false],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'image',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Click chọn ảnh']) ?>
    <div class="clearfix"></div>
    
    <?=  $form->field($model, 'title',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug',['options' => ['class' => 'col-md-4']])->textInput(['maxlength' => true,'id'=>'slug_url']) ?>
    <?php // $form->field($model, 'active',['options' => ['class' => 'col-md-2']])->textInput() ?>

    <?= $form->field($model, 'order',['options' => ['class' => 'col-md-2']])->textInput(['type' => 'number']) ?>
    
<!--     <div class="btn-group-toggle col-md-2 clickform">
  <label class="btn btn-success btn-outline">
     <?php // $form->field($model, 'active',['options' => ['class' => 'activeform']])->checkbox() ?>
  </label>
</div>
 -->
<?= $form->field($model, 'active',['options' => ['class' => 'activeform col-md-2']])->widget(CheckboxX::classname(),
[
'initInputType' => CheckboxX::INPUT_CHECKBOX,
'options'=>['value' => $model->active],
])->label(false);

?>
<div class="clearfix"></div>

    <?= $form->field($model, 'keyword')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6,'class' => 'content']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6,'class' => 'content']) ?>

    
    <div class="form-group btn_save">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Danh sách', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!-- sample modal content -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Quản lý ảnh</h4> </div>
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
$this->registerJsFile('@web/tinymce/tinymce.min.js',['depends' => [\yii\web\JqueryAsset::className() ] ]);
$this->registerJsFile('@web/js/main.js',['depends' => [\yii\web\JqueryAsset::className() ] ]); ?>