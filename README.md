# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds the distributable version of the framework,
including the user guide. It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).


## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

## Key Features

1. PHP Version 7.3.21
2. Codeigniter 4
3. Bulma (css)
4. Migrations
5. Seeders
6. Library [Faker](https://github.com/fzaninotto/Faker)
7. Entities
8. Files config custom
9. Callbacks models
10. Fontawesome (CDN)
11. Session php
12. Filters
13. Pagination
14. Library [hashids](https://github.com/vinkla/hashids)
15. Library [TinyMCE](https://cdnjs.com/libraries/tinymce) editor text (CDN)
16. View Cells CI4

## Installation

Once the project is downloaded, first change the name of the env file to `.env`

In `CI ENVIRONMENT` change from production to development and vice versa for when you do the deployment
```
CI_ENVIRONMENT = development
```
Write the global url that you will occupy for the whole project this in the file `.env` in:
```
app.baseUrl = 'your_url'
```
On `app/Config/Database.php` write your accesses and the name of the DB. This is important since here the name of the database is indicated where the migrations will run and the insertions will be made and others
```
/* Look for these variables and modify them to your needs */
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'nameYourDataBase',
```
Now run the migrations, in the command console, position yourself at the root of the project and run the command:
```
>php spark migrate
```
To download and install the packages configured in the composer.json file run `>composer install`

Since there are the tables created by the migrations, now it executes the main seeder when executing it, two more seeders will be executed, one for countries and another for groups
On your console run:
```
>php spark db:seed InitSeeder
```
Finally, this project has image uploads so these are stored for security in the `writable` folder, which is a folder without permissions for the end user. Then you must generate a `symbolic link` to make these images public
Open cmd as administrator and run the command:
```
/* Example */
>mklink /D C:\\xampp\htdocs\Blog_CI4-master\public\covers C:\\xampp\htdocs\Blog_CI4-master\writable\uploads\covers
```
This command does not matter if you run it inside the root folder. The important thing is to place the `absolute paths` of your project the `first` is the path where the symbolic link will be created and the `second` is the `source path`

This project was created using `xampp` and` windows 10`.

If you want update project, use the comand in your console `composer update` in root folder project
