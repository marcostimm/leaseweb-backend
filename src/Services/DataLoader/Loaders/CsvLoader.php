<?php

namespace Leaseweb\Services\DataLoader\Loaders;

use Exception;
use Leaseweb\Services\DataLoader\Loaders\LoaderInterface;

class CsvLoader implements LoaderInterface
{
    protected $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function parse() : array
    {
        $rows = array_map( function($v) {
            return str_getcsv($v, ";");
        }, file($this->file));

        array_shift($rows);
        $csv    = [];
        foreach($rows as $row) {
            $csv[] = $row;
        }

        return $csv;
    }
}