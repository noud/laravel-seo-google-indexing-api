<?php

namespace GoogleIndexing\Providers;

use Illuminate\Support\ServiceProvider;

class IndexingServiceProvider extends ServiceProvider
{
    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/google.php',
            'google.scopes'
        );
    }

    /**
     * Add the given configuration to the existing configuration.
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        // get the scopes
        $config = $this->app['config']->get($key, []);
        // add our scope to the existing scopes
        $this->app['config']->set($key, array_merge($config, require $path));
    }
}
