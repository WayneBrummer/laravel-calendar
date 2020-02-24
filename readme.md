# Laravel Calendar APIer

.env settings

Via Composer:

```bash
composer require waynebrummer/laravel-calendar
```

Publish the `config` file and `migration` files:

```bash
php artisan vendor:publish --provider="Pace\Calendar\ServiceProvider"
```

Run the migration:

```bash
php artisan migrate
```

Where to start if you want to tap the event:

Begin by extending the event to your listner in `App\Providers\EventServiceProvider.php`.
Thats about it for hooking it up.

```php\
...
protected $listen = [
        CalendarEvent::class => [
            ...::class,
        ],
    ];
...

```You an also add it to collect on schedule with:

```php
php artisan calendar:collect
```
