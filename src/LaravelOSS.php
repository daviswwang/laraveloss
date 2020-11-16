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


    protected function getInstance()
    {
        $this->ossClient = AliyunOSS::boot(...$this->config);
    }


    public function publicUpload($fileName, $filePath, $options = '', $bucketName = 'contractsign')
    {
        $options = $options ? ['ContentType' => "{$options}"] : [];

        return $this->ossClient->setBucket($bucketName)->uploadFile($fileName, $filePath, $options);
    }

    public function getPublicUrl($ossKey, $bucketName = 'contractsign')
    {
        $url = $this->ossClient->setBucket($bucketName)->getPublicUrl($ossKey);

        return str_replace("http://", "https://", $url);
    }

    //上传文件并获取url
    public function upload($fileName, $filePath, $options = '', $bucketName = 'contractsign')
    {
        $this->publicUpload($fileName, $filePath, $options, $bucketName);

        return $this->getPublicUrl($fileName, $bucketName);
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
        return $this->ossClient->setBucket($bucketName)->getUrl($ossKey, $expire_time);
    }


    public function __construct()
    {
        $this->config = array_values(current(func_get_args()));
        $this->getInstance();
    }


}