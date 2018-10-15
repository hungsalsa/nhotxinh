<?php

namespace frontend\controllers;
use frontend\models\Product;
use frontend\models\ImgproList;
// use frontend\models\Productcategory;
use backend\modules\quantri\models\Producttype;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii;
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

        // print_r($dataCat);die;
        if(empty($dataCat)){
            throw new NotFoundHttpException('Trang này không tồn tại.'); 
        }else {
            $proType = new Producttype();
            $dataProType = $proType->getAllProductType();
            return $this->render('listproduct',['productCat'=>$dataCat,'dataProType'=>$dataProType]);
        }
        
    }

    public function actionDetail_($id)
    {
    	$data = new Product;
    	$product = $data->getProductById($id);

        $imgpro = new ImgproList();
        $listImg = $imgpro->getAllImagePro($id);

    	// echo '<pre>';print_r($listImg);die;
    	return $this->render('detail',['product'=>$product,'listImg'=>$listImg]);

    }
    public function actionDanhsach()
    {
        $request = \Yii::$app->request;
        $slug = $request->get('slug','');

        $model = new Product();
        // $cate = array($id);
        $dataCat = $model->getAllCateSlug($slug);
        if(empty($dataCat)){
            $dataCat = array();
        }

        if(empty($dataCat)){
            throw new NotFoundHttpException('Trang này không tồn tại.'); 
        }else {
            $proType = new Producttype();
            $dataProType = $proType->getAllProductType();
            return $this->render('listproduct',['productCat'=>$dataCat,'dataProType'=>$dataProType]);
        }


    }
    public function actionView()
    {
        $request = \Yii::$app->request;
        $slug = $request->get('slug','');
        // $id = $request->get('id','');
        $data = new Product;
        $product = $data->getProductBySlug($slug);

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $product['description']
        ]);

        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $product['keyword'],
        ]);

        // echo '<pre>';print_r($product);die;
        if(!empty($product)){
            $imgpro = new ImgproList();
            $listImg = $imgpro->getAllImagePro($product['id']);
            return $this->render('view',['product'=>$product,'listImg'=>$listImg]);
        }else {
            throw new NotFoundHttpException('Trang này không tồn tại.'); 
        }

    }
}
