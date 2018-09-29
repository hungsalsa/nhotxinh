<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\Product;
use backend\modules\quantri\models\Producttype;

class featuredProductsWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$proType = new Producttype();
        $dataProType = $proType->getAllProductType();

    	$product = new Product();
    	$productRan = $product->getProductRandon(8); 
         return $this->render('index/featuredProductsWidget',['productRan'=>$productRan,'dataProType'=>$dataProType]);
    }
}