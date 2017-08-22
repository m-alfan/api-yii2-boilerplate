<?php

namespace app\modules\versiSatu\controllers;

use app\components\Controller;
use Yii;

class GuestController extends Controller
{
    protected function verbs()
    {
        return [
            'index' => ['GET'],
        ];
    }

    /**
     * Menampilkan informasi mengenai api
     *
     * @return array
     */
    public function actionIndex()
    {
        $params = Yii::$app->params;
        return [
            'name' => $params['name'],
            'description' => $params['description'],
            'version' => $params['version'],
            'baseUrl' => $this->baseUrl(),
            'accessLogin' => [
                'url' => $this->baseUrl() . '/v1/login',
                'params' => ['username', 'password'],
            ],
        ];
    }
}
