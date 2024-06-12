<?php

namespace domain\Facades\TypeFacade;
use domain\Services\TypeService\TypeService;

use Illuminate\Support\Facades\Facade;

class TypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
       return TypeService::class;
    }
}

?>
