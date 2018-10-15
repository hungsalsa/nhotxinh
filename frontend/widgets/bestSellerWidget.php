<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\Product;
use backend\modules\quantri\models\Producttype;

class bestSellerWidget extends Widget
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
        $idType = array_search('best', $dataProType);
// echo '<pre>';print_r($dataProType);die;
    	$product = new Product();
    	$productType = $product->getProByType($idType);
         return $this->render('index/bestSellerWidget',['dataproduct'=>$productType]);
    }
}