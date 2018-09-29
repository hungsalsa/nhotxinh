<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Imgprolist */

$this->title = 'Update Imgprolist: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Imgprolists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="imgprolist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
