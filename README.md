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

## Executando a aplicação

Para executar a aplicação temos 2 opções:

### Docker

* Necessário o docker & docker compose instalados

Para subir o container docker execute o seguinte comando:
```sh
$ ./vendor/bin/sail up -d
```
### Assistente artisan

Para rodar a aplicação usando o assistente do laravel use o seguinte comando:
```sh
$ php artisan serve
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

## Api

* [Documentação da api](https://documenter.getpostman.com/view/5447206/2sAY4skQJc)