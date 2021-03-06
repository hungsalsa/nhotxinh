<?php

namespace backend\modules\quantri\controllers;

use Yii;
use backend\modules\quantri\models\Categories;
use backend\modules\quantri\models\Group;
use backend\modules\quantri\models\SeoUrl;
use backend\modules\quantri\models\CategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule,$action)
                        {
                            $module = Yii::$app->controller->module->id;
                            $action = Yii::$app->controller->action->id;
                            $controller = Yii::$app->controller->id;
                            $route = "$module/$controller/$action";
                            $post = Yii::$app->request->post();
                            if (\Yii::$app->user->can($route)) {
                                return true;
                            }
                        }
                    ],
                    // [
                    //     'allow' => true,
                    //     'actions' => ['logout'],
                    //     'roles' => ['@'],
                    // ],
                ],
            ],
        ];
    }

    /**
     * Lists all Categories models.
     * @return mixed
     */
    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
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
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();
        $seo = new SeoUrl();

        $group = new Group();
        $dataGroups = ArrayHelper::map($group->getAllGroups(),'id','groupsName');

        $datacat = $model->getCategoryParent();
        if (empty($datacat)) {
            $datacat=array();
        }

        $model->status=true;
        $model->created_at=time();
        $model->updated_at=time();
        $model->userAdd = Yii::$app->user->id;

        if ($model->load($post = Yii::$app->request->post()) ) {

            $model->link = $post['SeoUrl']['slug'];
            $seo->slug = $post['SeoUrl']['slug'];

            if ($post['Categories']['parent_id'] =='') {
                $model->parent_id = 0;
            }

            $isValid = $model->validate();
            $isValid = $seo->validate() && $isValid;
            if ($isValid) {
                $model->save(false);
                $seo->query = 'new_cate='.$model->id;
                $seo->save(false);
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'seo' => $seo,
            'dataGroups' => $dataGroups,
            'datacat' => $datacat,
        ]);
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $seo = new SeoUrl();
        $idSeo = $seo->getSeoID($model->link);
        if ($idSeo) {
            $seo = $this->findModelSeo($idSeo);
        } else {
            $seo->slug = '';
        }

        $group = new Group();
        $dataGroups = ArrayHelper::map($group->getAllGroups(),'id','groupsName');

         $datacat = $model->getCategoryParent();
        if (empty($datacat)) {
            $datacat=array();
        }

        $model->updated_at=time();

        if ($model->load($post = Yii::$app->request->post()) && $seo->load(Yii::$app->request->post())) {
            if ($post['Categories']['parent_id'] =='') {
                $model->parent_id = 0;
            }

            $model->link = $post['SeoUrl']['slug'];
            $seo->slug = $post['SeoUrl']['slug'];

            $isValid = $model->validate();
            $isValid = $seo->validate() && $isValid;
            if ($isValid) {
                $model->save(false);
                $seo->query = 'new_cate='.$model->id;
                $seo->save(false);
                return $this->redirect(['index']);
            }

            
        }

        return $this->render('update', [
            'model' => $model,
            'seo' => $seo,
            'dataGroups' => $dataGroups,
            'datacat' => $datacat,
        ]);
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $seo = new SeoUrl();
        $idSeo = $seo->getSeoID($model->link);
        if ($idSeo) {
            $this->findModelSeo($idSeo)->delete();
        } 
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function findUserModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelSeo($id)
    {
        if (($model = SeoUrl::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
