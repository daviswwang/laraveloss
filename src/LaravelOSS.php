<?php
/**
 * Created by PhpStorm.
 * User: fanxinyu
 * Date: 2020-11-13
 * Time: 15:58
 */

namespace Daviswwang\LaravelOSS;

use JohnLui\AliyunOSS;

class LaravelOSS
{
    protected $ossClient;

    protected $config = [];


    protected function getInstance()
    {
        return $this->ossClient = AliyunOSS::boot(...$this->config);
    }


    public function publicUpload($fileName, $filePath, $options = '', $bucketName = 'ingym-pdf')
    {
        $options = $options ? ['ContentType' => "application/{$options}"] : [];
        return $this->ossClient->setBucket($bucketName)->uploadFile($fileName, $filePath, $options);
    }

    public function getPublicUrl($ossKey, $bucketName = 'ingym-pdf')
    {
        $url = $this->ossClient->setBucket($bucketName)->getPublicUrl($ossKey);

        return str_replace("http://", "https://", $url);
    }


    public function __construct()
    {
        $this->config = func_get_args();
    }


}