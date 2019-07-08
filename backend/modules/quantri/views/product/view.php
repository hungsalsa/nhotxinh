<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="btn_save">
        <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Danh sách', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa sản phẩm', ['delete', 'id' => $model->id], [
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
            'pro_name',
            'title',
            'slug',
            'keyword:ntext',
            'description:ntext',
            'short_introduction:html',
            'content:html',
            'price',
            'price_sales',
            'start_sale',
            'end_sale',
            'order',
            'active',
            'product_type_id',
            'salse',
            'hot',
            'best_seller',
            'manufacturer_id',
            'guarantee',
            'models_id',
            'views',
            'code',
            'image',
            'images_list',
            'tags',
            [
                'attribute'=>'product_category_id',
                'value'=>$model->productCategory->cateName,
            ],
            [
                'attribute' => 'product_category_id',
                'value' => $model->productCategory->cateName
            ],
            'related_articles',
            'related_products',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:H:i d-m-Y']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:H:i d-m-Y']
            ],
            'userCreated',
        ],
    ]) ?>

</div>
