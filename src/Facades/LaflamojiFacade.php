<?php declare(strict_types=1);

namespace Simtabi\Laflamoji\Facades;

use Illuminate\Support\Facades\Facade;
use Simtabi\Laflamoji\Laflamoji;

class LaflamojiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Laflamoji::class;
    }
}
