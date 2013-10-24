<?php
/**
 * Created by magegate.
 * User: roland
 * Date: 08.10.13
 * Time: 21:10
 * To change this template use File | Settings | File Templates.
 */

namespace Magegate\Illuminate\Cache;


use Illuminate\Cache\MemcachedStore;

class CacheManager extends \Illuminate\Cache\CacheManager {

    protected function createMemcachedDriver()
    {
        $servers = $this->app['config']['cache.memcached'];

        $memcached = $this->app['memcached.connector']->connect($servers);

        return $this->repository(new \Magegate\Illuminate\Cache\MemcachedStore($memcached, $this->getPrefix()));
    }

}