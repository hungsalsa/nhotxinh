<?php

namespace backend\modules\setting\controllers;

use Yii;
use backend\modules\setting\models\Banner;
use backend\modules\setting\models\BannerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * BannerController implements the CRUD actions for Banner model.
 */
class BannerController extends Controller
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

    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }
    /**
     * Lists all Banner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BannerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder = ['order' => SORT_ASC,'created_at' => SORT_DESC,'updated_at' => SORT_DESC];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Banner model.
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
     * Creates a new Banner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Banner();

        $model->created_at = time();
        $model->updated_at = time();
        $model->userCreated = Yii::$app->user->id;
        $model->userUpdated = Yii::$app->user->id;

        if ($model->load($post = Yii::$app->request->post())) {
            $fileUpload = UploadedFile::getInstance($model,'image');
            
            $fileUpload->saveAs('banner/'. $fileUpload->baseName . '.' . $fileUpload->extension);
            $model->image = 'banner/'. $fileUpload->name;
            if ($post['Banner']['order']=='') {
                $model->order = 999;
            }
            if($model->save())
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Banner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = '@backend/views/layouts/edit';
        $model = $this->findModel($id);

        $model->updated_at = time();
        $model->userUpdated = Yii::$app->user->id;

        /*Lấy thông tin file ảnh cũ*/

        $file_path_current =  $_SERVER['DOCUMENT_ROOT'] .'/'. $model->image;
        $image_curent = $model->image;

        if ($model->load($post = Yii::$app->request->post())) {
            $model->image = $image_curent;
            $fileUpload = UploadedFile::getInstance($model,'image');
            if ($fileUpload) {
                
            
            if (file_exists($file = $_SERVER['DOCUMENT_ROOT'].'/banner/'.$fileUpload->name)){
                Yii::$app->getSession()->setFlash('messeage', $file." da ton tai");
                $model->image ='banner/'.$fileUpload->name;
            }else {
                if (file_exists($file_path_current)){
                    if ($image_curent != 'banner/'.$fileUpload->name) {
                        // Kieemr tra tat ca cac banner khac xem co anh nay khong
                        $checkBanner = new Banner();
                        $checkBanner_count = $checkBanner->checkBannerImage($id,$image_curent);
                        // dbg($checkBanner_count);
                        if ($checkBanner_count==0) {
                            if(unlink($file_path_current)){
                             echo "File deleted";
                         }
                     }
                     $fileUpload->saveAs($_SERVER['DOCUMENT_ROOT'].'/banner/'. $fileUpload->baseName . '.' . $fileUpload->extension);
                     $model->image = 'banner/'. $fileUpload->name;
                 }
             }
             else{
                $fileUpload->saveAs($_SERVER['DOCUMENT_ROOT'].'/banner/'. $fileUpload->baseName . '.' . $fileUpload->extension);
                $model->image = 'banner/'. $fileUpload->name;
                echo "File current is not exists";
            }
        }
}

            if ($post['Banner']['order']=='') {
                $model->order = 999;
            }
            if($model->save())
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Banner model.
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
     * Finds the Banner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Banner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
