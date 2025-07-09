<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

## 📖 About This Project

Chawkbazar is a Laravel application using [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) — a simple, minimal authentication starter kit for Laravel, featuring Blade templates and Tailwind CSS.

---

## 🚀 Installation Guide

Follow the steps below to set up the project locally:

### 1. Clone the Repository

```bash
git clone https://github.com/fahadali297t/digimart_ecommerce.git
cd your-project
```

### 2. Run required Commands

```bash
composer install
npm install
php artisan key:generate
```

### 3. Set Up Environment File

```bash
copy .env.example and paste it as .env
Configure mysql database Credientials according to yours.

Also the Test keys for stripe also given.
```

### 4. Install Breeze

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

### 5. Seed The Database

```bash
php artisan db:seed
```

### 6. Run the Development Server

```bash
php artisan serve
```

### Importamnt Note

```bash
1. Configure Your Stripe public and secret Key in .env
2. Configure Mail Details in .env
3. Always use ( php artisan queue:work ) for sending emails

```

### Admin Login Credientials

```
Admin : test@gmail.com
```
