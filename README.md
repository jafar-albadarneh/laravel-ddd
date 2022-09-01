# Domain-Driven in Actions

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jafar-albadarneh/laravel-ddd.svg?style=flat-square)](https://packagist.org/packages/jafar-albadarneh/laravel-ddd)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/jafar-albadarneh/laravel-ddd/run-tests?label=tests)](https://github.com/jafar-albadarneh/laravel-ddd/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/jafar-albadarneh/laravel-ddd/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/jafar-albadarneh/laravel-ddd/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jafar-albadarneh/laravel-ddd.svg?style=flat-square)](https://packagist.org/packages/jafar-albadarneh/laravel-ddd)

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
