<?php

namespace domain\Facades\ProductFacade;

use domain\Services\ProductServices\ProductServices;
use Illuminate\Support\Facades\Facade;

class ProductFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
       return ProductServices::class;
    }
}

?>
