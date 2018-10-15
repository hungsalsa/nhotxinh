<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\Banner;

class sectionHeroWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$banner = new Banner();
    	$dataBanner = $banner->getAllBanner();
    	if(empty($dataBanner)){
    		$dataBanner = array();
    	}
         return $this->render('index/sectionHeroWidget',['dataBanner'=>$dataBanner]);
    }
}