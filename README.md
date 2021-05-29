# Arc-Admin Admin starter system

## About Repository

Arc-Admin is an Admin starter system based on Laravel 8. 
Backend system provide a complete management of admin CRUD, 
with full role and permission based authentication and authorization.

## Tech Specification

- Laravel 8
- jQuery 3
- Bootstrap 4
- Font Awesome 5
- Intervention Image
- iziToast
- sweetalert

## Features

- User Role and permission Management
- Role and permission based Authentication
- Role and permission based Authorization
- Show, update, edit, and delete user as admin
- Email activation and notifications
- page builder

## Installation

- `git clone https://github.com/SBTHDR/arcadmin.git`
- `cd arcadmin/`
- `cp .env.example .env`
- `composer install`
- Run `php artisan key:generate`
- Update `.env` and set your database credentials
- `php artisan migrate`
- `npm install`
- `npm run dev`
- `php artisan serve`

## License

[MIT license](https://opensource.org/licenses/MIT).
