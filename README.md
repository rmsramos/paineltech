# Filament Tenant - Painel Tech

A demo application to Painel Tech

## Installation

Clone the repo locally:

```sh
git clone https://github.com/rmsramos/paineltech.git && cd paineltech
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration and set database configs:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Run database migrations:

```sh
php artisan migrate --seed
```

You're ready to go! Visit the url in your browser, and login with:

`http://paineltech.test/admin`


-   **Username:** admin@admin.com
-   **Password:** password
