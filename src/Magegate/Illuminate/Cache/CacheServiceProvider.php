<?php
/**
 * Created by magegate.
 * User: roland
 * Date: 08.10.13
 * Time: 21:01
 * To change this template use File | Settings | File Templates.
 */

namespace Magegate\Illuminate\Cache;


use Illuminate\Cache\CacheManager;
use Illuminate\Cache\MemcachedConnector;

class CacheServiceProvider extends \Illuminate\Cache\CacheServiceProvider {

    public function register()
    {
        $this->app['cache'] = $this->app->share(function($app)
        {
            return new \Magegate\Illuminate\Cache\CacheManager($app);
        });

        $this->app['memcached.connector'] = $this->app->share(function()
        {
            return new \Magegate\Illuminate\Cache\MemcachedConnector;
        });

        $this->registerCommands();
    }

}