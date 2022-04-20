# eClinic BackOffice



## Installation

Use the package manager [composer](https://getcomposer.org/doc/00-intro.md) to install the library.
make sure you are already on the root project directory 


```bash
cp env.example .env
composer install [enter]
```

## Migration

Create database first with name `symptomate` and then :

```

# migrate DB
 php artisan migrate [enter]

# create dummy data 
 php artisan migrate:fresh --seed [enter]


```

## Run Application


```bash
php artisan serve [enter]
```

