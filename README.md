# PHP Mini MVC Skeleton

![PHP](https://img.shields.io/badge/PHP-8%2B-blue)
![Composer](https://img.shields.io/badge/Composer-required-brightgreen)
![License](https://img.shields.io/badge/License-MIT-green)

A small and clean PHP MVC skeleton using **Composer** and **PSR-4 autoloading**.  
Intended as a starting point for simple to medium PHP projects.

---

## Features

-   Basic MVC structure
-   PSR-4 autoloading via Composer
-   Front controller (`public/index.php`)
-   Simple router
-   Base PDO model
-   Easy to extend

---

## Requirements

-   PHP 8 or higher
-   Composer

---

## Quick Start

```bash
git clone https://github.com/yourname/php-mini-mvc.git
cd php-mini-mvc
composer install
composer dump-autoload
php -S localhost:8000 -t public
```

Open your browser at:

```bash
http://localhost:8000
```

## Usage

-   Entry point: `public/index.php`
-   Controllers: `app/Controllers`
-   Models: `app/Models`
-   Views: `app/Views`
-   Configuration: `config/app.php`

---

## Purpose

This project is meant to be **cloned and adapted**.  
It avoids heavy abstractions and full frameworks while keeping a clean structure.

---

## License

MIT
