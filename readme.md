# Laravel Calendar APIer

.env settings

Via Composer:

```bash
composer require waynebrummer/laravel-calendar
```

Publish the `config` file:

```bash
php artisan vendor:publish --provider="Pace\Calendar\ServiceProvider"
```

Where to start if you want to tap the event:

Begin by extending the event to your listener in `App\Providers\EventServiceProvider.php`.
Thats about it for hooking it up.

## It will trigger an event from CalendarEvent

```You an also add it to collect on schedule with:

```php
php artisan collect:calendar
```
