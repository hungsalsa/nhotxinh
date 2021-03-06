<?php

namespace backend\modules\quantri\controllers;

use Yii;
use backend\modules\quantri\models\Product;
use backend\modules\quantri\models\Productcategory;
use backend\modules\quantri\models\Manufactures;
use backend\modules\quantri\models\Producttype;
use backend\modules\quantri\models\Models;
use backend\modules\quantri\models\News;
use backend\modules\quantri\models\SeoUrl;
use backend\modules\quantri\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

        $category = new Productcategory();
        $dataCat = $category->getCategoryParent();
        if(empty($dataCat)){
            $dataCat = array();
        }

        $manufactures = new Manufactures();
        $dataManufac = $manufactures->getManufacturesParent();
        if(empty($dataManufac)){
            $dataManufac = array();
        }

        $models = new Models();
        $dataModel = $models->getModelsParent();
        if(empty($dataModel)){
            $dataModel = array();
        }

        $type_pro = new Producttype();
        $dataType= $type_pro->getAllProductType();
        if(empty($dataType)){
            $dataType = array();
        }

        $dataProduct = $model->getAllPro();
        
        $new = new News();
        $dataNews = $new->getAllNews();

        $model->created_at = time();
        $model->updated_at = time();
        $model->user_id = Yii::$app->user->id;

        $seo = new SeoUrl();

        if ($model->load($post = Yii::$app->request->post()) ) {
            if ($post['Product']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo.'/','',$post['Product']['image']);
            }

            if (!empty($post['Product']['product_type_id'])) {
                $product_type_id = $post['Product']['product_type_id'];
                $model->product_type_id = json_encode($product_type_id);
            }

            if (!empty($post['Product']['start_sale'])) {
                $model->start_sale = Yii::$app->formatter->asDate($post['Product']['start_sale'], 'Y-MM-dd');
            }
            if (!empty($post['Product']['end_sale'])) {
                $model->end_sale = Yii::$app->formatter->asDate($post['Product']['end_sale'], 'Y-MM-dd');
            }

            if (!empty($post['Product']['models_id'])) {
                $models_ids = $post['Product']['models_id'];
                $model->models_id = json_encode($models_ids);
            }
            if ($post['Product']['related_products']!='') {
                $model->related_products = json_encode($post['Product']['related_products']);
            }
            if ($post['Product']['related_articles']!='') {
                $model->related_articles = json_encode($post['Product']['related_articles']);
            }

            if ($post['Product']['slug']!='') {
                $seo->language_id=1;
                $seo->query='product/view';
                $seo->slug = $post['Product']['slug'];

                $seo->save();
            }

            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'dataCat' => $dataCat,
            'dataManufac' => $dataManufac,
            'dataModel' => $dataModel,
            'dataType' => $dataType,
            'dataProduct' => $dataProduct,
            'dataNews' => $dataNews,
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

        $category = new Productcategory();
        $dataCat = $category->getCategoryParent();
        if(empty($dataCat)){
            $dataCat = array();
        }

        $manufactures = new Manufactures();
        $dataManufac = $manufactures->getManufacturesParent();
        if(empty($dataManufac)){
            $dataManufac = array();
        }

        $models = new Models();
        $dataModel = $models->getModelsParent();
        if(empty($dataModel)){
            $dataModel = array();
        }

        $type_pro = new Producttype();
        $dataType= $type_pro->getAllProductType();
        if(empty($dataType)){
            $dataType = array();
        }

        $dataProduct = $model->getAllPro();
        
        $new = new News();
        $dataNews = $new->getAllNews();

        if($model->related_products !=''){
            $model->related_products = json_decode($model->related_products);
        }

        if($model->related_articles !=''){
            $model->related_articles = json_decode($model->related_articles);
        }

        if($model->product_type_id !=''){
            $model->product_type_id = json_decode($model->product_type_id);
        }
        if($model->start_sale !=''){
            $model->start_sale = Yii::$app->formatter->asDate($model->start_sale, 'dd-MM-Y');
        }
        if($model->end_sale !=''){
            $model->end_sale = Yii::$app->formatter->asDate($model->end_sale, 'dd-MM-Y');
        }

        $model->updated_at = time();
        $model->user_id = Yii::$app->user->id;

        // $seo = new SeoUrl();
        // if($model->slug !=''){
        //     $model_Seo = $seo->getSeoUrl($model->slug);
        // }

// print_r($model->start_sale );die;
        if ($model->load($post = Yii::$app->request->post()) && $model->validate()) {

            if ($post['Product']['image']!='') {
                $model->image = str_replace(Yii::$app->request->hostInfo.'/','',$post['Product']['image']);
            }
            if (!empty($post['Product']['models_id'])) {
                $models_ids = $post['Product']['models_id'];
                $model->models_id = json_encode($models_ids);
            }

            if (!empty($post['Product']['product_type_id'])) {
                $product_type_id = $post['Product']['product_type_id'];
                $model->product_type_id = json_encode($product_type_id);
            }

            if ($post['Product']['start_sale'] !='') {
                $model->start_sale = Yii::$app->formatter->asDate($post['Product']['start_sale'], 'Y-MM-dd');
            }
            if ($post['Product']['end_sale'] != '') {
                $model->end_sale = Yii::$app->formatter->asDate($post['Product']['end_sale'], 'Y-MM-dd');
            }
            if ($post['Product']['related_products']!='') {
                $model->related_products = json_encode($post['Product']['related_products']);
            }
            if ($post['Product']['related_articles']!='') {
                $model->related_articles = json_encode($post['Product']['related_articles']);
            }

            // if($post['Product']['slug']!='' && $model_Seo === null){
            //     $seo->language_id=1;
            //     $seo->query='product/view/'.$id;
            //     $seo->slug = $post['Product']['slug'];
                
            // }

            // if ($post['Product']['slug']!='' && !empty($model_Seo) ) {
            //     $model_Seo->language_id=1;
            //     $model_Seo->query='product/view/'.$id;
            //     $model_Seo->slug = $post['Product']['slug'];
                
            // }

            if($model->save()){
                // if($seo->save() || $model_Seo->save()){
                    return $this->redirect(['index']);
                // }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataCat' => $dataCat,
            'dataManufac' => $dataManufac,
            'dataModel' => $dataModel,
            'dataType' => $dataType,
            'dataProduct' => $dataProduct,
            'dataNews' => $dataNews,
        ]);
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

    function utf8_string_array_encode(&$array){
        $func = function(&$value,&$key){
            if(is_string($value)){
                $value = utf8_encode($value);
            }
            if(is_string($key)){
                $key = utf8_encode($key);
            }
            if(is_array($value)){
                utf8_string_array_encode($value);
            }
        };
        array_walk($array,$func);
        return $array;
    }
}
