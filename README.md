# 🔗 URL Shortener System (Laravel)

A multi-role based URL shortener system built using Laravel with
authentication, role management, and company-based access control.

------------------------------------------------------------------------

# 🚀 Features

## 👤 Authentication

-   Laravel Breeze (Blade + Tailwind)
-   Login / Logout system

## 🏢 Company Management

-   SuperAdmin can create companies
-   Each company has a default Admin user

## 👥 Role System

-   SuperAdmin
-   Admin
-   Member

## 🔐 Role Permissions

### SuperAdmin

-   Create companies
-   Cannot create short URLs
-   Cannot see all URLs globally

### Admin

-   Manage users (Member,Admin)
-   Cannot create company
-   create URLs

### Member
-   create URLs
-   Cannot create users

------------------------------------------------------------------------

# 🔗 URL Shortener

-   Generate unique short codes
-   Public URL redirection supported

Example: http://localhost:8000/r/abc123

------------------------------------------------------------------------

# 🛠️ Tech Stack

-   Laravel 10+
-   PHP 8+
-   MySQL / SQLite
-   Tailwind CSS (via Breeze)

------------------------------------------------------------------------

# ⚙️ Installation Steps

## 1️⃣ Clone Repository

git clone https://github.com/brajendra200/sort-url.git
cd sort-url

## 2️⃣ Install Dependencies

composer install npm install npm run dev

## 3️⃣ Environment Setup

cp .env.example .env php artisan key:generate

## 4️⃣ Configure Database

Edit .env file:

DB_DATABASE=laravel_url_sorter DB_USERNAME=root DB_PASSWORD=

## 5️⃣ Run Migrations

php artisan migrate

## 6️⃣ Seed SuperAdmin

php artisan db:seed

## 7️⃣ Run Server

php artisan serve

App will run on: http://localhost:8000

------------------------------------------------------------------------

# 👤 Default Login

Email: superadmin@example.com Password: password

------------------------------------------------------------------------

# 🏢 Workflow

1.  SuperAdmin creates company
2.  Admin manages users
3.  Admin/Member create URLs

------------------------------------------------------------------------

# 🔗 Short URL Usage

http://localhost:8000/r/{short_code}

------------------------------------------------------------------------

# ⚠️ Important Notes

APP_URL=http://localhost:8000

Run: php artisan config:clear

------------------------------------------------------------------------

