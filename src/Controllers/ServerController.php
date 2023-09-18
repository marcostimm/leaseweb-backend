<?php

namespace Leaseweb\Controllers;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Leaseweb\Services\ServerService;
use Leaseweb\Transformers\ServerTransformer;
use Psr\Http\Message\ServerRequestInterface;

class ServerController
{
    protected $request;
    protected $serverService;

    public function __construct(ServerService $serverService)
    {
        $this->serverService = $serverService;
    }

    public function list(array $query = [])
    {
        $servers = $this->serverService->list($query);

        $fractal = new Manager();
        $resource = new Collection($servers, new ServerTransformer());

        return $fractal->createData($resource)->toJson();
    }
}