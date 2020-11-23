<?php
/**
 * Created by PhpStorm.
 * User: fanxinyu
 * Date: 2020-11-16
 * Time: 09:46
 */

namespace Daviswwang\LaravelOSS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class LaravelOSS
 * @method static bool upload(string $ability, array | mixed $arguments = [])
 * @package Daviswwang\LaravelOSS\Facades
 */
class LaravelOSS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laraveloss';
    }
}