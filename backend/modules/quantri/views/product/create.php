<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Product */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

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
