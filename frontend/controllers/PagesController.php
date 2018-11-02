<?php

namespace frontend\controllers;

class PagesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
    	$request = \Yii::$app->request;
        $slug = $request->get('slug','');

        print_r($slug);
        return $this->render('index');
    }

}
