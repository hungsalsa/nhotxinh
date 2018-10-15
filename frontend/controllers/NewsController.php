<?php

namespace frontend\controllers;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('view');
    }

    public function detail()
    {
    	echo 'sadasad';
    }

    public function actionView($slug)
    {
    	$request = \Yii::$app->request;
        $slug = $request->get('link','');
    	return $this->render('view');
    }

}
