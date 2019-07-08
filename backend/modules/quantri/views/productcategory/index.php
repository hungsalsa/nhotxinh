<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\modules\quantri\models\Productcategory;
$this->title = 'Danh mục sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
$cate = new Productcategory();
$dataCate = $cate->getCategoryParent();
?>
<div class="productcategory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="btn_save">
        <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success btn_luu']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Từ {begin} đến {end} trong tổng {totalCount} Xe",
        'tableOptions' => ['class' => 'table table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCate',
            // 'title',
            [
                'attribute' =>'cateName',
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $html = "<div class=\"col-md-12 updateProduct$key proUpdate\">".
                    Html::textInput('cateName', $model->cateName, ['class'=>'form-control col-md-4','id'=>'cateName'.$key]).
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 savecateName',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/productcategory/quickchange']),'data-id'=>$key,'data-field'=>'cateName']).
                    Html::button('Cancel',$options = ['class'=>'btn btn-default btn-outline col-md-6 Cancel','style'=>'margin:2px']).
                    
                    "</div>";
                    return Html::button($model->cateName,$options = [
                        'data-field'=>'cateName',
                        'data-id'=>$key,
                        'id'=>'buttoncateName'.$key,
                        'class'=>'btn btn-block btn-outline btnName Quickchange change',
                    ]).$html;
                },
            ],
            [
               'attribute' => 'product_parent_id',
               'format' => 'raw',
               'value'=>function ($data) use($dataCate){
                return Html::a(($data->product_parent_id==0)?'Root':$dataCate[$data->product_parent_id],Yii::$app->homeUrl.'quantri/productcategory/update?id='.$data->idCate);
                },
            ],

            // 'slug',
            // 'keyword:ntext',
            //'description:ntext',
            //'content:ntext',
            //'short_introduction:ntext',
            //'home_page',
            //'image',
            //'order',
            [
                'attribute' =>'order',
                'contentOptions' => ['class' => 'text-center','style' => 'width:6%'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $html = "<div class=\"updateProduct$key proUpdate\">".
                    Html::textInput('order', $model->order, ['max' => 998,'class'=>'form-control col-md-4','id'=>'order'.$key]).
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 saveOrder',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/productcategory/quickchange']),'data-id'=>$key]).
                    Html::button('Cancel',$options = ['class'=>'btn btn-default btn-outline col-md-6 Cancel','style'=>'margin:2px']).
                    
                    "</div>";
                    return Html::button($model->order,$options = [
                        'data-field'=>'order',
                        'data-id'=>$key,
                        'id'=>'buttonOrder'.$key,
                        'class'=>'btn btn-block btn-outline btn-primary Quickchange change',
                    ]).$html;
                },
            ],
            //'active',
            [
                'attribute' =>'active',
                'contentOptions' => ['class' => 'text-center','style'=>'width:5%'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $classbtn = ($model->active==0)? 'btn-danger':'btn-success';
                    return Html::button(($model->active==0)?' Ẩn ':'Kích hoạt',$options = [
                        'data-id'=>$key,
                        'id'=>'active'.$key,
                        "data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/productcategory/statuschange']),
                        "class"=>"btn btn-block btn-outline $classbtn Quickactive change",
                    ]);
                },
            ],
            // 'product_parent_id',
            [
                'attribute'=>'created_at',
                'contentOptions' => ['class' => 'text-center','style' => 'width:10%'],
                'format' => ['date', 'php:H:i d-m-Y']
            ],[
                'attribute'=>'updated_at',
                'contentOptions' => ['class' => 'text-center','style' => 'width:10%'],
                'format' => ['date', 'php:H:i d-m-Y']
            ],
            //'updated_at',
            // 'userCreated',
            [
                'attribute' => 'userCreated',
                'contentOptions' => ['class' => 'text-center','style' => 'width:7%'],
                'format' => 'raw',
               'value'=>function ($data){
                return Html::a($data->useradd->username,Yii::$app->homeUrl.'quantri/productcategory/update?id='.$data->idCate);
                },
                // 'value' => $model->userCreated->username
            ],
            
            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7;width: 8%'],
                'contentOptions' => ['class' => 'actionColumn','style' => 'font-size:18px'],
                'template' => '{view} {update} {delete}',
                'visibleButtons' => [
                    'view' => Yii::$app->user->can('quantri/productcategory/view'),
                    'update' => Yii::$app->user->can('quantri/productcategory/update'),
                    'delete' => Yii::$app->user->can('quantri/productcategory/delete')
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<?php $this->registerJsFile('@web/js/product/global.js', ['depends' => [\yii\web\JqueryAsset::class]] );
$this->registerJsFile('@web/js/product/productcategory_index.min.js', ['depends' => [\yii\web\JqueryAsset::class]] );?>