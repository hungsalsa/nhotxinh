<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\SettingCategory;
use frontend\models\Product;
class categoryWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$cate = new SettingCategory();
        $dataCateSet = $cate->getAllCat(0);
        unset($cate);
        // $
        // getProductBySlug
         return $this->render('layout/categoryWidget',['dataCateSet'=>$dataCateSet]);
    }
}