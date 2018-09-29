<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\quantri\models\ManufacturesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách nhà sản xuất';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manufactures-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'idMan',
            // 'ManName',
            [
               'attribute' => 'ManName',
               'format' => 'raw',
               'value'=>function ($data) {
                return Html::a(Html::encode($data->ManName),Yii::$app->homeUrl.'quantri/manufactures/view?id='.$data->idMan);
                },
            ],
            'title',
            'slug',
            'image',
            // 'active',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'active',
                'content'=>function($data){
                    if($data->active == 1) {
                        return " Kích hoạt ";
                    }else{
                        return ' Ẩn ';
                    }
                },
                'headerOptions' => ['class' => 'text-center'],
                'label' => 'Giới tính',
                'contentOptions' => ['style' => '', 'class' => 'text-center'],
            ],
            //'order',
            //'content:ntext',
            //'description:ntext',
            //'keyword:ntext',
            //'parent_id',
            //'created_at',
            //'updated_at',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
