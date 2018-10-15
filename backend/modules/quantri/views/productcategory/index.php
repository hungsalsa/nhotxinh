<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\quantri\models\ProductcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productcategory-index">

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

            // 'idCate',
            // 'title',
            // 'cateName',
            [
               'attribute' => 'cateName',
               'format' => 'raw',
               'value'=>function ($data) {
                return Html::a(Html::encode($data->cateName),Yii::$app->homeUrl.'quantri/productcategory/update?id='.$data->idCate);
                },
            ],
            'slug',
            'keyword:ntext',
            //'description:ntext',
            //'content:ntext',
            //'short_introduction:ntext',
            //'home_page',
            //'image',
            //'order',
            //'active',
            'product_parent_id',
            //'created_at',
            //'updated_at',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
