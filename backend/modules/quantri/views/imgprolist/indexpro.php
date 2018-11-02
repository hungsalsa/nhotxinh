<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\quantri\models\ImgprolistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách ảnh sản phẩm: '.$proInfo['pro_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imgprolist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Imgprolist', ['createpro', 'id'=>$proInfo['id']], ['class' => 'btn btn-success']) ?>
        <span class="pull-right">Tổng số : <?=$dataProvider->getTotalCount(); ?> ảnh</span>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'pro_id',
            'image',
            [
               'attribute' => 'image',
               'format' => 'raw',
               'value'=>function ($data) {
                    return Html($data->image);
                },
            ],
            'title',
            'alt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
