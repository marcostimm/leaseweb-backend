<?php

namespace Leaseweb\Models;

use Leaseweb\Models\Model;

/**
 * @Entity @Table(name="servers")
 */
class Server extends Model
{
    public function __construct(int $id, string $model, string $ram, string $hdd, string $location, string $price)
    {
        $this->id       = $id;
        $this->model    = $model;
        $this->ram      = $ram;
        $this->hdd      = $hdd;
        $this->location = $location;
        $this->price    = $price;
    }

    /**
     * @id 
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @model
     * @Column(type="string")
     */
    protected $model;

    /**
     * @model
     * @Column(type="string")
     */
    protected $ram;

    /**
     * @hdd
     * @Column(type="string")
     */
    protected $hdd;

    /**
     * @location
     * @Column(type="string")
     */
    protected $location;

    /**
     * @price
     * @Column(type="string")
     */
    protected $price;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name) 
    {
        return $this->$name;
    }

    public function isHardDiskOfType($type) : bool
    {
        return str_contains(strtolower($this->hdd), strtolower($type));
    }

    public function isRamIn($ramList) : bool
    {
        $ram = explode('GB', $this->ram);
        return in_array($ram[0], $ramList);
    }
}