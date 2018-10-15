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
 * ImgprolistController implements the CRUD actions for Imgprolist model.
 */
class ImgprolistController extends Controller
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
    public function actionIndex()
    {
        $searchModel = new ImgprolistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexpro($id)
    {
        $product = new Product();
        $proInfo = $product->getProinfo($id);
        // echo '<pre>';
        // print_r($proInfo);die;
        $searchModel = new ImgprolistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexpro', [
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

    public function actionViewpro($id)
    {
        return $this->render('viewpro', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Imgprolist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Imgprolist();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreatepro($id)
    {
        $model = new Imgprolist();

        $product = new Product();
        $listPro = $product->getAllPro();
        $proInfo = $product->getProinfo($id);
        // $pro = array($proInfo['id']=>$proInfo['pro_name']);
// print_r($pro);die;
        $model->pro_id = $proInfo['id'];

        if ($model->load($post = Yii::$app->request->post()) ) {
            if ($post['Imgprolist']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo.'/','',$post['Imgprolist']['image']);
            }

            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('createpro', [
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
        $model->pro_id = $proInfo['id'];

        if ($model->load($post = Yii::$app->request->post()) ) {
            if ($post['Imgprolist']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo.'/','',$post['Imgprolist']['image']);
            }

            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('updatepro', [
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

        return $this->redirect(['index']);
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
