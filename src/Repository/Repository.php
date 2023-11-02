<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Repository;

use Closure;
use Yii;
use yii\db\Connection;
use yii\db\Exception;

/**
 * Represents a base class for repositories providing common operations.
 */
abstract class Repository
{
    /**
     * Execute a database operation within a transaction.
     *
     * @param Connection $db The database connection to use.
     * @param Closure $operation The operation to perform within the transaction.
     *
     * @return bool Whether the operation was successful.
     */
    protected function execute(Connection $db, Closure $operation): bool
    {
        $transaction = $db->beginTransaction();

        try {
            /** @var bool $result */
            $result = $operation();
            $transaction->commit();

            return $result;
        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::error($e->getMessage(), __METHOD__);
        }

        return false;
    }
}
