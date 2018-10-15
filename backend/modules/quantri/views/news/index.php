<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\quantri\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách tin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Thêm mới tin tức', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('   Reset   ', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
               'attribute' => 'name',
               'format' => 'raw',
               'value'=>function ($data) {
                return Html::a(Html::encode($data->name),Yii::$app->homeUrl.'quantri/news/update?id='.$data->id);
                },
            ],
            // 'link',
            // 'category_id',
            // 'cateName',
            [
                'attribute'=>'cateName',
                'value'=>'categories.cateName',
            ],
            'images',
            //'htmltitle',
            //'htmlkeyword',
            //'htmldescriptions:ntext',
            //'short_description:ntext',
            //'content:ntext',
            //'hot',
            //'view',
            //'tag',
            //'sort',
            // 'status',
            [
                'attribute' => 'status',
                'value'=>function($data){
                    if($data->status==1){
                        return "Kích hoạt";
                    }else{
                        return "Ẩn";
                    }
                },
                // 'headerOptions' => ['class' => 'text-center'],
                'label' => 'Trạng thái',
                'filter'=>[1=>' Kích hoạt',0=>'Ẩn'],
            ],
            //'user_add',
            // [
            //     'attribute' => 'created_at',
            //     'format' => ['date', 'php:H:i d-m-Y']
            // ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:H:i d-m-Y']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
