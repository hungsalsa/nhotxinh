<?php

namespace frontend\controllers;
use Yii;
use yii\helpers\Url;
use frontend\models\News;
use frontend\models\product\FProductCategory;
use frontend\models\product\FProduct;
use frontend\models\product\FProductType;
use yii\web\NotFoundHttpException;
class CategoriesController extends \yii\web\Controller
{
    public function actionIndex($slug,$page=1)
    {
        $category = FProductCategory::findOne(['slug'=>$slug]);
        if($category){
            $model = new FProductCategory();
            $idCateChild = $model->getChildCate($category->idCate);

            $model = new FProduct();
            $dataProduct = $model->getProductByCateList($idCateChild,12);
            $pages = $model->dataPagerProduct($idCateChild,12);
            $model = new FProductType();
            $productType = $model->getAllType();
            // dbg($productType);
            $data = [
                'dataProduct'=>$dataProduct,
                'pages'=>$pages,
                'seo'=>[
                    'title'=>$category->title
                ]
            ];

            Yii::$app->view->registerMetaTag([
                'name' => 'keywords',
                'content' => $category->keyword
            ]);
            
            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => $category->description
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:title',
                'content' => $category->title
            ]);

            Yii::$app->view->registerMetaTag([
                'property' => 'og:url',
                'content' => Url::to(['categories/index', 'slug'=>$category->slug, 'page' => $page],true)
            ]);
// foreach ($dataProduct as $value) {
//     dbg($value);
// }
        // dbg($dataProduct);
        }else {
            throw new NotFoundHttpException('Dữ liệu này đang cập nhật, xin vui lòng quay lại sau');
        }
        return $this->render('index',[
            'data'=>$data,
            'productType'=>$productType,
        ]);
    }

    public function actionListcate($id)
    {
    	$new = new News();
    	$dataNews = $new->getNewByCate($id);
        if(!empty($dataNews)){
        	return $this->render('listcate',['dataNews'=>$dataNews]);
        }else {
            throw new NotFoundHttpException('Trang này không tồn tại.'); 
        }
        
    }

}
