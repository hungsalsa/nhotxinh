<?php

namespace frontend\widgets\index;

use yii\base\Widget;
use yii\helpers\Html;

class infoBoxes extends Widget
{
    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
         return $this->render('infoBoxes');
    }
}