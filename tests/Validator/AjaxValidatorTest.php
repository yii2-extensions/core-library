<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Tests\Validator;

use PHPUnit\Framework\TestCase;
use Yii;
use yii\base\ExitException;
use yii\base\Model;
use Yii\CoreLibrary\Tests\Support\Controller\StubController;
use Yii\CoreLibrary\Tests\Support\TestSupport;
use Yii\CoreLibrary\Validator\AjaxValidator;
use yii\web\Request;
use yii\web\Response;

/**
 * Trait for performing Ajax validation in controllers.
 */
final class AjaxValidatorTest extends TestCase
{
    use TestSupport;

    public function testPerformAjaxValidation()
    {
        $request = $this->createMock(Request::class);
        $request->expects($this->once())->method('getIsAjax')->willReturn(true);

        $response = $this->createMock(Response::class);

        $ajaxValidator = new AjaxValidator($request, $response);
        $stubController = new StubController('stub', Yii::$app, $ajaxValidator);

        $model = $this->createMock(Model::class);
        $model->expects($this->once())->method('load')->willReturn(true);
        $model->expects($this->once())->method('getErrors')->willReturn([]);

        $this->expectException(ExitException::class);

        $stubController->actionIndex($model);
    }
}
