<?php

namespace backend\modules\setting\controllers;

use Yii;
use backend\modules\setting\models\SettingCategory;
use backend\modules\quantri\models\Productcategory;
use backend\modules\setting\models\SettingCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SettingcategoryController implements the CRUD actions for SettingCategory model.
 */
class SettingcategoryController extends Controller
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
     * Lists all SettingCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SettingCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SettingCategory model.
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
     * Creates a new SettingCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SettingCategory();

        $dataSetCate = $model->getParentSetCategory();

        $catProduct = new Productcategory();
        $dataLinkCat = $catProduct->getCategoryParent();
        if(empty($dataLinkCat)){
            $dataLinkCat = array();
        }

        $model->created_at = time();
        $model->updated_at = time();
        $model->user_add = Yii::$app->user->id;

        
        if ($model->load($post = Yii::$app->request->post()) ) {
            
            if ($post['SettingCategory']['parent_id']!='') {
                $model->parent_id = 0;
            }

            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'dataSetCate' => $dataSetCate,
            'dataLinkCat' => $dataLinkCat,
        ]);
    }

    /**
     * Updates an existing SettingCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $dataSetCate = $model->getParentSetCategory();

        $catProduct = new Productcategory();
        $dataLinkCat = $catProduct->getCategoryParent();
        
        if(empty($dataLinkCat)){
            $dataLinkCat = array();
        }
// print_r($catProduct->getSlugcate(5));die;

        $model->updated_at = time();
        $model->user_add = Yii::$app->user->id;

        
        if ($model->load($post = Yii::$app->request->post()) ) {
            // echo '<pre>';
            // print_r($model);
            // print_r($catProduct->getSlugcate($post['SettingCategory']['link_cate']));
            // print_r($post);
            // die;  

            // Sét parent_id = 0 neews ko chọn
            if ($post['SettingCategory']['parent_id']=='') {
                $model->parent_id = 0;
            }

            $model->slug_cate = $catProduct->getSlugcate($post['SettingCategory']['link_cate']);
            // echo $post['SettingCategory']['link_cate'].'<br>';echo $catProduct->getSlugcate($post['SettingCategory']['link_cate']);
            // echo $model->slug_cate;die;

            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataSetCate' => $dataSetCate,
            'dataLinkCat' => $dataLinkCat,
        ]);
    }

    /**
     * Deletes an existing SettingCategory model.
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
     * Finds the SettingCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SettingCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SettingCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
