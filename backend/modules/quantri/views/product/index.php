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
        <?= Html::a('Create New Product', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'showFooter'=>true,
    // 'showHeader' => true,
    // 'showOnEmpty'=>false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'pro_name',
            [
               'attribute' => 'pro_name',
               'format' => 'raw',
               'value'=>function ($data) {
                return Html::a(Html::encode($data->pro_name),Yii::$app->homeUrl.'quantri/product/update?id='.$data->id);
                },
            ],
            // 'title',
            // 'slug',
            // 'keyword:ntext',
            //'description:ntext',
            //'short_introduction:ntext',
            //'content:ntext',
            //'price',
            //'price_sales',
            //'start_sale',
            //'end_sale',
            //'order',
            //'active',
            // 'product_type_id',
            //'salse',
            //'hot',
            //'best_seller',
            // 'manufacturer_id',
            //'guarantee',
            //'models_id',
            //'views',
            //'code',
            //'image',
            //'images_list',
            //'tags',
            [
                'attribute' => 'cateName',
                'label' => 'Danh mục SP'
            ],
            // 'related_articles',
            // 'related_products',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:H:i d-m-Y']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:H:i d-m-Y']
            ],
            //'user_id',
            // 'active',
            [
                'attribute' => 'active',
                'value'=>function($data){
                    if($data->active==1){
                        return "Kích hoạt";
                    }else{
                        return "Ẩn";
                    }
                },
                // 'headerOptions' => ['class' => 'text-center'],
                'label' => 'Trạng thái',
                'filter'=>[1=>' Kích hoạt',0=>'Ẩn'],
            ],
             [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'DS ảnh',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{my_button}', 
                'buttons' => [
                    'my_button' => function ($url, $model, $key) {
                        return Html::a('DS ảnh', ['anhsp/', 'id'=>$model->id], ['title' => 'DS ảnh', 'target' => '_blank', 'data' => ['pjax' => 0]] );
                    },
                ],
            ],

            ['class' => 'yii\grid\ActionColumn','header'=>'Action', 
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {update} {delete}{link}'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
