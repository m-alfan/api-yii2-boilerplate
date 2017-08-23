<?php

namespace app\modules\versiSatu\controllers;

use app\components\Controller;
use Yii;

class AuthController extends Controller
{
    public function actionMe()
    {
        return [
            'test' => 'Test Berhasil'
        ];
    }
}
