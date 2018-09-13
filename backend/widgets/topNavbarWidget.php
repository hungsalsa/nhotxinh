<?php

namespace backend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class topNavbarWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
         return $this->render('topNavbarWidget');
    }
}