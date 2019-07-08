<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\modules\setting\models\Menus;
use kartik\select2\Select2;
$menu = new Menus();
$dataMenu = $data = array_merge([0=>' Root '],$menu->getMenuParent());
$this->title = 'Danh sách Menu';
$this->params['breadcrumbs'][] = $this->title;
// pr($dataMenu);
?>

<div class="menus-index">
    <div class="row">
        <div class="col-lg-7 col-md-8 col-sm-8 col-xs-12">
            <h2 class="page-title text-center"><?= Html::encode($this->title) ?></h2>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            <!-- <a href="javascript:void(0)" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a> -->
        <!-- <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Dashboard 1</li>
        </ol> -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="btn_save">
        <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Từ {begin} đến {end} trong tổng {totalCount} Menu",
        'tableOptions' => ['class' => 'table table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'name',
            [
                'attribute' =>'name',
                'contentOptions' => ['class' => 'text-center'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $html = "<div class=\"col-md-12 updateProduct$key proUpdate\">".
                    Html::textInput('name', $model->name, ['class'=>'form-control col-md-4','id'=>'menuName'.$key]).
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 saveMenuName',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/setting/menus/quickchange']),'data-id'=>$key,'data-field'=>'name']).
                    Html::button('Cancel',$options = ['class'=>'btn btn-default btn-outline col-md-6 Cancel','style'=>'margin:2px']).
                    
                    "</div>";
                    return Html::button($model->name,$options = [
                        'data-field'=>'name',
                        'data-id'=>$key,
                        'id'=>'buttonname'.$key,
                        'class'=>'btn btn-block btn-outline btnName Quickchange change',
                    ]).$html;
                },
            ],
            [
               'attribute' => 'type',
               'format' => 'html',
               'value'=>function ($data) use($dataMenu){
                $menuType = [
                        1 => 'Danh mục sản phẩm',
                        2 => 'Danh mục bài viết',
                        3 => 'Trang nội dung'
                    ];
                // dbg($data->parent_id);
                // dbg($dataMenu);
                return Html::a($menuType[$data->type],Yii::$app->homeUrl.'setting/menus/update?id='.$data->id);
                },
            ],
            // [
            //     'attribute'=>'type',
            //     'value'=>function($data)
            //     {
                    
            //         return ;
            //     }
            // ],

            [
                'attribute' =>'parent_id',
                // 'headerOptions' => ['width' => '20%'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) use($dataMenu,$data){
                    // unset($dataMenu[$model->id]);
                    // pr($data);
                    // dbg($dataMenu);
                    $html = "<div class=\"updateProduct$key proUpdate\">".
                    Select2::widget([
                        'name' => 'parent_id',
                        'value' => $model->parent_id,
                        'data' => $dataMenu,
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        'options' => [
                             // 'allowClear'=> true,
                            'id'=>'parent_id'.$key,
                            'class'=>'form-control',
                            'placeholder' => 'Select provinces ...',
                        ],
                    ]).
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 m-3 saveMenuName','style'=>'margin:2px',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/setting/menus/quickchange']),'data-id'=>$key,'data-field'=>'parent_id']).
                    Html::button('Cancel',$options = ['class'=>'btn btn-default btn-outline col-md-6 m-3 Cancel','style'=>'margin:2px']).
                    "</div>";

                    return Html::tag('span',($model->parent_id == 0) ? ' Root ': $dataMenu[$model->parent_id],$options = [
                        'data-id'=>$key,
                        'data-field'=>'parent_id',
                        'id'=>'menuName'.$key,
                        'class'=>'text-info btn btn-outline btn-info Quickchange change text-primary',
                    ]).$html;
                },
            ],


             // 'title',
            // 'slug',
            
            [
                'attribute'=>'link_cate',
                'value'=>'category.cateName'
            ],
            // 'introduction:ntext',
            [
                'attribute' =>'order',
                'contentOptions' => ['class' => 'text-center','style' => 'width:6%'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $html = "<div class=\"updateProduct$key proUpdate\">".
                    Html::textInput('order', $model->order, ['max' => 998,'class'=>'form-control col-md-4','id'=>'order'.$key]).
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 saveOrder',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/setting/menus/quickchange']),'data-id'=>$key]).
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
            //'image',
            // 'status',
            [
                'attribute' =>'status',
                'contentOptions' => ['class' => 'text-center','style'=>'width:5%'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $classbtn = ($model->status==0)? 'btn-danger':'btn-success';
                    return Html::button(($model->status==0)?' Ẩn ':'Kích hoạt',$options = [
                        'data-id'=>$key,
                        'id'=>'status'.$key,
                        "data-url"=>Yii::$app->getUrlManager()->createUrl(['/setting/menus/statuschange']),
                        "class"=>"btn btn-block btn-outline $classbtn Quickactive change",
                    ]);
                },
            ],
            // [
            //     'attribute' =>'status',
            //     'contentOptions' => ['class' => 'text-center','style'=>'width:5%'],
            //     'format'=>'html',
            //     'content' => function($model,$key,$index, $column) {
            //         return Html::button(($model->status==0)?'Hidden':'Active',$options = [
            //             'data-field'=>'status',
            //             'data-id'=>$key,
            //             'data-value'=>$model->status,
            //             'id'=>'status'.$key,
            //             "data-url"=>Yii::$app->getUrlManager()->createUrl(['/setting/menus/quickchange']),
            //             'class'=>'btn btn-block btn-outline btn-info QuickStatus change',
            //         ]);
            //     },
            // ],
            [
                'attribute'=>'created_at',
                'contentOptions' => ['class' => 'text-center','style' => 'width:10%'],
                'format' => ['date', 'php:H:i d-m-Y']
            ],[
                'attribute'=>'updated_at',
                'contentOptions' => ['class' => 'text-center','style' => 'width:10%'],
                'format' => ['date', 'php:H:i d-m-Y']
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7;width: 8%','class'=>'text-center'],
                'contentOptions' => ['class' => 'actionColumn text-center','style' => 'font-size:18px'],
                'template' => '{view}  {update}  {delete}',
                'visibleButtons' => [
                    'view' => Yii::$app->user->can('setting/menus/view'),
                    'update' => Yii::$app->user->can('setting/menus/update'),
                    'delete' => Yii::$app->user->can('setting/menus/delete')
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<?php 
$this->registerJsFile('@web/js/product/global.js', ['depends' => [\yii\web\JqueryAsset::class]] );
$this->registerJsFile('@web/js/product/menu_index.js', ['depends' => [\yii\web\JqueryAsset::class]] );?>