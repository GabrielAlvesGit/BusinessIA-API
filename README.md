<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre

Objetivo: Desenvolver API RESTful robusta e escalável utilizando o framework Laravel e a linguagem PHP. 
A API será projetada para atender às necessidades do sistema BusinessIA, fornecendo endpoints eficientes para gerenciamento de dados, integração com outros sistemas e suporte a operações CRUD (Create, Read, Update, Delete).

Como roda o projeto:
```bash
    php artisan serve
```
<br>
Como criar Controller:
```bash
    php artisan make:controller --api
```
<br>
Como verificar rotas:
```bash
    php artisan route:list --path=api

    Para fazer a Rota Get, Post.. de uma única vez, use o comando:
    Route::apiResource('/users', UserController::class);
```
