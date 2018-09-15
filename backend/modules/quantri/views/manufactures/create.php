<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Manufactures */

$this->title = 'Tạo mới nhà sản xuất';
$this->params['breadcrumbs'][] = ['label' => 'Manufactures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manufactures-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataManufac' => $dataManufac,
    ]) ?>

</div>
