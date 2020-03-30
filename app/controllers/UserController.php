<?php

namespace app\controllers;

use app\models\User;
use yii\data\ActiveDataProvider;

/**
 * Class UserController
 * @package app\controllers
 */
class UserController extends BaseController
{
    public $modelClass = User::class;

    /**
     * @return ActiveDataProvider
     */
    public function actionList()
    {
        return new ActiveDataProvider([
            'query' => User::find(),
        ]);
    }
}
