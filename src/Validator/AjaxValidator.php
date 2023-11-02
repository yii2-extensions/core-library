<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Validator;

use Yii;
use yii\base\ExitException;
use yii\base\Model;
use yii\web\Request;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Ajax validation in controllers.
 */
trait AjaxValidator
{
    /**
     * Perform Ajax validation for a given model.
     *
     * @param Model $model The model to be validated.
     *
     * @throws ExitException
     */
    protected function performAjaxValidation(Model $model): void
    {
        if (
            $this->request instanceof Request &&
            $this->response instanceof Response &&
            $this->request->getIsAjax() &&
            $model->load($this->request->post())
        ) {
            $this->response->format = Response::FORMAT_JSON;
            $this->response->data = ActiveForm::validate($model);
            $this->response->send();

            Yii::$app->end();
        }
    }
}
