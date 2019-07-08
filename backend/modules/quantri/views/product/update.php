<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Product */

$this->title = 'Chỉnh sửa sản phẩm :'.$model->pro_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataCate' => $dataCate,
        'dataType' => $dataType,
        'dataManufac' => $dataManufac,
        'dataNews' => $dataNews,
        'dataProduct' => $dataProduct,
        'dataModel' => $dataModel,
    ]) ?>

</div>
