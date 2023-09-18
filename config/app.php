<?php

use Laminas\Diactoros\ServerRequestFactory;
use Leaseweb\Repositories\ServerRepository;
use Leaseweb\Services\DataLoader\Loaders\CsvLoader;
use Leaseweb\Services\DataLoader\DataLoader;
use Leaseweb\Services\DataLoader\Loaders\LoaderInterface;
use Leaseweb\Services\ServerService;
use Psr\Http\Message\ServerRequestInterface;
use function DI\create;

return [
    'name' => env('APP_NAME'),
    'debug' => env('APP_DEBUG', false),

    'services' => [
        ServerRequestInterface::class   => ServerRequestFactory::fromGlobals(),
        LoaderInterface::class          => \DI\autowire(CsvLoader::class)->constructor(base_path('data/servers.csv')),
        DataLoader::class               => create(DataLoader::class)->constructor(DI\get(LoaderInterface::class)),
        ServerRepository::class         => create(ServerRepository::class)->constructor(DI\get(DataLoader::class)),
        ServerService::class            => create(ServerService::class)->constructor(DI\get(ServerRepository::class)),
    ],
];