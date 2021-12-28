laravel OSS 扩展包
===============================
```
一款基于阿里云官方oss SDK 适用于laravel 5.x的上传扩展包
```
## Install via composer
```
composer require daviswwang/laraveloss
```
Run the following command to publish the package config file
```
php artisan vendor:public --provider="Daviswwang\LaravelOSS\LaravelServiceProvider"
```
You should now have a config/oss.php file that allows you to configure the basics of this package.

## Use it like this
```
use Daviswwang\LaravelOSS\Facades\LaravelOSS;

$url = LaravelOSS::upload('webGF.png', storage_path('pdf/webGF.png'), 'image/png')
```



