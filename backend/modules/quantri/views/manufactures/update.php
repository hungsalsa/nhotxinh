<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Manufactures */

$this->title = 'Cập nhật nhà sản xuất: '.$model->ManName;
$this->params['breadcrumbs'][] = ['label' => 'Manufactures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->idMan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manufactures-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataManufac' => $dataManufac,
    ]) ?>

</div>
