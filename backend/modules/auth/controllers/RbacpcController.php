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
class RbacpcController extends Controller
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

    // Create Rule 
    public function actionCreate_rule()
    {
        $auth = Yii::$app->authManager;

        // add the rule
        $rule = new \common\modules\auth\rbac\AuthorRule;
        $auth->add($rule);

        // add the "updateOwnPost" permission and associate the rule with it.
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);

        $categories_update = $auth->createPermission('quantri/categories/update');
        // "updateOwnPost" will be used from "updatePost"
        $auth->addChild($updateOwnPost, $categories_update);

        $author = $auth->createPermission('author');
        // allow "author" to update their own posts
        $auth->addChild($author, $updateOwnPost);
    }

    // Create Role 
    public function actionCreate_role()
    {
        $auth = Yii::$app->authManager;
        // Author ->index/create/view
        // Admin ->{Author} and update/delete ->index/create/view

        $categories_index = $auth->createPermission('quantri/categories/index');
        $categories_create = $auth->createPermission('quantri/categories/create');
        $categories_view = $auth->createPermission('quantri/categories/view');

        $categories_update = $auth->createPermission('quantri/categories/update');
        $categories_delete = $auth->createPermission('quantri/categories/delete');

        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $categories_index);
        $auth->addChild($author, $categories_create);
        $auth->addChild($author, $categories_view);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $categories_update);
        $auth->addChild($admin, $categories_delete);
    }
    // Create Permission 
    
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;

        $author = $auth->createRole('author');
        $admin = $auth->createRole('admin');
        $manager = $auth->createRole('manager');

        /*$productcategory_index = $auth->createPermission('quantri/productcategory/index');
        $productcategory_index->description = 'Danh sách xe';
        $auth->add($productcategory_index);

        $productcategory_create = $auth->createPermission('quantri/productcategory/create');
        $productcategory_create->description = 'Thêm mới xe';
        $auth->add($productcategory_create);

        $productcategory_view = $auth->createPermission('quantri/productcategory/view');
        $productcategory_view->description = 'Chi tiết xe';
        $auth->add($productcategory_view);

        $productcategory_update = $auth->createPermission('quantri/productcategory/update');
        $productcategory_update->description = 'Chỉnh sửa xe';
        $auth->add($productcategory_update);

        $productcategory_delete = $auth->createPermission('quantri/productcategory/delete');
        $productcategory_delete->description = 'Xóa xe';
        $auth->add($productcategory_delete);

        $productcategory_quickchange = $auth->createPermission('quantri/productcategory/quickchange');
        $productcategory_quickchange->description = 'Sửa nhanh xe';
        $auth->add($productcategory_quickchange);
        */
        $productcategory_quickchange = $auth->createPermission('quantri/productcategory/statuschange');
        $productcategory_quickchange->description = 'Sửa nhanh xe';
        $auth->add($productcategory_quickchange);


        // $auth->addChild($author, $productcategory_index);
        // $auth->addChild($author, $productcategory_create);
        // $auth->addChild($author, $productcategory_view);
        // $auth->addChild($author, $productcategory_update);
        // $auth->addChild($manager, $productcategory_delete);
        // $auth->addChild($manager, $productcategory_quickchange);
        $auth->addChild($manager, $productcategory_quickchange);
    }

}
