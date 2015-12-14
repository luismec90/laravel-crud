# Laravel 5 CRUD Generator
Laravel 5 CRUD Generator

### Requirements
    Laravel >=5.1
    PHP >= 5.5.9

## Installation

1. Run
    ```
    composer require montoya/laravel-crud
    ```

2. Add service provider to **/config/app.php** file.
    ```php
    'providers' => [
        ...

          Montoya\Crud\CrudServiceProvider::class,
    ],

    ```