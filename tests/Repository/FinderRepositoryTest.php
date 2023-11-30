<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Yii\CoreLibrary\Repository\FinderRepository;
use Yii\CoreLibrary\Tests\Support\ActiveRecord\Stub;
use Yii\CoreLibrary\Tests\Support\TestSupport;
use yii\db\ActiveRecordInterface;

final class FinderRepositoryTest extends TestCase
{
    use TestSupport;

    public function testFind(): void
    {
        $ar = new Stub();

        $ar->content = 'tests';

        $this->assertTrue($ar->save());

        $finderRepository = new FinderRepository();

        $result = $finderRepository->find($ar)->one();

        $this->assertInstanceOf(ActiveRecordInterface::class, $result);
        $this->assertSame(1, $result->id);
        $this->assertSame('tests', $result->content);
    }

    public function testFindAll(): void
    {
        $ar = new Stub();

        $ar->content = 'tests';

        $this->assertTrue($ar->save());

        $finderRepository = new FinderRepository();

        $result = $finderRepository->findAll($ar);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(ActiveRecordInterface::class, $result[0]);
        $this->assertSame(1, $result[0]->id);
        $this->assertSame('tests', $result[0]->content);
    }

    public function testFindById(): void
    {
        $ar = new Stub();

        $ar->content = 'tests';

        $this->assertTrue($ar->save());

        $finderRepository = new FinderRepository();

        /** @var Stub $result */
        $result = $finderRepository->findById($ar, 1);

        $this->assertInstanceOf(ActiveRecordInterface::class, $result);
        $this->assertSame(1, $result->id);
        $this->assertSame('tests', $result->content);
    }

    public function testFindByIdWithEmptyId(): void
    {
        $ar = new Stub();

        $ar->content = 'tests';

        $this->assertTrue($ar->save());

        $finderRepository = new FinderRepository();

        $result = $finderRepository->findById($ar, 0);

        $this->assertNull($result);
    }

    public function testFindByOneCondition(): void
    {
        $ar = new Stub();

        $ar->content = 'tests';

        $this->assertTrue($ar->save());

        $finderRepository = new FinderRepository();

        /** @var Stub $result */
        $result = $finderRepository->findByOneCondition($ar, ['id' => 1]);

        $this->assertInstanceOf(ActiveRecordInterface::class, $result);
        $this->assertSame(1, $result->id);
        $this->assertSame('tests', $result->content);
    }

    public function testFindByWhereCondition(): void
    {
        $ar = new Stub();

        $ar->content = 'tests';

        $this->assertTrue($ar->save());

        $finderRepository = new FinderRepository();

        $result = $finderRepository->findByWhereCondition($ar, ['id' => 1])->one();

        $this->assertInstanceOf(ActiveRecordInterface::class, $result);
        $this->assertSame(1, $result->id);
        $this->assertSame('tests', $result->content);
    }
}
