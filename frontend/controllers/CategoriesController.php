<?php

namespace frontend\controllers;
use frontend\models\News;
use yii\web\NotFoundHttpException;
class CategoriesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
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

    // public function actionDanhsach()
    // {
    //     $request = \Yii::$app->request;
    //     $slug = $request->get('slug','');
    //     echo $slug;
    // }
}
