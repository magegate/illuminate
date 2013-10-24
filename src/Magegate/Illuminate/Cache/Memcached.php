<?php
/**
 * Created by magegate.
 * User: roland
 * Date: 08.10.13
 * Time: 20:53
 * To change this template use File | Settings | File Templates.
 */

namespace Magegate\Illuminate\Cache;

class Memcached {

    protected $resultcode;
    protected $memcache;

    function __construct()
    {
        $this->memcache = new \Memcache();
        $this->resultcode = 0;
    }

    public function addServer ( $host , $port , $weight = 0 )
    {
        return $this->memcache->addServer($host, $port, 1, $weight) ;
    }

    public function getVersion()
    {
        try {
            return $this->memcache->getVersion();
        }
        catch(ErrorException $e) {
            return FALSE;
        }
    }
    public function set ( $key , $value , $expiration = 0 )
    {
        return $this->memcache->set($key,$value,0,$expiration);
    }

    public function get ( $key )
    {
        $result = $this->memcache->get($key);
        $this->resultcode = ($result===FALSE)?1:0;
        return $result;
    }

    public function getResultCode()
    {
        return $this->resultcode;
    }

    public function increment ( $key , $offset = 1 , $initial_value = 0 , $expiry = 0 )
    {
        $this->memcache->increment($key,$offset);
    }

    public function decrement ( $key , $offset = 1 , $initial_value = 0 , $expiry = 0 )
    {
        $this->memcache->decrement($key,$offset);
    }

    public function delete ( $key , $time = 0 )
    {
        $this->memcache->delete($key,$time);
    }

    public function flush ( $delay = 0 )
    {
        $this->memcache->flush();
    }

    public function __call($method, $parameters)
    {
        return call_user_func_array(array($this->memcache, $method), $parameters);
    }
}