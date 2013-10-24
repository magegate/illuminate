<?php

require __DIR__ . '/../../../../bootstrap/autoload.php';

class IlluminateTest extends Illuminate\Foundation\Testing\TestCase {

    public static function createApplication()
    {
        $unitTesting = true;
        $testEnvironment = 'testing';
        return require __DIR__ . '/../../../../bootstrap/start.php';
    }

    public function testIlluminateCacheMemcached()
    {
        $key = md5(__METHOD__.md5_file(__FILE__)-microtime());
        $value = 'Hello, World!';

        Cache::driver('memcached')->put($key,$value,1);
        $result = Cache::driver('memcached')->get($key);

        $this->assertTrue(is_string($result),"Expected String result from memcached key {$key}");
        $this->assertTrue($result==$value,"Result '{$result}' differs from value '{$value}'");
    }
}
