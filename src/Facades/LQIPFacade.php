<?php

namespace PyaeHein\LQIP\Facades;

use Illuminate\Support\Facades\Facade;

class LQIPFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LQIP';
    }
}