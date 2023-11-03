# Les Mondes d'Ermina

**Les Mondes d'Ermina** is a blog for a writer with comments posted by authenticated user and submitted to validation, blog posts and categories.
The project is build with laravel and tailwindcss.

## Prerequisites

* PHP 8.1
* Composer
* Node and npm
* MariaDB or MySQL

## Installation

1. Clone the repo
```sh
git clone https://github.com/CelineFoucart/MondesdErminaBlog.git

```
2. Install the PHP dependencies
```sh
composer install
```

3. Install NPM packages
```bash
npm install
npm run build
```

4. Configure the database and run migrations
```bash
touch .env
php artisan migrate
```

4. Seed the database with data test and create an admin user
```bash
php artisan db:seed
```

The admin user for dev environment is:
* Email: avalia@example.com
* Password: password

## License

Distributed under the MIT License. See `LICENSE` for more information.
