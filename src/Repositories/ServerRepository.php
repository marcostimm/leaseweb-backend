<?php

namespace Leaseweb\Repositories;

use Leaseweb\Models\Server;
use Leaseweb\Services\DataLoader\DataLoader;

class ServerRepository {

    protected $dataLoader;

    public function __construct(DataLoader $dataLoader)
    {
        $this->dataLoader = $dataLoader;
        $this->dataLoader->load();
    }

    public function get() : array
    {
        $data = $this->dataLoader->get();
        $arrObject = [];
        $id = 0;

        foreach($data as $line) {
            $server = new Server($id, $line[0], $line[1], $line[2], $line[3], $line[4]);
            $arrObject[] = $server;
            $id++;
        }

        return $arrObject;
    }
}