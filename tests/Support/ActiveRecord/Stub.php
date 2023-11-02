<?php

declare(strict_types=1);

namespace Yii\CoreLibrary\Tests\Support\ActiveRecord;

use yii\db\ActiveRecord;

/**
 * Represents the data structure for the "stub" database table.
 *
 * @property int $id
 * @property string $content
 */
final class Stub extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%stub}}';
    }
}
