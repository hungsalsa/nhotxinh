<?php

namespace frontend\widgets\index;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\setting\FBanner;
class sectionHero extends Widget
{
    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$banner = new FBanner();
    	$dataBanner = $banner->getAllBanner();
    	// dbg($dataBanner);
        return $this->render('sectionHero',['dataBanner'=>$dataBanner]);
    }
}