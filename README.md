# Domain-Driven in Actions

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jafar-albadarneh/laravel-ddd.svg?style=flat-square)](https://packagist.org/packages/jafar-albadarneh/laravel-ddd)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/jafar-albadarneh/laravel-ddd/run-tests?label=tests)](https://github.com/jafar-albadarneh/laravel-ddd/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/jafar-albadarneh/laravel-ddd/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/jafar-albadarneh/laravel-ddd/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jafar-albadarneh/laravel-ddd.svg?style=flat-square)](https://packagist.org/packages/jafar-albadarneh/laravel-ddd)

[<img src="https://banners.beyondco.de/Laravel%20DDD.png?theme=dark&packageManager=composer+require&packageName=jafar-albadarneh%2Flaravel-ddd&pattern=brickWall&style=style_1&description=Domain-Driven-Design+in+Actions+for+Laravel+Monolith&md=1&showWatermark=0&fontSize=125px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg"/>](https://packagist.org/packages/jafar-albadarneh/laravel-ddd)


In a Domain-Driven environment, you would want to keep your code as clean and organized as possible.
This package allows to create a domain-driven architecture in your Laravel app.
The package assumes the following code structure:

```php
- app
    - Domains
        - [DomainA]
            - Actions
            - Events
            - Http
            - Listeners
            - Models
            - Services
```
By design, each domain should be treated in isolation, where all of the actions and services are scoped to the domain.

In regard to inter-domain communication, you can create a proxy service at the domain level to bridge the communication gap between the domains.
Internally you're free to either:
- Inject and class services directly
- Follow an internal pub/sub mechanism, where you publish events from (Domain X) and listen to them in other domains [Domain Y, Domain Z ..etc).

## Installation

You can install the package via composer:

```bash
composer require jafar-albadarneh/laravel-ddd
```

[//]: # (You can publish the config file with:)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --tag="laravel-ddd-config")

[//]: # (```)

[//]: # ()
[//]: # (This is the contents of the published config file:)

[//]: # ()
[//]: # (```php)

[//]: # (return [];)

[//]: # (```)

## Usage

The package is equipped with a command line tool that allows you to create a domain-driven architecture in your Laravel app.
These command line tools include:

### Generating the Domain
After you identify the domain, you can generate it by running the following command:

```bash
php artisan create:domain [domain-name]
```
The command accepts the following options:

- `[domain-name]`: The name of the domain you want to create.
- `--with-samples=1`: If you want to generate the domain with sample actions and services.


### Generating Domain Services
After creating the domain, you can generate the services by running the following command:

```bash
php artisan create:service domain=[domain-name]
```

The command accepts the following options:

- `domain=[domain-name]`: The name of the domain you want to generate the services for.
- `--name=[service-name]`: If you want to generate a service with a custom name.

### Generating Domain Actions
After creating the domain, you can generate the actions by running the following command:

```bash
php artisan create:action domain=[domain-name] --name=[action-name]
```

The command accepts the following options:

- `domain=[domain-name]`: The name of the domain you want to generate the actions for.
- `--name=[action-name]`: The name of action class within the domain.

### Generating Domain DTOs
After creating the domain, settle with your services, you can generate DTOs by running the following command:

```bash
php artisan create:dto domain=[domain-name] --name=[dto-name]
```

The command accepts the following options:

- `domain=[domain-name]`: The name of the domain you want to generate the DTO for.
- `--name=[dto-name]`: The name of DTO class within the domain.


### Generating Domain DTOs
After creating the domain, you can generate DTOs to support data streams among your services and actions by running the following command:

```bash
php artisan create:dto domain=[domain-name] --name=[dto-name]
```

The command accepts the following options:

- `domain=[domain-name]`: The name of the domain you want to generate the actions for.
- `--name=[action-name]`: The name of DTO class within the domain.

### Generating Native Laravel Resources
You won't be getting the full potential of the package if you can't associate native laravel resources (Controllers, Requests, Resources, Middlewares) with your domain.
There are two ways to achieve this:

1- Laravel artisan commands already support passing a namespace to any command. So instead of placing all the resources within the `App\Http` namespace, you can prefix your resource with the domain namespace.
For example, if you want to create a controller for the `Authentication` domain, you can run the following command:

```bash
php artisan make:controller App\\Domains\\Authentication\\Http\\Controllers\\LoginController
```

2- [TODO] The package overrides Laravel artisan commands to support passing a domain name to the command. So instead of passing the full namespace of the domain, you can pass a `--domain=[domain-name]` parameter to your command.
> Note: This feature is not yet implemented.


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [jafar-albadarneh](https://github.com/jafar-albadarneh)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
