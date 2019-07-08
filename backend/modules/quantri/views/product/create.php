<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Product */

$this->title = 'Thêm mới sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title text-center"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="product-create">


    <?= $this->render('_form', [
        'model' => $model,
        'seo' => $seo,
        'dataCate' => $dataCate,
        'dataType' => $dataType,
        'dataManufac' => $dataManufac,
        'dataNews' => $dataNews,
        'dataProduct' => $dataProduct,
        'dataModel' => $dataModel,
    ]) ?>

</div>
