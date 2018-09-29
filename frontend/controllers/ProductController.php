<?php

namespace frontend\controllers;
use frontend\models\Product;
use backend\modules\quantri\models\Producttype;
class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionListproduct($id)
    {
        $model = new Product();
        $cate = array($id);
        $dataCat = $model->getAllProductByCateId($cate);
        if(empty($dataCat)){
            $dataCat = array();
        }
        $proType = new Producttype();
        $dataProType = $proType->getAllProductType();

    	return $this->render('listproduct',['productCat'=>$dataCat,'dataProType'=>$dataProType]);
    }
    public function actionListpro($id)
    {
        $model = new Product();
        // $cate = array($id);
        $dataCat = $model->getAllProByid($id);
        if(empty($dataCat)){
            $dataCat = array();
        }

        $proType = new Producttype();
        $dataProType = $proType->getAllProductType();

        return $this->render('listproduct',['productCat'=>$dataCat,'dataProType'=>$dataProType]);
        
    }

    public function actionDetail($id)
    {
    	$data = new Product;
    	$product = $data->getProductById($id);
    	// echo '<pre>';print_r($product);die;
    	return $this->render('detail',['product'=>$product]);

    }
}
