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
class RbacsbcController extends Controller
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
    
    
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;

        $author = $auth->createRole('author');
        $admin = $auth->createRole('admin');
        $manager = $auth->createRole('manager');

        $setting_settingcategories_index = $auth->createPermission('setting/settingcategories/index');
        $setting_settingcategories_index->description = 'Danh sách Sidebar categories';
        $auth->add($setting_settingcategories_index);

        $setting_settingcategories_create = $auth->createPermission('setting/settingcategories/create');
        $setting_settingcategories_create->description = 'Thêm mới Sidebar categories';
        $auth->add($setting_settingcategories_create);

        $setting_settingcategories_view = $auth->createPermission('setting/settingcategories/view');
        $setting_settingcategories_view->description = 'Chi tiết Sidebar categories';
        $auth->add($setting_settingcategories_view);

        $setting_settingcategories_update = $auth->createPermission('setting/settingcategories/update');
        $setting_settingcategories_update->description = 'Chỉnh sửa Sidebar categories';
        $auth->add($setting_settingcategories_update);

        $setting_settingcategories_delete = $auth->createPermission('setting/settingcategories/delete');
        $setting_settingcategories_delete->description = 'Xóa Sidebar categories';
        $auth->add($setting_settingcategories_delete);

        $setting_settingcategories_quickchange = $auth->createPermission('setting/settingcategories/quickchange');
        $setting_settingcategories_quickchange->description = 'Sửa nhanh Sidebar categories';
        $auth->add($setting_settingcategories_quickchange);

        $setting_settingcategories_statuschange = $auth->createPermission('setting/settingcategories/statuschange');
        $setting_settingcategories_statuschange->description = 'Kích hoạt nhanh Sidebar categories nhanh';
        $auth->add($setting_settingcategories_statuschange);

        $auth->addChild($manager, $setting_settingcategories_index);
        $auth->addChild($manager, $setting_settingcategories_create);
        $auth->addChild($manager, $setting_settingcategories_view);
        $auth->addChild($manager, $setting_settingcategories_update);
        $auth->addChild($manager, $setting_settingcategories_delete);
        $auth->addChild($manager, $setting_settingcategories_quickchange);
        $auth->addChild($manager, $setting_settingcategories_statuschange);
    }

}
