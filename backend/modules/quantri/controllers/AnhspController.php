<?php

namespace backend\modules\quantri\controllers;

use Yii;
use backend\modules\quantri\models\Imgprolist;
use backend\modules\quantri\models\Product;
use backend\modules\quantri\models\ImgprolistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnhspController implements the CRUD actions for Imgprolist model.
 */
class AnhspController extends Controller
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
     * Lists all Imgprolist models.
     * @return mixed
     */
    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }
    public function actionIndex($id)
    {
        $product = new Product();
        $proInfo = $product->getProinfo($id);
        
        $searchModel = new ImgprolistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('pro_id = '.$id);

        return $this->render('index', [
            'id'=>$id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'proInfo' => $proInfo,
        ]);
    }

    /**
     * Displays a single Imgprolist model.
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
     * Creates a new Imgprolist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Imgprolist();

        $product = new Product();
        $listPro = $product->getAllPro();
        $proInfo = $product->getProinfo($id);
        
        $model->status = true;
        $model->pro_id = $proInfo['id'];
        if ($model->load($post = Yii::$app->request->post()) ) {

            if ($post['Imgprolist']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo.'/','',$post['Imgprolist']['image']);
            }

            if($model->save()){
                return $this->redirect(['index','id'=>$model->pro_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'listPro' => $listPro,
        ]);
    }

    /**
     * Updates an existing Imgprolist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $product = new Product();
        $listPro = $product->getAllPro();
        $proInfo = $product->getProinfo($id);
        // $pro = array($proInfo['id']=>$proInfo['pro_name']);
        // $model->pro_id = $proInfo['id'];
        // echo $model->pro_id;die;
        if ($model->load($post = Yii::$app->request->post()) ) {
            if ($post['Imgprolist']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo.'/','',$post['Imgprolist']['image']);
            }
// echo '<pre>';print_r($post);die;
            if($model->save()){
                return $this->redirect(['index','id'=>$model->pro_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'listPro' => $listPro,
        ]);
    }

    /**
     * Deletes an existing Imgprolist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index','id'=>$proInfo['id']]);
    }

    /**
     * Finds the Imgprolist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Imgprolist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Imgprolist::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
