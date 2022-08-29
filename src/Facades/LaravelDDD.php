<?php

namespace Jafar\LaravelDDD\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jafar\LaravelDDD\LaravelDDD
 */
class LaravelDDD extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Jafar\LaravelDDD\LaravelDDD::class;
    }
}
