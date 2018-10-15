<?php

namespace frontend\widgets;
use yii;
use yii\base\Widget;
use yii\helpers\Html;
use frontend\models\News;
use frontend\models\Product;
class productTagsWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$request = \Yii::$app->request;
        $slug = $request->get('slug','');

        $controller = Yii::$app->controller->id;
        $dataPro = array();

        // Kiem tra con troller va tra về danh sách mảng ID sản phẩm liên quan
        if($controller == 'tin-tuc'){
            $new = new News();
            $data = $new->getProductNew($slug);

            if(!empty($data['related_products'])){
              $related_products = json_decode($data['related_products']);
            }
        }

        // Trả về danh sách các sản phẩm liên quan
        $product = new Product();
        if(isset($related_products)){
            $dataPro = $product->getProductRelated($related_products);
        }
        
        // echo Yii::$app->controller->id;
        // print_r($newInfo);
        return $this->render('layout/productTagsWidget',['dataPro'=>$dataPro]);
    }
}