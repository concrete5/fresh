<?php

namespace Concrete\Package\Fresh;

use Concrete\Core\Package\Package;
use PortlandLabs\Fresh\Console\CleanCommand;
use PortlandLabs\Fresh\Console\FreshCommand;
use PortlandLabs\Fresh\Console\SeedCommand;

class Controller extends Package
{

    protected $pkgHandle = 'fresh';

    public function getPackageName()
    {
        return t('Database Seeder / Cleaner');
    }

    public function getPackageDescription()
    {
        return t('Seed or sanitize a site with good clean data');
    }

    public function on_start()
    {
        if ($this->app->resolved('console')) {
            $this->app->make('console')->add($this->app->make(SeedCommand::class));
            $this->app->make('console')->add($this->app->make(CleanCommand::class));
        }
    }

}
