<?php declare(strict_types=1);

use Laminas\Diactoros\ServerRequestFactory;
use Leaseweb\Services\ServerService;
use Psr\Http\Message\ServerRequestInterface;
use function DI\create;

$config = require base_path('/config/app.php');

return $config['services'];