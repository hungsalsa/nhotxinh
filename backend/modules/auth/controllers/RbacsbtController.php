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
class RbacsbtController extends Controller
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

        $setting_settingtabs_index = $auth->createPermission('setting/settingtabs/index');
        $setting_settingtabs_index->description = 'Danh sách Tabs Category';
        $auth->add($setting_settingtabs_index);

        $setting_settingtabs_create = $auth->createPermission('setting/settingtabs/create');
        $setting_settingtabs_create->description = 'Thêm mới Tabs Category';
        $auth->add($setting_settingtabs_create);

        $setting_settingtabs_view = $auth->createPermission('setting/settingtabs/view');
        $setting_settingtabs_view->description = 'Chi tiết Tabs Category';
        $auth->add($setting_settingtabs_view);

        $setting_settingtabs_update = $auth->createPermission('setting/settingtabs/update');
        $setting_settingtabs_update->description = 'Chỉnh sửa Tabs Category';
        $auth->add($setting_settingtabs_update);

        $setting_settingtabs_delete = $auth->createPermission('setting/settingtabs/delete');
        $setting_settingtabs_delete->description = 'Xóa Tabs Category';
        $auth->add($setting_settingtabs_delete);

        $setting_settingtabs_quickchange = $auth->createPermission('setting/settingtabs/quickchange');
        $setting_settingtabs_quickchange->description = 'Sửa nhanh Tabs Category';
        $auth->add($setting_settingtabs_quickchange);

        $setting_settingtabs_statuschange = $auth->createPermission('setting/settingtabs/statuschange');
        $setting_settingtabs_statuschange->description = 'Kích hoạt Tabs Category nhanh';
        $auth->add($setting_settingtabs_statuschange);

        $setting_settingtabs_lists = $auth->createPermission('setting/settingtabs/lists');
        $setting_settingtabs_lists->description = 'Chọn loại Tabs Category';
        $auth->add($setting_settingtabs_lists);


        $auth->addChild($manager, $setting_settingtabs_index);
        $auth->addChild($manager, $setting_settingtabs_create);
        $auth->addChild($manager, $setting_settingtabs_view);
        $auth->addChild($manager, $setting_settingtabs_update);
        $auth->addChild($manager, $setting_settingtabs_delete);
        $auth->addChild($manager, $setting_settingtabs_quickchange);
        $auth->addChild($manager, $setting_settingtabs_statuschange);
        $auth->addChild($manager, $setting_settingtabs_lists);
    }

}
