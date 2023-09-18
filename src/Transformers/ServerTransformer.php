<?php

namespace Leaseweb\Transformers;

use Leaseweb\Models\Server;
use League\Fractal;

class ServerTransformer extends Fractal\TransformerAbstract
{
	public function transform(Server $server)
    {
        return [
            'id'        => (int) $server->id,
            'model'     => $server->model,
            'ram'       => $server->ram,
            'hdd'       => $server->hdd,
            'location'  => $server->location,
            'price'     => $server->price,
        ];
    }
}