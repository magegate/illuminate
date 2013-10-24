<?php
/**
 * Created by magegate.
 * User: roland
 * Date: 08.10.13
 * Time: 21:07
 * To change this template use File | Settings | File Templates.
 */

namespace Magegate\Illuminate\Cache;

class MemcachedStore extends \Illuminate\Cache\MemcachedStore {

    public function __construct(\Magegate\Illuminate\Cache\Memcached $memcached, $prefix = '')
    {
        $this->memcached = $memcached;
        $this->prefix = strlen($prefix) > 0 ? $prefix.':' : '';
    }

}