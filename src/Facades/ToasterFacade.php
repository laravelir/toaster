<?php

namespace Laravelir\Toaster\Facades;

use Illuminate\Support\Facades\Facade;

class ToasterFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'toaster';
    }
}
