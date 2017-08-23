<?php

namespace app\components;

use Yii;
use yii\filters\auth\HttpBearerAuth;


/**
 * Controller yang digunakan di app extend dari \yii\rest\Controller
 *
 * @author Muhamad Alfan <muhamad.alfan01@gmail.com>
 * @since 1.0
 */
class Controller extends \yii\rest\Controller
{
    use TraitController;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
        ];
        return $behaviors;
    }

    /**
     * Api Validate error response
     */
    public function apiValidate($errors, $messege = false)
    {
        Yii::$app->response->statusCode = 422;
        return [
            'statusCode' => 422,
            'name' => 'ValidateErrorException',
            'message' => $messege ? $messege : 'Error validation',
            'errors' => $errors
        ];
    }

    /**
     * Api Created response
     */
    public function apiCreated($data, $messege = false)
    {
        Yii::$app->response->statusCode = 201;
        return [
            'statusCode' => 201,
            'message' => $messege ? $messege : 'Created successfully',
            'data' => $data
        ];
    }

    /**
     * Api Updated response
     */
    public function apiUpdated($data, $messege = false)
    {
        Yii::$app->response->statusCode = 202;
        return [
            'statusCode' => 202,
            'message' => $messege ? $messege : 'Updated successfully',
            'data' => $data
        ];
    }

    /**
     * Api Deleted response
     */
    public function apiDeleted($data, $messege = false)
    {
        Yii::$app->response->statusCode = 202;
        return [
            'statusCode' => 202,
            'message' => $messege ? $messege : 'Deleted successfully',
            'data' => $data
        ];
    }

    /**
     * Api Item response
     */
    public function apiItem($data, $messege = false)
    {
        Yii::$app->response->statusCode = 200;
        return [
            'statusCode' => 200,
            'message' => $messege ? $messege : 'Data retrieval successfully',
            'data' => $data
        ];
    }

    /**
     * Api Collection response
     */
    public function apiCollection($data, $total = 0, $messege = false)
    {
        Yii::$app->response->statusCode = 200;
        return [
            'statusCode' => 200,
            'message' => $messege ? $messege : 'Data retrieval successfully',
            'data' => $data,
            'total' => 0
        ];
    }

    /**
     * Api Success response
     */
    public function apiSuccess($messege = false)
    {
        Yii::$app->response->statusCode = 200;
        return [
            'statusCode' => 200,
            'message' => $messege ? $messege : 'Success',
        ];
    }
}
