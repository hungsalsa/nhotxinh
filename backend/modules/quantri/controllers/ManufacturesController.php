<?php

namespace backend\modules\quantri\controllers;

use Yii;
use backend\modules\quantri\models\Manufactures;
use backend\modules\quantri\models\ManufacturesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ManufacturesController implements the CRUD actions for Manufactures model.
 */
class ManufacturesController extends Controller
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
     * Lists all Manufactures models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ManufacturesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Manufactures model.
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
     * Creates a new Manufactures model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Manufactures();

        $dataManufac = $model->getManufacturesParent();
        if(empty($dataManufac)){
            $dataManufac = array();
        }
        $model->created_at = time();
        $model->updated_at = time();
        
        $model->user_id = Yii::$app->user->id;

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->idMan]);
        // }
        
        if ($model->load($post = Yii::$app->request->post()) ) {
            if ($post['Manufactures']['parent_id']=='') {
                $model->parent_id=0;
            }
            if ($post['Manufactures']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo,'',$post['Manufactures']['image']);
            }
            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'dataManufac' => $dataManufac,
        ]);
    }

    /**
     * Updates an existing Manufactures model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $dataManufac = $model->getManufacturesParent();
        if(empty($dataManufac)){
            $dataManufac = array();
        }
        $model->updated_at = time();
        
        $model->user_id = Yii::$app->user->id;

        if ($model->load($post = Yii::$app->request->post()) ) {
            if ($post['Manufactures']['parent_id']=='') {
                $model->parent_id=0;
            }
            if ($post['Manufactures']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo,'',$post['Manufactures']['image']);
            }
            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataManufac' => $dataManufac,
        ]);
    }

    /**
     * Deletes an existing Manufactures model.
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
     * Finds the Manufactures model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Manufactures the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Manufactures::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
