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
use yii\filters\AccessControl;
use  backend\modules\auth\models\AuthAssignment;
use backend\modules\quantri\models\related\ProductRelatedTypeInterdependent;

class ProductController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
// 'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=> function ($rule ,$action)
                        {
                            $control = Yii::$app->controller->id;
                            $action = Yii::$app->controller->action->id;
                            $module = Yii::$app->controller->module->id;

                            $role = $module.'/'.$control.'/'.$action;
                            if (Yii::$app->user->can($role)) {
                                return true;
                            }else {
                                throw new \yii\web\HttpException(403, 'Bạn không có quyền vào đây');
                            }
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'quickchange' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }
    public function actionStatuschange($id)
    {
        $model = Product::findOne($id);
        if (Yii::$app->user->identity->getRoleName()=='author' && $model->userCreated != getUser()->id) {
            return json_encode(["postValue" => "Bài này không phải do bạn tạo, bạn không thể sửa \n Hãy liên hệ admin"]);
        }

        $authAssis = new AuthAssignment();
        // Lấy quyền của usẻ đăng nhập
        $perrmission = $authAssis->PermissionUser($model->userCreated);
        $perrmission_login = $authAssis->PermissionUser(getUser()->id);

        if ($perrmission_login !='admin' && $model->userCreated != getUser()->id ) {
            $result = ['admin'=>'Quản trị viên','manager'=>'Biên tập viên','author'=>'Cộng tác viên'];
            $return =  "Bài này do $result[$perrmission] : ".$model->userCreated->username." tạo, bạn chỉ có thể sửa bài của Cộng tác viên hoặc của chính bạn";
            return json_encode(["postValue" => $return]);
        }

        if ($model->active==0) {
            $model->active = 1;
            $postValue = 'Kích hoạt';
        } else {
            $model->active = 0;
            $postValue = ' Ẩn ';
        }
        $result = [
            'id' => $id,
            'value_post' => $model->active,
            'name' => $model->pro_name,
            'field' => 'active',
        ];
        $result = array_merge($result,["postValue" => $postValue]);

        $model->updated_at = time();
        $model->userUpdated = getUser()->id;

        if($model->save()==true) {
            return json_encode($result);
        }else {
            $erros = $model->errors;
            $result = ["error" => $erros]+$result;
            return json_encode($result);
        }
    }
    public function actionQuickchange()
    {
        $post = Yii::$app->request->post();
        $id = $post['id'];
        $model = Product::findOne($id);


        if (Yii::$app->user->identity->getRoleName()=='author' && $model->userCreated != getUser()->id) {
            return json_encode(["postValue" => "Bài này không phải do bạn tạo, bạn không thể sửa \n Hãy liên hệ admin"]);
        }

        $authAssis = new AuthAssignment();
        // Lấy quyền của usẻ đăng nhập
        $perrmission = $authAssis->PermissionUser($model->userCreated);
        $perrmission_login = $authAssis->PermissionUser(getUser()->id);

        if ($perrmission_login !='admin' && $model->userCreated != getUser()->id ) {
            $result = ['admin'=>'Quản trị viên','manager'=>'Biên tập viên','author'=>'Cộng tác viên'];
            $return =  "Bài này do $result[$perrmission] : ".$model->userCreated->username." tạo, bạn chỉ có thể sửa bài của Cộng tác viên hoặc của chính bạn";
            return json_encode(["postValue" => $return]);
        }

        $field = $post['field'];
        $value_post = trim($post['value_post']);
        $result = [
            'id' => $id,
            'value_post' => $value_post,
            'name' => $model->pro_name,
            'field' => 'Thành',
            "postValue" => $value_post
        ];

        if ($field== 'price_sales' || $field== 'price') {
            $fields = 'đổi giá bán';
            $result = [
                'id' => $id,
                'value_post' => $value_post,
                'name' => $model->pro_name,
                'field' => $fields,
                "postValue" => Yii::$app->formatter->asDecimal($value_post,0)
            ];
        }

        if ($field== 'product_category_id') {

            $cate = new Productcategory();
            $dataCate = $cate->getCategoryParent();
            $result = [
                'id' => $id,
                'value_post' => $value_post,
                'name' => $model->pro_name,
                'field' => "sang danh mục",
                "postValue" => $dataCate[$value_post]
            ];
        }

        $model->$field = trim($value_post);

        $model->updated_at = time();
        $model->userUpdated = getUser()->id;

        if($model->save()===true) {
            return json_encode($result);
        }else {
            $erros = $model->errors;
            $result = ["error" => $erros[$field][0]]+$result;
            // $result = ["error" => $erros];
            return json_encode($result);
        }
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder = ['updated_at' => SORT_DESC,'order' => SORT_ASC,'created_at' => SORT_DESC];

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
        // $model->scenario = 'create';
        $seo = new SeoUrl();

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

        $model->active = true;
        $model->created_at = time();
        $model->updated_at = time();
        $model->userCreated = Yii::$app->user->id;
        $model->userUpdated = Yii::$app->user->id;

        

        if ($model->load($postP = Yii::$app->request->post())  && $seo->load(Yii::$app->request->post())) {

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

            // if($postP['Product']['models_id'] !=''){
            //     $model->models_id = json_encode($postP['Product']['models_id']);
            // }
            
            $seo->slug = trim($postP['SeoUrl']['slug']);
            $model->slug = trim($postP['SeoUrl']['slug']);

            $isValid = $model->validate();
            $isValid = $seo->validate() && $isValid;
            if ($isValid) {
                $model->save(false);
                $seo->query = 'product_id='.$model->id;
                $seo->save(false);
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'seo' => $seo,
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

        if (Yii::$app->user->identity->getRoleName()=='author' && $model->userCreated != getUser()->id) {
            throw new \yii\web\HttpException(403, "Bài này không phải do bạn tạo, bạn không thể sửa \n Hãy liên hệ admin");
        }
        $authAssis = new AuthAssignment();
        $perrmission = $authAssis->PermissionUser($model->userCreated);
        // Lấy quyền của usẻ đăng nhập
        $perrmission_login = $authAssis->PermissionUser(getUser()->id);

        if ($perrmission_login !='admin' && $model->userCreated != getUser()->id ) {
            $result = ['admin'=>'Quản trị viên','manager'=>'Biên tập viên','author'=>'Cộng tác viên'];
            throw new \yii\web\HttpException(403, "Bài này do $result[$perrmission] : ".$model->useradd->username." tạo, bạn chỉ có thể sửa bài của Cộng tác viên hoặc của chính bạn");
        }

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
        
        // if ($product_type_id) {
        //     $product_type_id = array_values(ArrayHelper::map($model_related_news,'idin','id_related'));
        // }

        // dbg($model_related_product_type_id);
        if($model->related_articles !=''){
            $model->related_articles = json_decode($model->related_articles);
        }
        if($model->related_products !=''){
            $model->related_products = json_decode($model->related_products);
        }
        // if($model->models_id !=''){
        //     $model->models_id = json_decode($model->models_id);
        // }

        $model->updated_at = time();
        $model->userUpdated = Yii::$app->user->id;

        
        // Kiem tra load ajax
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
            // Yii::$app->session->setFlash('messeage','aaaaaaaaaaa');
        }
        $proType = new ProductRelatedTypeInterdependent();
        $old_product_model_type = $proType->getProductTypeTrue($model->id);
        
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

            $post_product_type_id = $postP['Product']['product_type_id'];
            // $Xoavitri = array_diff($old_product_model_type,$post_product_type_id);
            // $themVitri = array_diff($post_product_type_id,$old_product_model_type);
            
            if($model->save()){
                /******** XỬ LÝ LOẠI SẢN PHẨM : START ********/

                    // $model_related_product_type_old;
            
                // dbg($old_product_model_type);
                // $product = new Product();

                // Lấy mảng Loaij san pham đã xóa đi
                if (!empty($old_product_model_type) || $post_product_type_id != '') {
                    
                    $productTypeDelete = array_diff($old_product_model_type,$post_product_type_id);
                    if (!empty($productTypeDelete)) {
                        $updateProType = $proType->getProductType($model->id,$productTypeDelete);
                        if (!empty($updateProType)) {
                            foreach ($updateProType as $productType) {
                            // Cập nhật lại kích hoạt vị trí
                                $productType->status = 0;
                                $productType->save();
                            }
                        }
                    }
                    // Lấy mảng các vị trí đã thêm mới
                    $AddProductType = array_diff($post_product_type_id,$old_product_model_type);

                    if (!empty($AddProductType)) {
                        $ProductTypeAll =$proType->getProductType($model->id,$AddProductType);
                        if ($ProductTypeAll) {
                            foreach ($ProductTypeAll as $position) {
                                // Cập nhật lại kích hoạt vị trí
                                $position->status = 1;
                                $position->save();
                            }
                        } else {
                            foreach ($AddProductType as $typePro) {
                                $protype = new ProductRelatedTypeInterdependent();
                                $protype->pro_id = $model->id;
                                $protype->product_type_id = $typePro;
                                $protype->status = true;
                                $protype->save();
                            }

                        }
                    }
                }

                /******** XỬ LÝ LOẠI SẢN PHẨM : END ********/
                // }
                // $seo->query = 'product_id='.$model->id;
                // $seo->save(false);
                return $this->redirect(['index']);
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

    //  private function createSlug($str) {

    //     $str = trim(mb_strtolower($str));
    //     $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    //     $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    //     $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    //     $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    //     $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    //     $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    //     $str = preg_replace('/(đ)/', 'd', $str);
    //     $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    //     $str = preg_replace('/([\s]+)/', '-', $str);
    //     return $str;

    // }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {        
        $seo = new SeoUrl();
        $model = $this->findModel($id);
        $idSeo = $seo->getSeoID($model->slug);
        if($idSeo){
            $this->findModelSeo($idSeo)->delete();
        }
            $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelSeo($id)
    {
        if (($model = SeoUrl::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

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
