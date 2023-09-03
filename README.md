# :gift: Laravel Whatsapp Gateway


![GitHub License](https://img.shields.io/github/license/ishaarat/lara-ishaarat?style=for-the-badge)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/ishaarat/lara-ishaarat.svg?style=for-the-badge&logo=composer)](https://packagist.org/packages/ishaarat/lara-ishaarat)
[![Total Downloads](https://img.shields.io/packagist/dt/ishaarat/lara-ishaarat.svg?style=for-the-badge&logo=laravel)](https://packagist.org/packages/ishaarat/lara-ishaarat)

This is a Laravel Package for Ishaarat Gateway Integration. Now Sending Whatsapp messages is easy.

## :package: Install

Via Composer

```bash
$ composer require ishaarat/lara-ishaarat
```

If you are using Laravel 5.5 and higher, the service provider will be automatically registered.

For older versions, you have to add the service provider and alias to your `config/app.php`:

```php
'providers' => [
    ...
    Ishaarat\LaraIshaarat\Providers\IshaaratServiceProvider::class,
]

'alias' => [
    ...
    'Ishaarat' => Ishaarat\LaraIshaarat\Facades\WA::class,
]
```

## :zap: Configure

Publish the config file

```
php artisan vendor:publish --provider="Ishaarat\LaraIshaarat\Providers\IshaaratServiceProvider"
```

Then fill your auth key and app key you got from your [Ishaarat Account](https://ishaarat.com).

```php
// Eg. for SNS.
'auth_key' => env('ISHAARAT_AUTH_KEY', 'xxxxxx'),
'app_key' => env('ISHAARAT_APP_KEY', 'xxxx'),
```
or you can add these keys in your `.env` file
```dotenv
ISHAARAT_AUTH_KEY=xxxxxx
ISHAARAT_APP_KEY=xxxxx
```


## :fire: Usage

By using Facade method.

```php
# On the top of the file.
use Ishaarat\LaraIshaarat\Facades\WA;

////

# In your Controller.
WA::send("this message", function($waMsg) {
    $waMsg->to(['Number 1', 'Number 2']); # The numbers to send to.
});
# OR...
WA::send("this message")->to(['Number 1', 'Number 2'])->dispatch();

```

By using helper method
```php
ishaaratWA()->send("this message", function($waMsg) {
    $waMsg->to(['Number 1', 'Number 2']); # The numbers to send to.
});

ishaaratWA()->send("this message")->to(['Number 1', 'Number 2'])->dispatch();

```

## :heart_eyes: Channel Usage

First you have to create your notification using `php artisan make:notification` command. then `WAChannel::class` can
be used as channel like the below:

```php
namespace App\Notifications;

use Ishaarat\LaraIshaarat\Builder;
use Illuminate\Bus\Queueable;
use Ishaarat\LaraIshaarat\Channels\WAChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoicePaid extends Notification
{
    use Queueable;

    /**
     * Get the notification channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return [WAChannel::class];
    }

    /**
     * Get the repicients and body of the notification.
     *
     * @param  mixed  $notifiable
     * @return Builder
     */
    public function toWhatsapp($notifiable)
    {
        return (new Builder)
            ->send('this message')
            ->to('some number');
    }
}
```

> **Tip:** You can use the same Builder Instance in the send method.

```php
$builder = (new Builder)
    ->send('this message')
    ->to('some number');

WA::send($builder);

```
