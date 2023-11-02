<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Tests\Support\Controller;

use yii\base\Model;
use Yii\CoreLibrary\Validator\AjaxValidator;
use yii\web\Controller;

/**
 * Represents the stub controller.
 */
final class StubController extends Controller
{
    use AjaxValidator;

    public function actionIndex($model): void
    {
        $this->performAjaxValidation($model);
    }
}
