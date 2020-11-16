<?php
/**
 * Created by PhpStorm.
 * User: fanxinyu
 * Date: 2020-11-16
 * Time: 09:47
 */

namespace Daviswwang\LaravelOSS\Support;

use Daviswwang\LaravelOSS\Facades\Repository as OssContract;
use ArrayAccess;
use Daviswwang\LaravelOSS\LaravelOSS;

class Repository implements ArrayAccess, OssContract
{

    protected $instance;

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function createBucket($bucketName)
    {
        // TODO: Implement createBucket() method.
        return $this->instance->createBucket($bucketName);
    }

    public function getPrivateObjectURLWithExpireTime($bucketName, $ossKey, $expire_time)
    {
        // TODO: Implement getPrivateObjectURLWithExpireTime() method.
        return $this->instance->getPrivateObjectURLWithExpireTime($bucketName, $ossKey, $expire_time);
    }

    public function getPublicUrl($ossKey, $bucketName)
    {
        // TODO: Implement getPublicUrl() method.
        return $this->instance->getPublicUrl($ossKey, $bucketName);
    }

    public function moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey)
    {
        // TODO: Implement moveObject() method.
        return $this->instance->moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey);
    }

    public function publicUpload($fileName, $filePath, $options, $bucketName)
    {
        // TODO: Implement publicUpload() method.
        return $this->instance->publicUpload($fileName, $filePath, $options, $bucketName);
    }

    public function upload($fileName, $filePath, $options, $bucketName)
    {
        // TODO: Implement upload() method.
        return $this->instance->upload($fileName, $filePath, $options, $bucketName);
    }

    public function __construct(LaravelOSS $laravelOSS)
    {
        $this->instance = $laravelOSS;
    }
}