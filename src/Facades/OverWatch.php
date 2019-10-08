<?php

namespace Tallmancode\OverWatch\Facades;

use Illuminate\Support\Facades\Facade;

class OverWatch extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'overwatch';
    }
}
