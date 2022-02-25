<?php

namespace Laravelir\Toaster\Facades;

use Illuminate\Support\Facades\Facade;

class Toaster extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'toaster';
    }
}
