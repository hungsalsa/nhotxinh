<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\modules\quantri\models\Productcategory;
use kartik\select2\Select2;
$cate = new Productcategory();
$dataCate = $cate->getCategoryParent();

$this->title = 'Danh sách sản phẩm';
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
<div class="product-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="btn_save">
        <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
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

            'id',
            // 'pro_name',
            // [
            //    'attribute' => 'pro_name',
            //    'format' => 'raw',
            //    'value'=>function ($data) {
            //     return Html::a(Html::encode($data->pro_name),Yii::$app->homeUrl.'quantri/product/update?id='.$data->id);
            //     },
            // ],
            [
                'attribute' =>'pro_name',
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $html = "<div class=\"col-md-12 updateProduct$key proUpdate\">".
                    Html::textInput('pro_name', $model->pro_name, ['class'=>'form-control col-md-4','id'=>'pro_name'.$key]).
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 savecateName',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/product/quickchange']),'data-id'=>$key,'data-field'=>'pro_name']).
                    Html::button('Cancel',$options = ['class'=>'btn btn-default btn-outline col-md-6 Cancel','style'=>'margin:2px']).
                    
                    "</div>";
                    return Html::button($model->pro_name,$options = [
                        'data-field'=>'pro_name',
                        'data-id'=>$key,
                        'id'=>'buttonpro_name'.$key,
                        'class'=>'btn btn-block btn-outline btnName Quickchange change',
                    ]).$html;
                },
            ],
            
            [
                'attribute' =>'product_category_id',
                'format'=>'html',
                'content' => function($model,$key,$index, $column) use($dataCate){
                    $html = "<div class=\"updateProduct$key proUpdate\">".
                    Select2::widget([
                        'name' => 'product_category_id',
                        'value' => $model->product_category_id,
                        'data' => $dataCate,
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        'options' => [
                            'id'=>'product_category_id'.$key,
                            'class'=>'form-control',
                            'placeholder' => 'Select provinces ...',
                        ],
                    ]).
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 m-3 savecateName','style'=>'margin:2px',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/product/quickchange']),'data-id'=>$key,'data-field'=>'product_category_id']).
                    Html::button('Cancel',$options = ['class'=>'btn btn-default btn-outline col-md-6 m-3 Cancel','style'=>'margin:2px']).
                    "</div>";

                    return Html::button($dataCate[$model->product_category_id],$options = [
                        'data-id'=>$key,
                        'data-field'=>'product_category_id',
                        'id'=>'menuName'.$key,
                        'class'=>'text-info btn btn-outline btn-info Quickchange change text-primary',
                    ]).$html;
                },
            ],
            // 'title',
            // 'slug',
            // 'keyword:ntext',
            //'description:ntext',
            //'short_introduction:ntext',
            //'content:ntext',
            // 'price',
            [
                'attribute' =>'price_sales',
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $html = "<div class=\"col-md-12 updateProduct$key proUpdate\">".
                    Html::textInput('price_sales', $model->price_sales, ['class'=>'form-control col-md-4','id'=>'price_sales'.$key]).
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 savecateName',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/product/quickchange']),'data-id'=>$key,'data-field'=>'price_sales']).
                    Html::button('Cancel',$options = ['class'=>'btn btn-default btn-outline col-md-6 Cancel','style'=>'margin:2px']).
                    
                    "</div>";
                    return Html::button(Yii::$app->formatter->asDecimal($model->price_sales,0),$options = [
                        'data-field'=>'price_sales',
                        'data-id'=>$key,
                        'id'=>'buttonprice_sales'.$key,
                        'class'=>'btn btn-block btn-outline btn-info Quickchange change',
                    ]).$html;
                },
            ],
            //'start_sale',
            //'end_sale',
            'order',
            //'active',
            // 'product_type_id',
            //'salse',
            //'hot',
            //'best_seller',
            [
                'attribute'=>'manufacturer_id',
                'value' => 'manufactures.ManName'
            ],
            
            //'guarantee',
            //'models_id',
            //'views',
            //'code',
            //'image',
            //'images_list',
            //'tags',
            
            // 'related_articles',
            // 'related_products',
            [
                'attribute' =>'active',
                'contentOptions' => ['class' => 'text-center','style'=>'width:5%'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $classbtn = ($model->active==0)? 'btn-danger':'btn-success';
                    return Html::button(($model->active==0)?' Ẩn ':'Kích hoạt',$options = [
                        'data-id'=>$key,
                        'id'=>'active'.$key,
                        "data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/product/statuschange']),
                        "class"=>"btn btn-block btn-outline $classbtn Quickactive change",
                    ]);
                },
            ],
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
            // [
            //     'attribute' => 'active',
            //     'value'=>function($data){
            //         if($data->active==1){
            //             return "Kích hoạt";
            //         }else{
            //             return "Ẩn";
            //         }
            //     },
            //     // 'headerOptions' => ['class' => 'text-center'],
            //     'label' => 'Trạng thái',
            //     'filter'=>[1=>' Kích hoạt',0=>'Ẩn'],
            // ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Ảnh',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{my_button}', 
                'buttons' => [
                    'my_button' => function ($url, $model, $key) {
                        return Html::a('DS ảnh', ['anhsp/', 'id'=>$model->id], ['title' => 'DS ảnh', 'target' => '_blank', 'data' => ['pjax' => 0]] );
                    },
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7;width: 6%','class'=>'text-center'],
                'contentOptions' => ['class' => 'text-center actionColumn','style' => 'font-size:18px'],
                'template' => '{view}{update}{delete}',
                'visibleButtons' => [
                    'view' => Yii::$app->user->can('quantri/product/view'),
                    'update' => Yii::$app->user->can('quantri/product/update'),
                    'delete' => Yii::$app->user->can('quantri/product/delete')
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<?php $this->registerJsFile('@web/js/product/global.js', ['depends' => [\yii\web\JqueryAsset::class]] );
$this->registerJsFile('@web/js/product/productcategory_index.js', ['depends' => [\yii\web\JqueryAsset::class]] );?>