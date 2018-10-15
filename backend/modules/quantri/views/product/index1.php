<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\tabs\TabsX;
use yii\helpers\Url;
/* @var $this yii\web\View */https://use.fontawesome.com/releases/v5.3.1/css/all.css
/* @var $searchModel backend\modules\quantri\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
// $this->registerCssFile('https://use.fontawesome.com/releases/v5.3.1/css/all.css', ['depends' => [yii\bootstrap\BootstrapAsset::className()]]);
// $view->registerJsFile('@web/plugin/js/jquery.3.2.1.min.js', ['position' => \yii\web\View::POS_END]);
// $this->registerCssFile('https://use.fontawesome.com/releases/v5.3.1/js/all.js', ['depends' => [yii\bootstrap\BootstrapAsset::className()]]);
$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$content1 ='content1content1content1content1';
$content2 ='content1content1content1content1';
$content3 ='content1content1content1content1';
$content4 ='content1content1content1content1';

$items = [
    [
        'label'=>'<i class="fas fa-home"></i> Home',
        'content'=>$content1,
        'active'=>true
    ],
    [
        'label'=>'<i class="fas fa-user"></i> Profile',
        'content'=>$content2,
        'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])]
    ],
    [
        'label'=>'<i class="fas fa-list-alt"></i> Menu',
        'items'=>[
             [
                 'label'=>'Option 1',
                 'encode'=>false,
                 'content'=>$content3,
             ],
             [
                 'label'=>'Option 2',
                 'encode'=>false,
                 'content'=>$content4,
             ],
        ],
    ],
    [
        'label'=>'<i class="fas fa-king"></i> Disabled',
        'linkOptions' => ['class'=>'disabled']
    ],
];

echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_RIGHT,
    'bordered'=>true,
    'encodeLabels'=>false
]);

echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]);
 ?>
