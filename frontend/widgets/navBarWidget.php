<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\Menus;

class navBarWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$menu = new Menus();
    	$dataMenu = $menu->getMenusByParent();
    	// echo '<pre>';
    	// print_r($dataMenu);die;
         return $this->render('navBarWidget',['dataMenu'=>$dataMenu]);
    }
}