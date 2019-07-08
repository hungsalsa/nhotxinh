<?php

namespace backend\modules\auth\controllers;

use Yii;
use common\modules\auth\models\AuthItem;
use common\modules\auth\models\AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacmdController extends Controller
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

        /*return [
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
        ];*/
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    // User assigment
    public function actionAssigment()
    {
        $auth = Yii::$app->authManager;
        
        $author = $auth->createRole('author');
        $admin = $auth->createRole('admin');


         // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }

    
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;

        $author = $auth->createRole('author');
        $admin = $auth->createRole('admin');
        $manager = $auth->createRole('manager');

        $models_index = $auth->createPermission('quantri/models/index');
        $models_index->description = 'Danh sách xe';
        $auth->add($models_index);

        $models_create = $auth->createPermission('quantri/models/create');
        $models_create->description = 'Thêm mới xe';
        $auth->add($models_create);

        $models_view = $auth->createPermission('quantri/models/view');
        $models_view->description = 'Chi tiết xe';
        $auth->add($models_view);

        $models_update = $auth->createPermission('quantri/models/update');
        $models_update->description = 'Chỉnh sửa xe';
        $auth->add($models_update);

        $models_delete = $auth->createPermission('quantri/models/delete');
        $models_delete->description = 'Xóa xe';
        $auth->add($models_delete);

        $models_quickchange = $auth->createPermission('quantri/models/quickchange');
        $models_quickchange->description = 'Sửa nhanh xe';
        $auth->add($models_quickchange);
        
        $models_statuschange = $auth->createPermission('quantri/models/statuschange');
        $models_statuschange->description = 'Kích hoạt nhanh xe';
        $auth->add($models_statuschange);


        $auth->addChild($author, $models_index);
        $auth->addChild($author, $models_create);
        $auth->addChild($author, $models_view);
        $auth->addChild($author, $models_update);
        $auth->addChild($manager, $models_delete);
        $auth->addChild($author, $models_quickchange);
        $auth->addChild($author, $models_statuschange);
    }

}
