<?php

namespace frontend\controllers;
use frontend\models\Product;
use frontend\models\Producttype;
use yii\web\NotFoundHttpException;

class TimKiemController extends \yii\web\Controller
{
    public function actionIndex($key)
    {


        $model = new Product();

//         if (!$idCate) {
//             throw new NotFoundHttpException("Trang này không tồn tại hoặc chưa cập nhập. Xin Quý khách quay lại sau");
//         }
        $key = (string)$key;
        

// // echo '<pre>';print_r($pages);die;
//         if(empty($dataCat)){
//             throw new NotFoundHttpException("Trang này không tồn tại hoặc chưa cập nhập. Xin Quý khách quay lại sau"); 
//         }else {
//             $proType = new Producttype();
//             $dataProType = $proType->getAllProductType();
//             return $this->render('listproduct',['productCat'=>$dataCat,'dataProType'=>$dataProType,'pages'=>$pages]);
//         }


    	
    	if($key!=''){
    		$dataCat = $model->searchProduct($key);
    		$proType = new Producttype();
    		$dataProType = $proType->getAllProductType();

    		// trả về số trang 
    		$pages = $model->getPagerProductSearch($key);
    	// echo '<pre>';print_r($dataCat);die;

    	}else{
    		throw new NotFoundHttpException("Sản phẩm quí khách tìm kiếm không có, xin vui lòng tìm kiếm sản phẩm khác hoặc liên hệ số hotline: 0982.618.518 để được trợ giúp. Xin cảm ơn !");
    	}
        return $this->render('index',['productCat'=>$dataCat,'dataProType'=>$dataProType,'pages'=>$pages]);

    }

}
