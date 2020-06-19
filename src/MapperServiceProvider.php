<?php

namespace Mapper\Map;

use Illuminate\Support\ServiceProvider;

class MapperServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->app->bind(IMapper::class, Mapper::class);
    }
}
