<?php

namespace app\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;

/**
 * Class BaseController
 * @package app\controllers
 */
class BaseController extends Controller
{
    /** @var bool */
    public $enableCsrfValidation = true;

    /**
     * @return array
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        $behaviors['authenticator'] = ['class' => HttpBearerAuth::class];

        return $behaviors;
    }
}
