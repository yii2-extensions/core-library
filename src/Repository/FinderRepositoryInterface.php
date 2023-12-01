<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Repository;

use yii\db\ActiveQueryInterface;
use yii\db\ActiveRecordInterface;

/**
 * Provide methods to find and retrieve data.
 */
interface FinderRepositoryInterface
{
    /**
     * Return a query object for further refinement or execution.
     *
     * @param ActiveRecordInterface $ar The ActiveRecord model class.
     *
     * @return ActiveQueryInterface A query object for further refinement or execution.
     */
    public function find(ActiveRecordInterface $ar): ActiveQueryInterface;

    /**
     * Find all records.
     *
     * @param ActiveRecordInterface $ar The ActiveRecord model class.
     *
     * @return array The found records.
     */
    public function findAll(ActiveRecordInterface $ar): array;

    /**
     * Find a record by its primary key.
     *
     * @param ActiveRecordInterface $ar The ActiveRecord model class.
     * @param int $id The primary key value.
     * @param string $key The name of the primary key attribute (default is 'id').
     *
     * @return ActiveRecordInterface|array|null The found record, or null if not found.
     */
    public function findById(ActiveRecordInterface $ar, int $id, string $key = 'id'): ActiveRecordInterface|array|null;

    /**
     * Find a single record by a specific condition.
     *
     * @param ActiveRecordInterface $ar The ActiveRecord model class.
     * @param array $condition The condition to search by.
     *
     * @return ActiveRecordInterface|array|null The found record, or null if not found.
     */
    public function findByOneCondition(ActiveRecordInterface $ar, array $condition): ActiveRecordInterface|array|null;

    /**
     * Find records that match a set of conditions.
     *
     * @param ActiveRecordInterface $ar The ActiveRecord model class.
     * @param array $condition The conditions to search by.
     *
     * @return ActiveQueryInterface A query object for further refinement or execution.
     */
    public function findByWhereCondition(ActiveRecordInterface $ar, array $condition): ActiveQueryInterface;
}
