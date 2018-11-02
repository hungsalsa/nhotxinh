<?php

namespace frontend\controllers;

use Yii;
use frontend\models\News;
use frontend\models\Menus;
use frontend\models\Categories;
use frontend\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TinTucController implements the CRUD actions for News model.
 */
class TinTucController extends Controller
{
    
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        $this->layout = 'view';
        $request = \Yii::$app->request;
        $slug = $request->get('slug','');
        $model = new News();
        $newInfo = $model->NewInfo($slug);
        if (empty($newInfo)) {
            throw new NotFoundHttpException("Trang này không tồn tại hoặc chưa cập nhập. Xin Quý khách quay lại sau"); 
        } else {
            return $this->render('view', [
                'newInfo'=>$newInfo
            ]);
        }

    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionList()
    {
        $this->layout = 'view';
        $request = \Yii::$app->request;
        $slug = $request->get('slug','');

        $menu = new Menus();
        $cate = new Categories();
        $model = new News();


        $MenuInfo = $menu->getMenuInfo($slug);
        // if(empty($MenuInfo)){
        //     $newInfo = $model->NewInfo($slug);

        //     return $this->render('view', [
        //         'newInfo'=>$newInfo
        //     ]);
        // }else{
        if(!empty($MenuInfo)){
            $idCate = $cate->getListId($MenuInfo->link_cate);
            array_push($idCate,$MenuInfo->link_cate);
            // trar vee danh sach cac tin tuc
            $dataNew = $model->getAllNewCateArray($idCate);


            return $this->render('index', [
                'dataNew' => $dataNew,
            ]);
        }else {
            throw new NotFoundHttpException("Trang này không tồn tại hoặc chưa cập nhập. Xin Quý khách quay lại sau"); 
        }
        // }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
}
