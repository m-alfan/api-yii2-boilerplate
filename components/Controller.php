<?php

namespace app\components;

/**
 * Controller default yang digunakan extend dari \yii\rest\Controller
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
        return $behaviors;
    }
}
