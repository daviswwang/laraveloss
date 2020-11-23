<?php
/**
 * Created by PhpStorm.
 * User: fanxinyu
 * Date: 2020-11-16
 * Time: 09:30
 */

namespace Daviswwang\LaravelOSS\Facades;

interface Repository
{
    public function publicUpload($fileName, $filePath, $options, $bucketName);

    public function getPublicUrl($ossKey, $bucketName);

    public function upload($fileName, $filePath, $options, $bucketName);

    public function createBucket($bucketName);

    public function moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey);

    // 获取私有文件的URL，并设定过期时间，如 \DateTime('+1 day')
    public function getPrivateObjectURLWithExpireTime($bucketName, $ossKey, $expire_time);

}