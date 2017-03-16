<?php

namespace interactivesolutions\honeycombregions\app\providers;

use interactivesolutions\honeycombcore\providers\HCBaseServiceProvider;

class HCRegionsServiceProvider extends HCBaseServiceProvider
{
    /**
     * Register commands
     *
     * @var array
     */
    protected $commands = [];

    protected $namespace = 'interactivesolutions\honeycombregions\app\http\controllers';
}


