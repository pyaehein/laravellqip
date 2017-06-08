# PyaeHein / Laravel LQIP

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

Laravel LQIP package, which includes:
- low quality image auto creating ;
- replace src with lazysize


## Install on Laravel 5.4

1) Run in your terminal:

``` bash
$ composer require pyaehein/laravellqip
```

2) Add the service providers in config/app.php:
``` php
PyaeHein\LQIP\LQIPServiceProvider::class,,
```

3) Then run a few commands in the terminal:
``` bash
$ php artisan vendor:publish
```

4) Add the script in your blade's head
```html
<script src="{{ asset('vendor/lqip/lazysizes/lazysizes.min.js')}}" async=""></script>
```
```html
<style>
	.blur-up {
		-webkit-filter: blur(25px);
		filter: blur(25px);
		transition: filter 400ms, -webkit-filter 400ms;
	}

	.blur-up.lazyloaded {
		-webkit-filter: blur(0);
		filter: blur(0);
	}
</style>
```

5) Apply your image like this
```html
<img {!! lqip('helloworld.jpg') !!} class="lazyload blur-up" >
```

6) Add storage disk at filesystems.php
```php
'lqip' => [
            'driver' => 'local',
            'root' => public_path('uploads/images')
        ],
```

7) Change your lqip config at config/lqip.php
```php
return [

    'path' => 'uploads/images',

    'disk' => 'lqip',

    'prefix' => '_lqip',

    'format' => 'jpg',

    'blur' => '99', // 0 to 100

    'quality' => '1' // 0 to 100

];
```

## Remember
Config file's 'path' is used for Image Library Intervension to auto create lqip image. Because, it doesn't support laravel's filesystem.
So, your lqip image can be create only in your public folder :(

## Note
I just make it for my project requirement. So, it can't be match like what u want.

## Credits

- [Pyae Hein][link-author]
- [All Contributors][link-contributors]

## License

Laravel LQIP is free for non-commercial use.

[ico-version]: https://img.shields.io/packagist/v/pyaehein/laravellqip.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pyaehein/laravellqip.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pyaehein/laravellqip
[link-downloads]: https://packagist.org/packages/pyaehein/laravellqip
[link-author]: https://github.com/pyaehein
[link-contributors]: ../../contributors