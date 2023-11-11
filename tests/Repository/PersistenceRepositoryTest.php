<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Yii\CoreLibrary\Repository\PersistenceRepository;
use Yii\CoreLibrary\Tests\Support\ActiveRecord\Stub;
use Yii\CoreLibrary\Tests\Support\TestSupport;

final class PersistenceRepositoryTest extends TestCase
{
    use TestSupport;

    public function testDelete(): void
    {
        $ar = new Stub();

        $ar->content = 'tests';

        $this->assertTrue($ar->save());

        $persistenceRepository = new PersistenceRepository();

        $this->assertTrue($persistenceRepository->delete($ar));
        $this->assertNull($ar->findOne(1));
    }

    public function testDeleteAll(): void
    {
        $ar = new Stub();

        $ar->content = 'tests';

        $this->assertTrue($ar->save());

        $persistenceRepository = new PersistenceRepository();

        $this->assertTrue($persistenceRepository->deleteAll($ar, ['id' => 1]));
        $this->assertNull($ar->findOne(1));
    }

    public function testSaveTransaction(): void
    {
        $ar = new Stub();

        $ar->content = 'test me';

        $persistenceRepository = new PersistenceRepository();

        $this->assertTrue($persistenceRepository->save($ar));
        $this->assertSame(1, $ar->id);
        $this->assertSame('test me', $ar->content);
    }

    public function testSaveTransactionRollback(): void
    {
        $ar = new Stub();
        $ar->content = null;

        $persistenceRepository = new PersistenceRepository();

        $this->assertFalse($persistenceRepository->save($ar));
        $this->assertNull($ar->id);
    }

    public function testUpdate(): void
    {
        $ar = new Stub();

        $ar->content = 'tests';

        $this->assertTrue($ar->save());

        $persistenceRepository = new PersistenceRepository();

        $ar->content = 'updated';

        $this->assertTrue($persistenceRepository->update($ar));
        $this->assertSame('updated', $ar->content);
    }

    public function testUpdateAttribute(): void
    {
        $ar = new Stub();

        $ar->content = 'tests';

        $this->assertTrue($ar->save());

        $persistenceRepository = new PersistenceRepository();

        $this->assertTrue($persistenceRepository->updateAtttributes($ar, ['content' => 'updated']));
        $this->assertSame('updated', $ar->content);
    }
}
