# HabitForge 🔥

HabitForge is a simple habit tracking web application built with Laravel.

Users can:
- Create habits
- Track daily check-ins
- Build streaks
- View habit completion statistics

Admins can:
- View system statistics
- Manage users

---

## Tech Stack

- Laravel 12
- PHP 8
- MySQL
- Blade
- TailwindCSS

---

## Features

User
- Authentication (Login/Register)
- Habit CRUD
- Daily check-ins
- Habit streak tracking
- Dashboard analytics

Admin
- Admin dashboard
- User management
- Platform statistics

---

## Installation

```bash
git clone repo
cd habitforge

composer install
cp .env.example .env

php artisan key:generate
php artisan migrate

php artisan serve