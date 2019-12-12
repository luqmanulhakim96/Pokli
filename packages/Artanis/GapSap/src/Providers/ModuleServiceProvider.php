<?php

namespace Artanis\GapSap\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Artanis\GapSap\Model\GoldSilverHistory::class,
    ];
}