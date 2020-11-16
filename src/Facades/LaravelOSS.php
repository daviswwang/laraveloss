<?php
/**
 * Created by PhpStorm.
 * User: fanxinyu
 * Date: 2020-11-16
 * Time: 09:46
 */

use Illuminate\Support\Facades\Facade;

class LaravelOSS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laraveloss';
    }
}