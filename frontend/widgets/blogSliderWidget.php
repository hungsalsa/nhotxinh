<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\News;

class blogSliderWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$new = new News();
    	$dataNew = $new->getNewsHome();
        return $this->render('index/blogSliderWidget',['dataNew'=>$dataNew]);
    }
}