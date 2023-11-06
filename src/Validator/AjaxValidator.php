<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Validator;

use yii\base\ExitException;
use yii\base\Model;
use yii\web\Application;
use yii\web\Request;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Ajax validation services.
 */
final class AjaxValidator
{
    public function __construct(
        private readonly Application $app,
        private readonly Request $request,
        private readonly Response $response
    ) {
    }

    /**
     * Perform Ajax validation for a given model.
     *
     * @param Model $model The model to be validated.
     *
     * @throws ExitException
     */
    public function validate(Model $model): void
    {
        if ($this->request->getIsAjax() && $model->load($this->request->post())) {
            $this->response->format = Response::FORMAT_JSON;
            $this->response->data = ActiveForm::validate($model);
            $this->response->send();

            $this->app->end();
        }
    }
}
