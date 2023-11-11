<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Repository;

use yii\db\ActiveRecord;
use yii\db\ActiveRecordInterface;

/**
 * Pprovide methods to persist data.
 */
interface PersistenceRepositoryInterface
{
    /**
     * Delete a record from the data store.
     *
     * @param ActiveRecordInterface $ar The ActiveRecord model instance to be deleted.
     *
     * @return bool Whether the deletion was successful.
     */
    public function delete(ActiveRecordInterface $ar): bool;

    /**
     * Delete records based on a set of conditions.
     *
     * @param ActiveRecordInterface $ar The ActiveRecord model class.
     * @param array $condition The conditions to determine which records to delete.
     *
     * @return bool Whether the deletion was successful.
     */
    public function deleteAll(ActiveRecordInterface $ar, array $condition): bool;

    /**
     * Save a record to the data store.
     *
     * @param ActiveRecordInterface $ar The ActiveRecord model instance to be saved.
     *
     * @return bool Whether the save operation was successful.
     */
    public function save(ActiveRecordInterface $ar): bool;

    /**
     * Update records based on a set of conditions.
     *
     * @param ActiveRecordInterface $ar The ActiveRecord model class.
     * @param bool $runValidation Whether to perform validation before saving the record.
     * @param array|null $attributeNames List of attributes that need to be saved. Defaults to null,
     * meaning all attributes that are loaded from DB will be saved.
     *
     * @return bool Whether the update was successful.
     */
    public function update(ActiveRecordInterface $ar, bool $runValidation = true, array $attributeNames = null): bool;

    /**
     * Update records based on a set of conditions.
     *
     * @param ActiveRecord $ar The ActiveRecord model class.
     * @param array $attributes The attribute values (name-value pairs) to be saved.
     *
     * @return bool Whether the update was successful.
     */
    public function updateAtttributes(ActiveRecord $ar, array $attributes): bool;
}
