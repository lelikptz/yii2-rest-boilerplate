<?php

namespace app\controllers;

use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\Response;

/**
 * Class BaseController
 * @package app\controllers
 */
class BaseController extends ActiveController
{
    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }
}
