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
class RbacmnController extends Controller
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

        $setting_menus_index = $auth->createPermission('setting/menus/index');
        $setting_menus_index->description = 'Danh sách Menu';
        $auth->add($setting_menus_index);

        $setting_menus_create = $auth->createPermission('setting/menus/create');
        $setting_menus_create->description = 'Thêm mới Menu';
        $auth->add($setting_menus_create);

        $setting_menus_view = $auth->createPermission('setting/menus/view');
        $setting_menus_view->description = 'Chi tiết Menu';
        $auth->add($setting_menus_view);

        $setting_menus_update = $auth->createPermission('setting/menus/update');
        $setting_menus_update->description = 'Chỉnh sửa Menu';
        $auth->add($setting_menus_update);

        $setting_menus_delete = $auth->createPermission('setting/menus/delete');
        $setting_menus_delete->description = 'Xóa Menu';
        $auth->add($setting_menus_delete);

        $setting_menus_quickchange = $auth->createPermission('setting/menus/quickchange');
        $setting_menus_quickchange->description = 'Sửa nhanh Menu';
        $auth->add($setting_menus_quickchange);

        $setting_menus_statuschange = $auth->createPermission('setting/menus/statuschange');
        $setting_menus_statuschange->description = 'Kích hoạt Menu nhanh';
        $auth->add($setting_menus_statuschange);

        $setting_menus_lists = $auth->createPermission('setting/menus/lists');
        $setting_menus_lists->description = 'Chọn loại menu';
        $auth->add($setting_menus_lists);


        $auth->addChild($manager, $setting_menus_index);
        $auth->addChild($manager, $setting_menus_create);
        $auth->addChild($manager, $setting_menus_view);
        $auth->addChild($manager, $setting_menus_update);
        $auth->addChild($manager, $setting_menus_delete);
        $auth->addChild($manager, $setting_menus_quickchange);
        $auth->addChild($manager, $setting_menus_statuschange);
        $auth->addChild($manager, $setting_menus_lists);
    }

}
