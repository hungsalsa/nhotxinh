<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\modules\quantri\models\Models;
use kartik\select2\Select2;
$menu = new Models();
$dataModels = $data = array_merge([0=>' Root '],$menu->getModelsParent());
$this->title = 'Danh sách xe';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="btn_save">
        <?= Html::a('Thêm mới xe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Từ {begin} đến {end} trong tổng {totalCount} Xe",
        'tableOptions' => ['class' => 'table table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'name',
            [
                'attribute' =>'name',
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $html = "<div class=\"col-md-12 updateProduct$key proUpdate\">".
                    Html::textInput('name', $model->name, ['class'=>'form-control col-md-4','id'=>'name'.$key]).
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 savecateName',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/models/quickchange']),'data-id'=>$key,'data-field'=>'name']).
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
                'attribute' =>'parent_id',
                // 'headerOptions' => ['width' => '20%'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) use($dataModels,$data){
                    unset($dataModels[$key]);
                    // pr($data);
                    // dbg($dataMenu);
                    $html = "<div class=\"updateProduct$key proUpdate\">".
                    Select2::widget([
                        'name' => 'parent_id',
                        'value' => $model->parent_id,
                        'data' => $dataModels,
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
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 m-3 savecateName','style'=>'margin:2px',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/models/quickchange']),'data-id'=>$key,'data-field'=>'parent_id']).
                    Html::button('Cancel',$options = ['class'=>'btn btn-default btn-outline col-md-6 m-3 Cancel','style'=>'margin:2px']).
                    "</div>";

                    return Html::button(($model->parent_id == 0) ? ' Root ':$dataModels[$model->parent_id],$options = [
                        'data-id'=>$key,
                        'data-field'=>'parent_id',
                        'id'=>'buttonparent_id'.$key,
                        'class'=>'text-info btn btn-outline btn-info Quickchange change text-primary',
                    ]).$html;
                },
            ],
            [
                'attribute' =>'order',
                'contentOptions' => ['class' => 'text-center','style' => 'width:6%'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $html = "<div class=\"updateProduct$key proUpdate\">".
                    Html::textInput('order', $model->order, ['max' => 998,'class'=>'form-control col-md-4','id'=>'order'.$key]).
                    Html::button('Save',$options = ['class'=>'btn btn-info btn-outline col-md-5 savecateName',"data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/models/quickchange']),'data-id'=>$key,'data-field'=>'order']).
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
            [
                'attribute' =>'active',
                'contentOptions' => ['class' => 'text-center','style'=>'width:5%'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $classbtn = ($model->active==0)? 'btn-danger':'btn-success';
                    return Html::button(($model->active==0)?' Ẩn ':'Kích hoạt',$options = [
                        'data-id'=>$key,
                        'id'=>'active'.$key,
                        "data-url"=>Yii::$app->getUrlManager()->createUrl(['/quantri/models/statuschange']),
                        "class"=>"btn btn-block btn-outline $classbtn Quickactive change",
                    ]);
                },
            ],
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
                'headerOptions' => ['style' => 'color:#337ab7;width: 8%'],
                'contentOptions' => ['class' => 'actionColumn','style' => 'font-size:18px'],
                'template' => '{view} {update} {delete}',
                'visibleButtons' => [
                    'view' => Yii::$app->user->can('quantri/models/view'),
                    'update' => Yii::$app->user->can('quantri/models/update'),
                    'delete' => Yii::$app->user->can('quantri/models/delete')
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<?php $this->registerJsFile('@web/js/product/global.js', ['depends' => [\yii\web\JqueryAsset::class]] );
$this->registerJsFile('@web/js/product/productcategory_index.js', ['depends' => [\yii\web\JqueryAsset::class]] );?>