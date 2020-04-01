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
    public $enableCsrfValidation = false;

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

    /**
     * @param array $data
     * @return array
     */
    public function success(array $data): array
    {
        return ['success' => true, 'data' => $data];
    }

    /**
     * @param array $data
     * @return array
     */
    public function error(array $data): array
    {
        return ['success' => false, 'data' => $data];
    }
}
