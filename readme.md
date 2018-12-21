## About

A simple PHP CRUD application in laravel which will allow users :

a. Create / Add new Data
b. Read /View or Retrieve existing Data
c. Update/edit existing Data
d. Delete existing Data

## Installation

# 1. Database Configuration
Open `.env` file & update your Databade.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-db-password

```

# 2. Create Tables
Run this migration to create tables in your database.

```
php artisan migrate

```

## ProductController

| **Methods** | **Description** |
| --- | --- |
| `index()` | Display a listing of products. |
| `create()` | Show the form for creating a new product. |
| `store()` | Store a newly created products in storage. |
| `show()` | Display the specified products. |
| `edit()` | Show the form for editing the specified products. |
| `update()` | Update the specified products in storage. |
| `destroy()` | Remove the specified product from storage. |


