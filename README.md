# Prevent Destructive Commands

Prevent Destructive Commands is a Laravel package that disables certain destructive Artisan commands in production environments to protect your database and application data.

---

## Features
This package disables the following commands when the application is in the production environment:

- `php artisan migrate:fresh` - Drops all tables and re-runs migrations.
- `php artisan migrate:reset` - Rolls back all migrations.
- `php artisan migrate:rollback` - Rolls back a batch of migrations.
- `php artisan db:wipe` - Drops all databases.
In non-production environments, these commands will function as usual.

---

## Installation 
1. Install via Composer: 
`composer require MattYeend/prevent-destructive-commands`

--- 

## Compatibility

This package is compatible with Laravel 9, 10, and 11.

---

## Registration
### Laravel 9 and 10
For Laravel 9 and 10, the service provider is automatically registered via Laravel's package discovery. No additional steps are required.

### Laravel 11
Laravel 11 introduces stricter service provider registration. You need to manually register the service provider in the `config/app.php` file:
1. Open the `config/app.php` file.
2. Add the service provider to the providers array:
```bash
'providers' => [
    // Other Service Providers...

    MattYeend\PreventDestructiveCommands\PreventDestructiveCommandsServiceProvider::class,
],
```

---

## Usage

The package automatically disables destructive commands in the production environment. No additional setup is required.

---

### Running a Disabled Command in Production
If you attempt to run any of the disabled commands in a production environment, you’ll receive an error message like:
`This 'migrate:fresh' command is disabled in this environment for safety.`
In non-production environments (e.g., `local`, `staging`), the commands will execute normally.

---

### Environment Configuration
Ensure your `.env` file correctly specifies the application environment:
`APP_ENV=production`
The package determines the current environment using Laravel’s `app()->environment()` method.

---

## License
This package is licensed under the MIT License.

---

## Contributing
Feel free to fork the repository and submit pull requests for improvements or new features!
