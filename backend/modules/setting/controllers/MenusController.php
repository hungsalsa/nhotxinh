<?php

namespace backend\modules\setting\controllers;

use Yii;
use backend\modules\setting\models\Menus;
use backend\modules\setting\models\MenusSearch;
use backend\modules\quantri\models\Productcategory;
use backend\modules\quantri\models\Categories;
use backend\modules\quantri\models\Pages;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use  backend\modules\auth\models\AuthAssignment;
class MenusController extends Controller
{
    /**
     * @inheritdoc
     */
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
        $model = Menus::findOne($id);

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

        if ($model->status==0) {
            $model->status = 1;
            $postValue = 'Kích hoạt';
        } else {
            $model->status = 0;
            $postValue = ' Ẩn ';
        }
        $result = [
            'id' => $id,
            'value_post' => $model->status,
            'name' => $model->name,
            'field' => 'status',
            "postValue" => $postValue
        ];

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
        $model = Menus::findOne($id);


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
        $value_post = $post['value_post'];
        $model->$field = $value_post;
        

        $result = [
            'id' => $id,
            'value_post' => $value_post,
            'name' => $model->$field,
            'field' => $field,
        ];
        $result = array_merge($result,["postValue" => $value_post]);
        if ($field == 'parent_id') {
            $menu = new Menus();
            $dataMenus = $menu->getMenuParent();
            $dataMenus = array_merge([0=>' Root '],$dataMenus);
            // $value_post = $dataMenus[$value_post];
            $result = array_merge($result,["postValue" => $dataMenus[$model->$field]]);
        }
        // if ($field=='status'){
        //     if ($model->status==0) {
        //         $model->status=1;
        //         $value_post = 1;
        //         $postValue = "Active";
        //     } else {
        //         $model->status=0;
        //         $value_post = 0;
        //         $postValue = "Hidden";
        //     }
        // $result = array_merge($result,["postValue" => $postValue]);
        // }
// return json_encode($result);

        $model->updated_at = time();
        $model->userUpdated = getUser()->id;

        if($model->save()==true) {
            return json_encode($result);
        }else {
            $erros = $model->errors;
            $result = ["error" => $erros]+$result;
            // $result = ["error" => $erros];
            return json_encode($result);
        }
    }

    public function actionIndex()
    {
        $searchModel = new MenusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder = ['updated_at' => SORT_DESC,'order' => SORT_ASC,'created_at' => SORT_DESC];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menus model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // $menu = new Menus();
        //     $dataMenus = $menu->getMenuParent();
        //     $dataMenus = array_merge([0=>' Root '],$dataMenus);
        //     pr($dataMenus);
        //     dbg($dataMenus[5]);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Menus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menus();

        $dataMenus = $model->getMenuParent();
        $menuType = array(
            1 => 'Danh mục sản phẩm',
            2 => 'Danh mục bài viết',
            3 => 'Trang nội dung'
        );
        $dataLinkCat = array();

        $model->status = true;
        $model->created_at = time();
        $model->updated_at = time();
        $model->userCreated = Yii::$app->user->id;
        $model->userUpdated = Yii::$app->user->id;

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }
        if ($model->load($post = Yii::$app->request->post()) ) {
            if ($post['Menus']['parent_id'] == '') {
                $model->parent_id = 0;
            }
            if ($post['Menus']['order'] == '') {
                $model->order = 1;
            }
            // echo $model->parent_id;
            // echo '<pre>';print_r($post);die;
            if($model->save()){
                Yii::$app->session->setFlash('messeage', "Bạn đã thêm menu $model->name thành công !");
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'dataMenus' => $dataMenus,
            'menuType' => $menuType,
            'dataLinkCat' => $dataLinkCat,
        ]);
    }

    /**
     * Updates an existing Menus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $menu = new Menus();
        $dataMenus = $menu->getMenuParent();


        $menuType = [
            1 => 'Danh mục sản phẩm',
            2 => 'Danh mục bài viết',
            3 => 'Trang nội dung'
        ];


        if($model->type == 1){
            $catProduct = new Productcategory();
            $dataLinkCat = $catProduct->getCategoryParent();
            if(empty($dataLinkCat)){
                $dataLinkCat = array();
            }
        }else if($model->type == 2){
            $categories = new Categories();
            $dataLinkCat = $categories->getCategoryParent();
            if(empty($dataLinkCat)){
                $dataLinkCat = array();
            }
        }else {
            $page = new Pages();
            $dataLinkCat = $page->getPageAll();
            if(empty($dataLinkCat)){
                $dataLinkCat = array();
            }
        }

        
        // echo $dataLinkCat[$model->link_cate];
        // echo $model->type;
        // print_r($dataLinkCat);
        // echo $model->link_cate;die;
        $model->updated_at = time();
        $model->userUpdated = Yii::$app->user->id;

        if ($model->load($post = Yii::$app->request->post()) ) {
            if ($post['Menus']['parent_id'] =='') {
                $model->parent_id = 0;
            }
            if ($post['Menus']['order'] == '') {
                $model->order = 1;
            }
        // echo '<pre>';print_r($post);die;

            // if (!empty($post['Product']['models_id'])) {
            //     $models_ids = $post['Product']['models_id'];
            //     $model->models_id = json_encode($models_ids);
            // }
            if($model->save()){
                Yii::$app->session->setFlash('messeage', "Bạn đã sửa menu $model->name thành công !");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataMenus' => $dataMenus,
            'menuType' => $menuType,
            'dataLinkCat' => $dataLinkCat,
        ]);
    }

    /**
     * Deletes an existing Menus model.
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
     * Finds the Menus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menus::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLists($id)
    {
        $catProduct = new Productcategory();
        $dataCatPro = $catProduct->getCategoryParent();
        if(empty($dataCatPro)){
            $dataCatPro = array();
        }

        $categories = new Categories();
        $dataCatNew = $categories->getCategoryParent();
        if(empty($dataCatNew)){
            $dataCatNew = array();
        }

        $page = new Pages();
        $dataPage = $page->getPageAll();
        if(empty($dataPage)){
            $dataPage = array();
        }

        echo '<option value="">-- Select a ... --</option>';
        switch ($id) {
            case 1:{
                foreach ($dataCatPro as $key => $value) {
                    echo '<option value="'.$key.'">'.$value.'</option>';
                }
                break;
            }
            case 2:{
                foreach ($dataCatNew as $key => $value) {
                    echo '<option value="'.$key.'">'.$value.'</option>';
                }
            }
                
            
            default:{
                foreach ($dataPage as $key => $value) {
                    echo '<option value="'.$key.'">'.$value.'</option>';
                }
            }
        }
        
    }
}
