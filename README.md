### Mini CRM ⚙️

This is a MiniCRM for managing companies and employees.

<img width="400" src="https://raw.githubusercontent.com/adamcurzon/tritility-mini-crm/main/preview/Screenshot%202023-11-08%20at%2015.39.33.png" />

[Preview Images](123) 🎇

## Setup

1. Add you DB credentials to `.env`

2. Run these commands

```bash
composer install
php artisan migrate
php artisan db:seed
php artisan serve
composer exec phpunit
```

3. Visit http://127.0.0.1:8000/

4. Login with these credentiuals

    Email: `admin@admin.com`

    Password: `password`
