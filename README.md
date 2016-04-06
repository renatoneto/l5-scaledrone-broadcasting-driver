# Laravel Broadcasting ScaleDrone Driver
Laravel Broadcasting ScaleDrone Driver for Laravel 5 and Lumen

## Usage

In config/broadcasting.php set the default driver to 'scaledrone' and add configuration options like this:

```php
'default' => 'scaledrone,
'connections' => [
	...
	'scaledrone' => [
        'driver'     => 'scaledrone',
        'channel_id' => env('SCALEDRONE_CHANNEL_ID'),
        'secret_key' => env('SCALEDRONE_SECRET_KEY')
    ],
    ...
]
```

### Laravel

In your config/app.php add the ScaleDrone Service Provider to your providers:

```php
'providers' => [
    ...
    RenatoNeto\LaravelScaleDrone\ScaleDroneBroadcastServiceProvider::class,
    ...
]
```

### Lumen

In your bootstrap/app.php register the ScaleDrone Service Provider:

```php
    ...
    $app->register(RenatoNeto\LaravelScaleDrone\ScaleDroneBroadcastLumenServiceProvider::class);
    ...
```