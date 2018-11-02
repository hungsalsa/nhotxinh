<?php

namespace frontend\controllers;
use frontend\models\Product;
use frontend\models\Manufactures;
use common\libs\Cart;
use Yii;
use yii\web\Session;

class GioHangController extends \yii\web\Controller
{
    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }
    public function actionIndex()
    {
    	$session = Yii::$app->session;
        // echo '<pre>';print_r($session['cart']);
        // die;
    	$manu = new Manufactures();
    	$dataManu = $manu->getAllManufacture();
    	if(empty($dataManu)){
    		$dataManu = array();
    	}

        if($post = Yii::$app->request->post()){
            $session['khachhang'] =[
                'fullname'=> html_entity_decode($post['fullname']),
                'phone'=> html_entity_decode($post['phone']),
                'email'=> html_entity_decode($post['email']),
                'note'=> html_entity_decode($post['note']),
            ];
            echo '<pre>';
            echo htmlentities($session['khachhang']['fullname']);
            print_r($session['khachhang']);
            die;
        }

        return $this->render('index',['cart'=>$session['cart'],'dataManu'=>$dataManu]);
    }

    function actionAddcart($id,$num)
    {
    	// $product = new Product();
    	// $productinfo = $product->getProductById($id);

    	$cart = new Cart();
    	$cart->addCart($id,$num);

    	$session = Yii::$app->session;

    	$infoCart = $session['cart'];
// echo '<pre>';print_r($infoCart);die;
    	$totalAmount = $total =0;
    	foreach ($infoCart as $value) {
    		$totalAmount += $value['pro_sl'];
    		$total += $value['price_sales']*$value['pro_sl'];
    	}
    	return $this->renderAjax('cart',['infoCart'=>$totalAmount.'-'.$total]);

    }

    // public function actionDelcart($id)
    // {
    // 	$cart = new Cart();
    // 	$cart->delItemCart($id);

    // 	$session = Yii::$app->session;
    // 	$infoCart = $session['cart'];

    // 	$totalAmount = $total =0;
    // 	foreach ($infoCart as $value) {
    // 		$totalAmount += $value['amount'];
    // 		$total += $value['price_sales']*$value['amount'];
    // 	}
    // 	return $this->renderAjax('cart',['infoCart'=>$totalAmount.'-'.$total]);
    // }

    public function actionUpdatecart($id,$num)
    {
    	// $amount = Yii::$app->getRequest()->getQueryParam('amount');
    	$cart = new Cart();
    	$cart = $cart->updateCart($id,$num);

        $manu = new Manufactures();
        $dataManu = $manu->getAllManufacture();
        if(empty($dataManu)){
            $dataManu = array();
        }

        $session = Yii::$app->session;
        $infoCart = $session['cart'];
        $totalAmount = $total =0;
        foreach ($infoCart as $value) {
            $totalAmount += $value['pro_sl'];
            $total += $value['price_sales']*$value['pro_sl'];
        }
    	return $this->renderPartial('index',['cart'=>$session['cart'],'dataManu'=>$dataManu]);
    }

}
