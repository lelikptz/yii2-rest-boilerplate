<?php

namespace app\controllers;

use app\models\User;

/**
 * Class UserController
 * @package app\controllers
 */
class UserController extends BaseController
{
    public $modelClass = User::class;
}
