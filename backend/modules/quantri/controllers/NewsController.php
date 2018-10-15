<?php

namespace backend\modules\quantri\controllers;

use Yii;
use backend\modules\quantri\models\News;
use backend\modules\quantri\models\Categories;
use backend\modules\quantri\models\Product;
use backend\modules\quantri\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }
    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        $categories = new Categories();
        $datacat = $categories->getCategoryParent();
        if (empty($datacat)) {
            $datacat=array();
        }
// print_r($datacat);die;
        $product = new Product();
        $dataProduct = $product->getAllPro();
        
        $dataNews = $model->getAllNews();

        $model->created_at=time();
        $model->updated_at=time();
        $model->user_add = Yii::$app->user->id;

        if ($model->load($post = Yii::$app->request->post()) ) {
            if ($post['News']['images']!='') {
                $model->images = str_replace(Yii::$app->request->hostInfo.'/','',$post['News']['images']);
            }

            if ($post['News']['related_products']!='') {
                $model->related_products = json_encode($post['News']['related_products']);
            }
            if ($post['News']['related_news']!='') {
                $model->related_news = json_encode($post['News']['related_news']);
            }
            
            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'datacat' => $datacat,
            'dataProduct' => $dataProduct,
            'dataNews' => $dataNews,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $categories = new Categories();
        $datacat = $categories->getCategoryParent();
        if (empty($datacat)) {
            $datacat=array();
        }
        $product = new Product();
        $dataProduct = $product->getAllPro();
        
        $dataNews = $model->getAllNews();

        if($model->related_products !=''){
            $model->related_products = json_decode($model->related_products);
        }

        if($model->related_news !=''){
            $model->related_news = json_decode($model->related_news);
        }
// print_r($datacat);die;
        $model->updated_at=time();
        $model->user_add = Yii::$app->user->id;

        if ($model->load($post = Yii::$app->request->post()) ) {
            if ($post['News']['images']!='') {
                $model->images = str_replace(Yii::$app->request->hostInfo.'/','',$post['News']['images']);
            }

            if ($post['News']['related_products']!='') {
                $model->related_products = json_encode($post['News']['related_products']);
            }
            if ($post['News']['related_news']!='') {
                $model->related_news = json_encode($post['News']['related_news']);
            }

            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'datacat' => $datacat,
            'dataProduct' => $dataProduct,
            'dataNews' => $dataNews,
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
