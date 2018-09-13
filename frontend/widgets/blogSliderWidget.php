<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class blogSliderWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
         return $this->render('index\blogSliderWidget');
    }
}