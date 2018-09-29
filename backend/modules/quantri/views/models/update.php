<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Models */

$this->title = 'Chỉnh sửa xe'.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="models-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataModel' => $dataModel,
    ]) ?>

</div>
