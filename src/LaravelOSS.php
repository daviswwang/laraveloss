<?php
/**
 * Created by PhpStorm.
 * User: fanxinyu
 * Date: 2020-11-13
 * Time: 15:58
 */

namespace Daviswwang\LaravelOSS;

use JohnLui\AliyunOSS;
use DateTime;

class LaravelOSS
{
    protected $ossClient;

    protected $config = [];

    protected $bucketName;


    protected function getInstance()
    {
        $this->ossClient = AliyunOSS::boot(...$this->config);
    }

    public function setDefaultBucketName($bucketName)
    {
        $this->bucketName = $bucketName;
    }

    public function getDefaultBucketName()
    {
        return $this->bucketName;
    }

    public function publicUpload($fileName, $filePath, $options = '', $bucketName = '')
    {
        $options = $options ? ['ContentType' => "{$options}"] : [];

        if ($bucketName) $this->setDefaultBucketName($bucketName);

        return $this->ossClient->setBucket($this->bucketName)->uploadFile($fileName, $filePath, $options);
    }

    public function getPublicUrl($ossKey, $bucketName = '')
    {
        if ($bucketName) $this->setDefaultBucketName($bucketName);

        $url = $this->ossClient->setBucket($this->bucketName)->getPublicUrl($ossKey);

        return str_replace("http://", "https://", $url);
    }

    //上传文件并获取url contractsign
    public function upload($fileName, $filePath, $options = '', $bucketName = '')
    {
        if ($bucketName) $this->setDefaultBucketName($bucketName);

        $this->publicUpload($fileName, $filePath, $options, $this->bucketName);

        return $this->getPublicUrl($fileName, $this->bucketName);
    }

    public function createBucket($bucketName)
    {
        return $this->ossClient->createBucket($bucketName);
    }

    public function moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey)
    {
        return $this->ossClient->moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey);
    }

    // 获取私有文件的URL，并设定过期时间，如 \DateTime('+1 day')
    public function getPrivateObjectURLWithExpireTime($bucketName, $ossKey, DateTime $expire_time)
    {
        if ($bucketName) $this->setDefaultBucketName($bucketName);

        return $this->ossClient->setBucket($this->bucketName)->getUrl($ossKey, $expire_time);
    }


    public function __construct($config, $bucketName)
    {
        $this->setDefaultBucketName($bucketName);
        $this->config = $config;
        $this->getInstance();
    }


}