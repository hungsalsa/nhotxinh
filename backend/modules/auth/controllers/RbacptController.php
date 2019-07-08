<?php

namespace backend\modules\auth\controllers;

use Yii;
// use common\modules\auth\producttype\AuthItem;
// use common\modules\auth\producttype\AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacptController extends Controller
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
     * Lists all AuthItem producttype.
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

        $producttype_index = $auth->createPermission('quantri/producttype/index');
        $producttype_index->description = 'Danh sách loại sản phẩm';
        $auth->add($producttype_index);

        $producttype_create = $auth->createPermission('quantri/producttype/create');
        $producttype_create->description = 'Thêm mới loại sản phẩm';
        $auth->add($producttype_create);

        $producttype_view = $auth->createPermission('quantri/producttype/view');
        $producttype_view->description = 'Chi tiết loại sản phẩm';
        $auth->add($producttype_view);

        $producttype_update = $auth->createPermission('quantri/producttype/update');
        $producttype_update->description = 'Chỉnh sửa loại sản phẩm';
        $auth->add($producttype_update);

        $producttype_delete = $auth->createPermission('quantri/producttype/delete');
        $producttype_delete->description = 'Xóa loại sản phẩm';
        $auth->add($producttype_delete);

        $producttype_quickchange = $auth->createPermission('quantri/producttype/quickchange');
        $producttype_quickchange->description = 'Sửa nhanh loại sản phẩm';
        $auth->add($producttype_quickchange);
        
        $producttype_statuschange = $auth->createPermission('quantri/producttype/statuschange');
        $producttype_statuschange->description = 'Kích hoạt nhanh loại sản phẩm';
        $auth->add($producttype_statuschange);

        $producttype_validation = $auth->createPermission('quantri/producttype/validation');
        $producttype_validation->description = 'Validate sản phẩm';
        $auth->add($producttype_validation);


        $auth->addChild($author, $producttype_index);
        $auth->addChild($author, $producttype_create);
        $auth->addChild($author, $producttype_view);
        $auth->addChild($author, $producttype_update);
        $auth->addChild($manager, $producttype_delete);
        $auth->addChild($author, $producttype_quickchange);
        $auth->addChild($author, $producttype_statuschange);
        $auth->addChild($author, $producttype_validation);
    }

}
