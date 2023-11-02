<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Tests\Support;

use Yii;
use Yii\CoreLibrary\Tests\Support\ActiveRecord\Stub;
use yii\db\ActiveRecordInterface;
use yii\db\Connection;
use yii\db\SchemaBuilderTrait;
use yii\web\Application;

trait TestSupport
{
    use SchemaBuilderTrait;

    public function getDb(): Connection
    {
        return Yii::$app->getDb();
    }

    public function setUp(): void
    {
        $this->mockWebApplication();
        $this->createTable();
    }

    private function createTable(): void
    {
        $db = $this->getDb();
        $command = $db->createCommand();

        if ($db->getTableSchema('stub') !== null) {
            $command->dropTable('stub');
        }

        $command->createTable(
            'stub',
            ['id' => $this->primaryKey(), 'content' => $this->string()->notNull()]
        )->execute();
    }

    private function mockWebApplication(): void
    {
        new Application(
            [
                'id' => 'testapp',
                'basePath' => dirname(__DIR__, 2),
                'vendorPath' => dirname(__DIR__, 2) . '/vendor',
                'components' => [
                    'db' => [
                        'class' => Connection::class,
                        'dsn' => 'sqlite::memory:',
                    ],
                    'request' => [
                        'cookieValidationKey' => 'wefJDF8sfdsfSDefwqdxj9oq',
                        'scriptFile' => __DIR__ . '/index.php',
                        'scriptUrl' => '/index.php',
                    ],
                ],
            ],
        );
    }
}
