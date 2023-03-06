# Currency Conversion


This is a Laravel application capable of storing freelancer accounts with essential user information and retrieving their rate converted into any currency unit.

## Installation

1. Create a local directory
2. initialize a git repository
3. Clone the remote repository
4. Go inside the folder
```bash
5. Run composer install
6. Copy .env.example as .env
7. Run php artisan key:generate
```
7. please note below configuration
```bash
APP_NAME=Laravel
DB_DATABASE=currency_converter
```
```bash
8. Run php artisan migrate
9. Run php artisan serve --port=<port>
```

## Notes
Key for APILayer API and driver configuration is set in .env and this is available in .env.sample as well.

Laravel Version - 9.52.4

PHP Version - 8.0.2
