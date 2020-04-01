<?php

namespace app\controllers;

use app\models\LoginForm;
use Exception;
use Throwable;
use Yii;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends BaseController
{
    /**
     * @return array
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        unset($behaviors['authenticator']);

        return $behaviors;
    }

    /**
     * @return array
     * @throws Throwable
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->login() && $model->generateAccessToken()) {
            return $this->success(['access_token' => Yii::$app->user->getIdentity()->getAccessToken()]);
        }

        return $this->error($model->getErrors());
    }
}
