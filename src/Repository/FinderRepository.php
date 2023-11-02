<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Repository;

use yii\db\ActiveQueryInterface;
use yii\db\ActiveRecordInterface;

final class FinderRepository implements FinderRepositoryInterface
{
    public function findAll(ActiveRecordInterface $ar): array
    {
        return $ar->find()->all();
    }

    public function findById(ActiveRecordInterface $ar, int $id, string $key = 'id'): ActiveRecordInterface|array|null
    {
        return $this->findByOneCondition($ar, [$key => $id]);
    }

    public function findByOneCondition(ActiveRecordInterface $ar, array $condition): ActiveRecordInterface|array|null
    {
        return $ar->findOne($condition);
    }

    public function findByWhereCondition(ActiveRecordInterface $ar, array $condition): ActiveQueryInterface
    {
        return $ar->find()->where($condition);
    }
}
