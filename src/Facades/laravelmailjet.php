<?php

namespace tyraelll\laravelmailjet\Facades;

use Illuminate\Support\Facades\Facade;

class laravelmailjet extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelmailjet';
    }
}
