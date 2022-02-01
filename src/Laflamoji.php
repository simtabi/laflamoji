<?php

namespace Simtabi\Laflamoji;

use Simtabi\Laflamoji\Factories\FlagFactory;
use Simtabi\Laflamoji\Services\EmojiService;

class Laflamoji
{

    public function __construct()
    {
    }

   public function flag($name, $class = '', array $attributes = [])
   {
        return app(FlagFactory::class)->flag(strtoupper($name), $class, $attributes);
    }

   public function emoji($name)
   {
        // @todo
    }
}
