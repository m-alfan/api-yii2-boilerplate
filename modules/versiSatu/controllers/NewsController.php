<?php

namespace app\modules\versiSatu\controllers;

use app\components\Controller;
use app\models\News;
use yii\web\NotFoundHttpException;
use Yii;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $news = News::find()
            ->orderBy('id')
            ->all();

        return $this->apiCollection($news);
    }

    public function actionCreate()
    {
        $dataRequest['News'] = Yii::$app->request->getBodyParams();
        $model = new News();
        throw new NotFoundHttpException('Resource not found');
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
