<?php

namespace backend\modules\quantri\controllers;

use Yii;
use backend\modules\quantri\models\Product;
use backend\modules\quantri\models\Productcategory;
use backend\modules\quantri\models\Producttype;
use backend\modules\quantri\models\Manufactures;
use backend\modules\quantri\models\News;
use backend\modules\quantri\models\Models;
use backend\modules\quantri\models\SeoUrl;
use backend\modules\quantri\models\SeoUrlSearch;
use backend\modules\quantri\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response; // Add This line
use yii\widgets\ActiveForm; //Add This Line

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
         $model->scenario = 'create';

        // if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        //     Yii::$app->response->format = 'json';
        //     return ActiveForm::validate($model);
        // }

        $cate = new Productcategory();
        $dataCate = $cate->getCategoryParent();
        if(empty($dataCate)){
            $dataCate = array();
        }

        $type_pro = new Producttype();
        $dataType= $type_pro->getAllProductType();
        if(empty($dataType)){
            $dataType = array();
        }

        $manufactures = new Manufactures();
        $dataManufac = $manufactures->getManufacturesParent();
        if(empty($dataManufac)){
            $dataManufac = array();
        }

        $new = new News();
        $dataNews = $new->getAllNews();
         if(empty($dataNews)){
            $dataNews = array();
        }

        $dataProduct = $model->getAllPro();

        $models = new Models();
        $dataModel = $models->getModelsParent();
        if(empty($dataModel)){
            $dataModel = array();
        }

        $model->created_at = time();
        $model->updated_at = time();
        $model->user_id = Yii::$app->user->id;

        if ($model->load($postP = Yii::$app->request->post())) {

            if ($postP['Product']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo.'/','',$postP['Product']['image']);
            }
            
            if($postP['Product']['product_type_id'] !=''){
                $model->product_type_id = json_encode($postP['Product']['product_type_id']);
            }
            if($postP['Product']['related_articles'] !=''){
                $model->related_articles = json_encode($postP['Product']['related_articles']);
            }

            if($postP['Product']['related_products'] !=''){
                $model->related_products = json_encode($postP['Product']['related_products']);
            }

            if($postP['Product']['models_id'] !=''){
                $model->models_id = json_encode($postP['Product']['models_id']);
            }

            if($postP['Product']['title'] !=''){
                $model->slug = $this->createSlug($postP['Product']['title']);
            }else{
                $model->title = trim($postP['Product']['pro_name']);
                $model->slug = $this->createSlug($postP['Product']['pro_name']);
            }
            if (!$model->validate()) {
                // validation failed: $errors is an array containing error messages
                $errors = $model->errors;
                // print_r($model->getErrors());die;
                $str_error = '';
                foreach ($errors as $value) {
                    if(count($value)){
                        foreach ($value as $value2) {
                            $str_error .=$value2.'<br/>';
                        }
                    }else {
                        $str_error .=$value.'<br/>';
                    }
                }
                
                Yii::$app->session->setFlash('messeage',$str_error);
            }
            // print_r($this->createSlug($postP['Product']['pro_name']));die;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'dataCate' => $dataCate,
            'dataType' => $dataType,
            'dataManufac' => $dataManufac,
            'dataNews' => $dataNews,
            'dataProduct' => $dataProduct,
            'dataModel' => $dataModel,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // $model->scenario = 'update';

        $cate = new Productcategory();
        $dataCate = $cate->getCategoryParent();
        if(empty($dataCate)){
            $dataCate = array();
        }

        $type_pro = new Producttype();
        $dataType= $type_pro->getAllProductType();
        if(empty($dataType)){
            $dataType = array();
        }

        $manufactures = new Manufactures();
        $dataManufac = $manufactures->getManufacturesParent();
        if(empty($dataManufac)){
            $dataManufac = array();
        }

        $new = new News();
        $dataNews = $new->getAllNews();
         if(empty($dataNews)){
            $dataNews = array();
        }

        $dataProduct = $model->getAllPro();

        $models = new Models();
        $dataModel = $models->getModelsParent();
        if(empty($dataModel)){
            $dataModel = array();
        }

        if($model->product_type_id !=''){
            $model->product_type_id = json_decode($model->product_type_id);
        }
        if($model->related_articles !=''){
            $model->related_articles = json_decode($model->related_articles);
        }
        if($model->related_products !=''){
            $model->related_products = json_decode($model->related_products);
        }
        if($model->models_id !=''){
            $model->models_id = json_decode($model->models_id);
        }

        $model->updated_at = time();
        $model->user_id = Yii::$app->user->id;

        $seo = new SeoUrl();
        
        // Kiem tra load ajax
        if (Yii::$app->request->isAjax && $model->load($postP = Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
            // Yii::$app->session->setFlash('messeage','aaaaaaaaaaa');
        }
       
        if ($model->load($postP = Yii::$app->request->post())) {

            // Kiem tra hop le cua rule
            if ($model->hasErrors()) {
                // validation fails
                Yii::$app->session->setFlash('messeage','aaaaaaaaaaa');
            } else {
                // validation succeeds
            }

            // if ($model->validate()) {
            //     // all inputs are valid
            // } else {
            //     // validation failed: $errors is an array containing error messages
            //     $errors = $model->errors;
            //      Yii::$app->session->setFlash('messeage','aaaaaaaaaaa');
            // }

            if ($postP['Product']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo.'/','',$postP['Product']['image']);
            }
            if($postP['Product']['product_type_id'] !=''){
                $model->product_type_id = json_encode($postP['Product']['product_type_id']);
            }
            if($postP['Product']['related_articles'] !=''){
                $model->related_articles = json_encode($postP['Product']['related_articles']);
            }

            if($postP['Product']['related_products'] !=''){
                $model->related_products = json_encode($postP['Product']['related_products']);
            }

            if($postP['Product']['models_id'] !=''){
                $model->models_id = json_encode($postP['Product']['models_id']);
            }
            
            if($postP['Product']['slug'] ==''){
                $model->slug = $this->createSlug($postP['Product']['pro_name']);
            }
            $countslug = $seo->getCountSeoUrl($model->slug);
             $infos = $seo->getSeoInfo('product/view/'.$id);
            if($model->save() ){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataCate' => $dataCate,
            'dataType' => $dataType,
            'dataManufac' => $dataManufac,
            'dataNews' => $dataNews,
            'dataProduct' => $dataProduct,
            'dataModel' => $dataModel,
        ]);
    }

    public function getErrors($attribute = null)
    {
        if ($attribute === null) {
            return $this->_errors === null ? [] : $this->_errors;
        }
        return isset($this->_errors[$attribute]) ? $this->_errors[$attribute] : [];
    }

     private function createSlug($str) {

        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;

    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTabsData() {
        $html = $this->renderPartial('tabContent');
        return Json::encode($html);
    }

    public function actionValidation() {
        $model = new Product();
       if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }

    
}
