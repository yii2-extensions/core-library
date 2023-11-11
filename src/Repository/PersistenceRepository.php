<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Repository;

use yii\db\ActiveRecord;
use yii\db\ActiveRecordInterface;

final class PersistenceRepository extends Repository implements PersistenceRepositoryInterface
{
    public function delete(ActiveRecordInterface $ar): bool
    {
        return $this->execute($ar->getDb(), static fn (): bool => $ar->delete() > 0);
    }

    public function deleteAll(ActiveRecordInterface $ar, array $condition): bool
    {
        return $this->execute($ar->getDb(), static fn (): bool => $ar->deleteAll($condition) > 0);
    }

    public function save(ActiveRecordInterface $ar, bool $runValidation = true, array $attributeNames = null): bool
    {
        return $this->execute($ar->getDb(), static fn (): bool => $ar->save($runValidation, $attributeNames));
    }

    public function update(ActiveRecordInterface $ar, bool $runValidation = true, array $attributeNames = null): bool
    {
        return $this->execute(
            $ar->getDb(),
            static fn (): bool => $ar->update($runValidation, $attributeNames) > 0,
        );
    }

    public function updateAtttributes(ActiveRecord $ar, array $attributes): bool
    {
        return $this->execute(
            $ar->getDb(),
            static fn (): bool => $ar->updateAttributes($attributes) > 0,
        );
    }
}
