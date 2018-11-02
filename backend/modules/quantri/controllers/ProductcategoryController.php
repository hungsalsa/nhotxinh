<?php

namespace backend\modules\quantri\controllers;

use Yii;
use backend\modules\quantri\models\Productcategory;
use backend\modules\quantri\models\SeoUrl;
use backend\modules\quantri\models\ProductcategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductcategoryController implements the CRUD actions for Productcategory model.
 */
class ProductcategoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Productcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productcategory model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Productcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productcategory();
        $seo = new SeoUrl();

        $dataCat = $model->getCategoryParent();
        if(empty($dataCat)){
            $dataCat = array();
        }

        $model->active = true;
        $model->created_at = time();
        $model->updated_at = time();
        $model->user_id = Yii::$app->user->id;

        
        if ($model->load($post = Yii::$app->request->post()) && $seo->load($post = Yii::$app->request->post())) {
            $model->slug = $post['SeoUrl']['slug'];
            $seo->slug = $post['SeoUrl']['slug'];

            if ($post['Productcategory']['product_parent_id']=='') {
                $model->product_parent_id = 0;
            }
            if ($post['Productcategory']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo,'',$post['Productcategory']['image']);
            }
            // echo '<pre>';print_r($post);
            // die;
            $isValid = $model->validate();
            $isValid = $seo->validate() && $isValid;
            if ($isValid) {
                $model->save(false);
                $seo->query = 'product_cate='.$model->idCate;
                $seo->save(false);
                return $this->redirect(['index']);
            }

            // if($model->save()){

            //     $seo->query = 'product_cate='.$model->idCate;
            //     $seo->save();
            //     return $this->redirect(['index']);
            // }
        }

        return $this->render('create', [
            'model' => $model,
            'seo' => $seo,
            'dataCat' => $dataCat,
        ]);
    }

    /**
     * Updates an existing Productcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // echo $model->slug;die;
        $seo = new SeoUrl();
        $idSeo = $seo->getSeoID($model->slug);
        if($idSeo){
            $seo = $this->findModelSeo($idSeo);
        }else {
            $seo->slug = '';
        }

        $dataCat = $model->getCategoryParent();
        if(empty($dataCat)){
            $dataCat = array();
        }

        $model->updated_at = time();
        $model->user_id = Yii::$app->user->id;
// echo '<pre>';print_r($seo);
            // die;
        
        if ($model->load($post = Yii::$app->request->post()) && $seo->load($post = Yii::$app->request->post())) {
            $model->slug = $post['SeoUrl']['slug'];
            $seo->slug = $post['SeoUrl']['slug'];

            if ($post['Productcategory']['product_parent_id']=='') {
                $model->product_parent_id=0;
            }
            if ($post['Productcategory']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo,'',$post['Productcategory']['image']);
            }

            $isValid = $model->validate();
            $isValid = $seo->validate() && $isValid;
            if ($isValid) {
                $model->save(false);
                $seo->query = 'product_cate='.$model->idCate;
                $seo->save(false);
                return $this->redirect(['index']);
            }
            
            // if($model->save()){
            //     // $seo->query = 'product_cate='.$model->idCate;
            //     if($seo->save())
            //     return $this->redirect(['view', 'id' => $model->idCate]);
            // }
        }

        return $this->render('update', [
            'model' => $model,
            'seo' => $seo,
            'dataCat' => $dataCat,
        ]);
    }

    /**
     * Deletes an existing Productcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $seo = new SeoUrl();
        $idSeo = $seo->getSeoInfo($model->slug);
        // echo '<pre>';print_r($idSeo);die;
        if($idSeo){
            $this->findModelSeo($idSeo)->delete();
        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Productcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productcategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelSeo($id)
    {
        if (($model = SeoUrl::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
