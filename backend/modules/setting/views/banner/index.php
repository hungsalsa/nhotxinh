<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý Banner Website';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title text-center"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
        <a href="javascript:void(0)" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Dashboard 1</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="banner-index">
    

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="btn_save">
        <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'image',
            [
                'format' => 'html',
               'attribute'=>'image',
               'contentOptions'=>['style'=>'width:15%'],
               'value' => function($data) {
                // pr($data->image);
                return Html::a(Html::img(Yii::$app->request->hostinfo.'/'.$data->image,['height'=>'100']),Yii::$app->homeUrl.'setting/banner/update?id='.$data->id);
                },
            ],
            // 'url:url',
            'alt',
            'order',
            'content:html',
            'status',
            //'created_at',
            //'updated_at',
            //'user_id',

            ['contentOptions'=>['style'=>'width:5%'],'class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
