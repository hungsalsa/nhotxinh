<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\SettingBrands;
class brandsCarouselWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$brands = new SettingBrands();
    	$dataBrands = $brands->getAllBrands();
    	if(empty($dataBrands)){
    		$dataBrands = array();
    	}

         return $this->render('index/brandsCarouselWidget',['dataBrands'=>$dataBrands]);
    }
}