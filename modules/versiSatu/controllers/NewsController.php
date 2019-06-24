<?php

namespace app\modules\versiSatu\controllers;

use app\components\Controller;
use app\models\News;
use yii\web\NotFoundHttpException;
use app\models\search\NewsSearch;
use Yii;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $search['NewsSearch'] = Yii::$app->request->queryParams;
        $searchModel  = new NewsSearch();
        $dataProvider = $searchModel->search($search);

        return $this->apiCollection([
            'count'      => $dataProvider->count,
            'dataModels' => $dataProvider->models,
        ], $dataProvider->totalCount);
    }

    public function actionCreate()
    {
        $dataRequest['News'] = Yii::$app->request->getBodyParams();
        $model = new News();
        if($model->load($dataRequest) && $model->save()) {
            return $this->apiCreated($model);
        }

        return $this->apiValidate($model->errors);
    }

    public function actionUpdate($id)
    {
        $dataRequest['News'] = Yii::$app->request->getBodyParams();
        $model = $this->findModel($id);
        if($model->load($dataRequest) && $model->save()) {
            return $this->apiUpdated($model);
        }

        return $this->apiValidate($model->errors);
    }

    public function actionView($id)
    {
        return $this->apiItem($this->findModel($id));
    }

    public function actionDelete($id)
    {
        if($this->findModel($id)->delete()) {
            return $this->apiDeleted(true);
        }
        return $this->apiDeleted(false);
    }

    protected function findModel($id)
    {
        if(($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Resource not found');
        }
    }
}
