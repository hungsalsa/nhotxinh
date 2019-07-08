<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\modules\quantri\models\Product;
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
        <?= Html::a('Thêm mới ảnh sp', ['create', 'id'=>$proInfo['id']], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idIma',
            'pro_id',
             [
                'attribute' => 'image',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img(Yii::$app->request->hostInfo.'/'.$data['image'],
                        ['width' => '70px']);
                },
            ],
            // 'title',
            'alt',
            // 'status',
            [
                'attribute' => 'status',
                'value'=>function($data){
                    if($data->status==1){
                        return "Kích hoạt";
                    }else{
                        return "Không kích hoạt";
                    }
                },
                // 'headerOptions' => ['class' => 'text-center'],
                'label' => 'Trạng thái',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
