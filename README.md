# My company

## Description
This is an example project based on the Laravel framework, where some of the features it offers are used, then I present a list of the features used.
- Auth
- Resource controllers
- Validations with Form Request
- Migrations
- Seeders
- Events and Listeners
- Mail
- Blade templates
- Factories

## Requirements

This project is make in Laravel 6.x, then you must comply the [server requirements](https://laravel.com/docs/6.x#server-requirements) of this. Also you must install a Composer, npm and MySQL Ver 15.1.

## Demo
[Demo](http://app.my-company.tk)

## Install the project

Then the steps to start the project:
1. Clone this repo.
2. Enter the folder where you cloned the project.
3. Execute this command: `composer install`.
4. Create a datebase in MySQL.
5. Config the **.env ** file .
	- Create a .env file if not exists in the proyect root.
	- This is a example of .env file, change the data of your database.
```
APP_NAME=MyCompany
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=user_of_database
DB_PASSWORD=password_of_database
```
6. Execute these commands (in the project root): 
	- `php artisan key:generate`
	- `php artisan config:cache`
7. Now execute the migrations: `php artisan migrate`
8. Add mailgun settings in ***.env*** file:
    - At the end of the file paste this (Change data of MAILGUN_DOMAIN and MAILGUN_SECRET for your data): 
```
MAIL_DRIVER=mailgun
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls

MAILGUN_DOMAIN=your_mailgun_domain
MAILGUN_SECRET=your_password
```
9. Execute this command `php artisan config:cache`
10. Execute this command `composer dump-autoload`
11. Initialize seeder of the Admin User: `php artisan db:seed`
12. Execute this command `npm run dev`
13. Execute this command `php artisan storage:link`
14. Now you can serve the application with `php artisan serve`
15. That's it

## Factories

To provide test data, two factories were provided, one for employees and one for companies, to use them we will perform the following:

1. Enter the project root
2. Execute this command `php artisan tinker`, this open a php console
3. Now paste this `factory(App\Models\Company::class, NUMBER_RECORDS)->create();`. Change NUMBER_RECORDS by the number of records you want to generate. This code generates records for the companies table.
4. Wait for them to generate.
5. Now paste this `factory(App\Models\Employee::class, NUMBER_RECORDS)->create();`. Change NUMBER_RECORDS by the number of records you want to generate. This code generates records for the employees table.
6. Wait for them to generate.
7. You now have data to perform tests.

***Note: Perform these steps in order, since it is necessary to first generate the companies.***

