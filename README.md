# CLIENT MANAGEMENT

* Feito com [Laravel 11.9](http://laravel.com) e [PHP 8.3](https://www.php.net)
* Encode: UTF-8
* Url aplicação: http://localhost:8000

## Laravel

Instalar pré-requisitos:

* [Composer 2.0^](https://getcomposer.org)

Copie o .env

```sh
$ cp .env.example .env
```

Baixe as dependências via composer:

```sh
$ composer install
```

## Migrations

Para criar o banco e as tabelas execute o comando abaixo:

```sh
$ php artisan migrate
```

## Filament

Para criar um usuário admin execute o comando:
```sh
$ php artisan make:filament-user
```

# Executando a aplicação

Ao final com todas as dependências instaladas e banco criado execute:
```sh
$ php artisan serve
```