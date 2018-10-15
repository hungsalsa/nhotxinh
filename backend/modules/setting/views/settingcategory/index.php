<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\SettingCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setting Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Setting Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
               'attribute' => 'name',
               'format' => 'raw',
               'value'=>function ($data) {
                return Html::a(Html::encode($data->name),Yii::$app->homeUrl.'setting/settingcategory/update?id='.$data->id);
                },
            ],
            'parent_id',
            'link_cate',
            // 'order',
            'slug_cate',
            //'icon',
            //'status',
            //'created_at',
            //'updated_at',
            //'user_add',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
