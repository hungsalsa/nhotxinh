<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\SettingCategories;
class categoriesWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$cate = new SettingCategories();
        $dataCateSet = $cate->getAllCat();

        // echo '<pre>'; print_r($dataCateSet);
        // die;
        // getProductBySlug
         return $this->render('layout/categoriesWidget',['dataCateSet'=>$dataCateSet]);
    }
}