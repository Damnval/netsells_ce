# API Netsells Coding Exam.

This repository is a coding exam for netsells. This will show the skill level and general knowledge about PHP and APIs using the Laravel framework. The Project will be able to convert, get, and save numbers to romal numerals.

## Installation

Clone the repository 

```bash
git clone git@github.com:Damnval/netsells_ce.git
```

## Install dependencies

Go to project folder and run 

```bash
composer install
```

## Development Setup

Create an .env file

```bash
cp .env.example .env
```

Create a key for laravel project

```bash
php artisan key:generate
```

## Create DataBase 

Go to your sql and create a DB named 'netsells_ce'

## Setup DB credentials

DB_USERNAME={YOUR_DB_USERNAME}
DB_PASSWORD={YOUR_PASSWORD}

## Migrate database

```bash
php artisan migrate
```

## Serve project

```bash
php artisan serve
```

Go to browser and type http://localhost:8000/

## To Test project

```bash
php artisan test
```

### Coding Style

PSR-2||PSR-12 / SOLID / KISS
