<?php

namespace app\controllers;


use app\models\SupperSearch;
use Yii;
use yii\web\Controller;

class IndexController extends Controller
{
    public function actionTest(){
        $searchModel = new SupperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        $sign=Yii::$app->request->get('sign');
        return $this->render('index',
        [
            "dataProvider"=>$dataProvider,
            "searchModel"=>$searchModel,
            "sign"=>$sign,
        ]);
    }
}
