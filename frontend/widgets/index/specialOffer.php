<?php

namespace frontend\widgets\index;

use yii\base\Widget;
use frontend\models\product\FProduct;

class specialOffer extends Widget
{
    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$model = new FProduct();
    	$data = $model->getProductSpecialOffer();
    	// dbg($data);
         return $this->render('specialOffer',['data'=>$data]);
    }
}