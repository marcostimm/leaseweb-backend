<?php

namespace Leaseweb\Services;

use Leaseweb\Repositories\ServerRepository;


class ServerService
{
    protected $serverRepository;
    public function __construct(ServerRepository $serverRepository)
    {
        $this->serverRepository = $serverRepository;
    }

    public function list(array $query = [])
    {
        $servers = $this->serverRepository->get();

        // Filter by HDD
        if (isset($query['hdd']) && $query['hdd'] !== '') {
            $servers = array_filter($servers, function($server) use ($query) {
                return $server->isHardDiskOfType($query['hdd']);
            });
        }

        // Filter by RAM
        if (isset($query['ram']) && $query['ram'] !== '') {
            $ramList = explode(',', $query['ram']);
            $servers = array_filter($servers, function($server) use ($ramList) {
                return $server->isRamIn($ramList);
            });
        }

        // TODO: Implement the filter by location and storage range

        return $servers;
    }
}
