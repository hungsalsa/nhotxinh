<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Models */

$this->title = 'Tạo mới xe';
$this->params['breadcrumbs'][] = ['label' => 'Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataModel' => $dataModel,
    ]) ?>

</div>
