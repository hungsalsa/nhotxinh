<?php

namespace frontend\controllers;
use frontend\models\Product;
use frontend\models\Menus;
use frontend\models\ImgproList;
use frontend\models\Producttype;
use frontend\models\Productcategory;
// use frontend\models\Productcategory;
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

   
    public function actionDanhsach()
    {
        $request = \Yii::$app->request;
        $slug = $request->get('slug','');

        

        $model = new Product();
        $cate = new ProductCategory();
        // Tìm kiếm trả về parent_id của các product

        // Kiểm tra trên menu nều click tren menu
        $idCate = $cate->getIdByslug($slug);

        if (!$idCate) {
            throw new NotFoundHttpException("Trang này không tồn tại hoặc chưa cập nhập. Xin Quý khách quay lại sau");
        }
// echo '<pre>';
        // tra ve con cua cate
        $IdList = $cate->getAllID($idCate);
        // print_r(Yii::$app->request->queryParams);die;
        // Lay tat ca danh sach cac san pham co cate_id in ( $IdList)
        $dataCat = $model->getAllProductByIdCate($IdList);
        $pages = $model->getPagerProduct($IdList);

// echo '<pre>';print_r($pages);die;
        if(empty($dataCat)){
            throw new NotFoundHttpException("Trang này không tồn tại hoặc chưa cập nhập. Xin Quý khách quay lại sau"); 
        }else {
            $proType = new Producttype();
            $dataProType = $proType->getAllProductType();
            return $this->render('listproduct',['productCat'=>$dataCat,'dataProType'=>$dataProType,'pages'=>$pages]);
        }

    }
    public function actionView()
    {
        $request = \Yii::$app->request;
        $slug = $request->get('slug','');
        // $id = $request->get('id','');
        

        $data = new Product;
        $product = $data->getProductBySlug($slug);
        $producthot = $data->getProductRandon(5);

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
            $related_products = array();
            $typePro = array();
            if(!empty($product['related_products'])){
                $typePro = new Producttype();
                $typePro = $typePro->getAllProductType();
              $idlist = json_decode($product['related_products']);
              $related_products = $data->getAllProductById($idlist);
            }

            $imgpro = new ImgproList();
            $listImg = $imgpro->getAllImagePro($product['id']);
            return $this->render('view',['product'=>$product,'listImg'=>$listImg,'related_products'=>$related_products,'typePro'=>$typePro,'producthot'=>$producthot]);
        }else {
            throw new NotFoundHttpException('Trang này không tồn tại.'); 
        }

    }
}
