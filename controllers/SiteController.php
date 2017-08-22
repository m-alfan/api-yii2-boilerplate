<?php

namespace app\controllers;

use yii\web\Response;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'only' => ['docs', 'index'],
                'formats' => [
                    'application/json' => Response::FORMAT_HTML,
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return "<h2 style='text-align: center;'>Welcome</h2>";
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionDocs()
    {
        return $this->render('docs');
    }

    public function actionResource()
    {
        $swagger = \Swagger\scan(['../config', '../models']);
        return $swagger;
    }
}
