<?php
/**
 * Created by magegate.
 * User: roland
 * Date: 08.10.13
 * Time: 20:55
 * To change this template use File | Settings | File Templates.
 */

namespace Magegate\Illuminate\Cache;


use Memcached;

class MemcachedConnector extends \Illuminate\Cache\MemcachedConnector {

    protected function getMemcached()
    {
        if (class_exists('Memcached'))
        {
            return parent::getMemcached();
        }
        else
        {
            return new \Magegate\Illuminate\Cache\Memcached();
        }


    }

}