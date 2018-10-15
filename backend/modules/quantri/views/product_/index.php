<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\quantri\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Thêm mới SP', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'pro_name',
            [
               'attribute' => 'pro_name',
               'format' => 'raw',
               'value'=>function ($data) {
                return Html::a(Html::encode($data->pro_name),Yii::$app->homeUrl.'quantri/product/update?id='.$data->id);
                },
            ],
            'title',
            'slug',
            'keyword:ntext',
            //'description:ntext',
            //'short_introduction:ntext',
            //'content:ntext',
            //'price',
            //'start_sale',
            //'end_sale',
            //'price_sales',
            //'order',
            //'active',
            //'salse',
            //'hot',
            //'best_seller',
            //'new',
            'manufacturer_id',
            //'guarantee',
            'product_type_id',
            'models_id',
            //'views',
            //'code',
            'image',
            //'images_list',
            //'tags',
            'product_category_id',
            //'related_articles',
            //'related_products',
            //'created_at',
            //'updated_at',
            //'user_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{my_button}', 
                'buttons' => [
                    'my_button' => function ($url, $model, $key) {
                        return Html::a('DS ảnh', ['anhsp/', 'id'=>$model->id],['target' => '_blank']);
                    },
                ]
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
