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
class RbacmnfController extends Controller
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

        $manufactures_index = $auth->createPermission('quantri/manufactures/index');
        $manufactures_index->description = 'Danh sách xe';
        $auth->add($manufactures_index);

        $manufactures_create = $auth->createPermission('quantri/manufactures/create');
        $manufactures_create->description = 'Thêm mới xe';
        $auth->add($manufactures_create);

        $manufactures_view = $auth->createPermission('quantri/manufactures/view');
        $manufactures_view->description = 'Chi tiết xe';
        $auth->add($manufactures_view);

        $manufactures_update = $auth->createPermission('quantri/manufactures/update');
        $manufactures_update->description = 'Chỉnh sửa xe';
        $auth->add($manufactures_update);

        $manufactures_delete = $auth->createPermission('quantri/manufactures/delete');
        $manufactures_delete->description = 'Xóa xe';
        $auth->add($manufactures_delete);

        $manufactures_quickchange = $auth->createPermission('quantri/manufactures/quickchange');
        $manufactures_quickchange->description = 'Sửa nhanh xe';
        $auth->add($manufactures_quickchange);
        
        $manufactures_statuschange = $auth->createPermission('quantri/manufactures/statuschange');
        $manufactures_statuschange->description = 'Sửa nhanh xe';
        $auth->add($manufactures_statuschange);


        $auth->addChild($author, $manufactures_index);
        $auth->addChild($author, $manufactures_create);
        $auth->addChild($author, $manufactures_view);
        $auth->addChild($author, $manufactures_update);
        $auth->addChild($manager, $manufactures_delete);
        $auth->addChild($author, $manufactures_quickchange);
        $auth->addChild($author, $manufactures_statuschange);
    }

}
