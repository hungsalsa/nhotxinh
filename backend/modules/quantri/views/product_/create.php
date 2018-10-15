<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Product */

$this->title = 'Thêm mới sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataCat' => $dataCat,
        'dataManufac' => $dataManufac,
        'dataModel' => $dataModel,
        'dataType' => $dataType,
        'dataProduct' => $dataProduct,
        'dataNews' => $dataNews,
    ]) ?>

</div>
