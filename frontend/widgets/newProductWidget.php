<?php

namespace frontend\widgets;
use frontend\models\Productcategory;
use frontend\models\Product;
use backend\modules\quantri\models\Producttype;
use yii\base\Widget;
use yii\helpers\Html;

class newProductWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$cate = new Productcategory();
    	$dataCat = $cate->getNewCate();

    	$product = new Product();
    	$catel = array();
    	$dataproduct = $product->getAllProduct(100,$catel);
    	
        $proType = new Producttype();
        $dataProType = $proType->getAllProductType();

        // Lấy ds sp 
    	// echo '<pre>'.count($dataProType);
    	// print_r($dataproduct);die;

         return $this->render('index/newProductWidget',['dataCat'=>$dataCat,'dataproduct'=>$dataproduct,'dataProType'=>$dataProType]);
    }
}