<?php

namespace frontend\widgets\index;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\setting\FSettingCategories;

class topNavigation extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
    	$sidebar= new FSettingCategories();
    	$dataSidebar = $sidebar->getSidebar();
    	// dbg($dataSidebar);
    	return $this->render('topNavigation',['dataSidebar'=>$dataSidebar]);
    }
}