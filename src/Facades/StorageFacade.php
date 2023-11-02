<?php

namespace Khoa\KhoaStorage\Facades;

use Illuminate\Support\Facades\Facade;

class StorageFacade extends Facade
{
    /**
     * Summary of getFacadeAccessor
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'storage_package';
    }
}
