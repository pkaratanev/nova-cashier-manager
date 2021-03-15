# Fork Notes

While the base repo is not having fixes merged i'm using this repo for my own purposes, fixes/changes will be implemented when I need them such as the ones already added by @bstump before me.

## Installation

```
 "repositories": [
    {
      "type": "git",
      "url": "https://github.com/pkaratanev/nova-cashier-manager"
    },
]
```

# Laravel Nova / Laravel Cashier

This package adds several components to your Laravel Nova Admin panel to help you with managing customer subscriptions, it works hand
in hand with [Laravel Cashier](https://github.com/laravel/cashier).

Looking to see high-level information about your application's Stripe balance and charges in a Nova dashboard? Check out [Nova Stripe Dashboard](https://github.com/tightenco/nova-stripe).


## How it works

This package adds a section in the billable resource details view with some information about the subscription:

<img src="https://github.com/pkaratanev/nova-cashier-tool/blob/master/resource-tool.jpg?raw=true">

If you want to display more details and be able to manage the subscription you may click the "Manage" link which will lead you
to a screen with full management capabilities.

<img src="https://github.com/pkaratanev/nova-cashier-tool/blob/master/billable-screen.jpg?raw=true">

Currently this package works only with laravel cashier for Stripe, Braintree is not supported yet.

## Installation and usage

You may require this package using composer:

```
composer require pkaratanev/nova-cashier-manager
```

Next up, you must register the tool with Nova in the tools method of the NovaServiceProvider:

```
// in app/Providers/NovaServiceProvder.php

// ...

public function tools()
{
   return [
        // ...
        new \pkaratanev\CashierTool\CashierTool(),
    ];
}
```

Now in your billable resource, let's say User, add the following to the `fields()` method:

```
CashierResourceTool::make()->onlyOnDetail()
```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.