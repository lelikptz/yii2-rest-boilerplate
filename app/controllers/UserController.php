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
     * @return array
     */
    public function actionList()
    {
        $users = (new ActiveDataProvider([
            'query' => User::find(),
        ]))->getModels();

        return $this->success($users);
    }
}
