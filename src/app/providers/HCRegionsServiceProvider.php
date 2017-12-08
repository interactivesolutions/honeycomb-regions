<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\app\providers;


use InteractiveSolutions\HoneycombCore\Providers\HCBaseServiceProvider;
use interactivesolutions\honeycombregions\app\Repositories\HCCityRepository;

/**
 * Class HCRegionsServiceProvider
 * @package interactivesolutions\honeycombregions\app\providers
 */
class HCRegionsServiceProvider extends HCBaseServiceProvider
{
    /**
     * @var string
     */
    protected $homeDirectory = __DIR__;

    /**
     * @var array
     */
    protected $commands = [];

    /**
     * @var string
     */
    protected $namespace = 'interactivesolutions\honeycombregions\app\http\controllers';

    /**
     * @var string
     */
    public $serviceProviderNameSpace = 'HCRegions';

    /**
     *
     */
    public function register()
    {
        $this->registerRepositories();

        parent::register();
    }

    /**
     *
     */
    private function registerRepositories(): void
    {
        $this->app->singleton(HCCityRepository::class);
    }

}


