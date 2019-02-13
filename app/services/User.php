<?php
/**
 * Created by PhpStorm.
 * User: ggkapanadze
 * Date: 2/13/19
 * Time: 9:54 PM
 */
namespace App\services;


class User
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}