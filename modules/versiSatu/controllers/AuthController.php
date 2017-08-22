<?php

namespace app\modules\versiSatu\controllers;

use app\components\Controller;
use Yii;

class AuthController extends Controller
{
    public function actionMe()
    {
        $params = Yii::$app->params;
        return [
            'name' => $params['name'],
            'description' => $params['description'],
            'version' => $params['version'],
            'baseUrl' => $this->baseUrl()
        ];
    }
}
