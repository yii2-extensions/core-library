<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Tests\Support\Controller;

use yii\base\Module;
use Yii\CoreLibrary\Validator\AjaxValidator;
use yii\web\Controller;

/**
 * Represents the stub controller.
 */
final class StubController extends Controller
{
    public function __construct(
        $id,
        Module $module,
        private readonly AjaxValidator $ajaxValidator,
        array $config = [],
    ) {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex($model): void
    {
        $this->ajaxValidator->validate($model);
    }
}
