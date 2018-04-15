<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\DirectoryNumberHotelsSearch;

class RoomsController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DirectoryNumberHotelsSearch();
        $dataProvider = $searchModel->searchRooms(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}