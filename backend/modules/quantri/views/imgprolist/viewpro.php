<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Imgprolist */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Imgprolists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imgprolist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Danh sách', ['indexpro', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pro_id',
            'image',
            'title',
            'alt',
        ],
    ]) ?>

</div>
