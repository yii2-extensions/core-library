<?php

declare(strict_types=1);

use Yii\CoreLibrary\Repository\FinderRepository;
use Yii\CoreLibrary\Repository\FinderRepositoryInterface;
use Yii\CoreLibrary\Repository\PersistenceRepository;
use Yii\CoreLibrary\Repository\PersistenceRepositoryInterface;

/**
 * @var array $params
 */
return [
    'container' => [
        'definitions' => [
            FinderRepositoryInterface::class => FinderRepository::class,
            PersistenceRepositoryInterface::class => PersistenceRepository::class,
        ],
    ],
];
