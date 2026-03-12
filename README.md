# HabitForge 🔥

HabitForge is a habit tracking web application built with Laravel that helps users build consistent habits through daily check-ins and streak tracking.

Users can create habits, track their daily progress, and monitor completion statistics through a simple dashboard.

## Features
### User Features

- User authentication (Register / Login)
- Create, update, and delete habits
- Daily habit check-ins
- Habit streak tracking
- Personal dashboard with habit statistics

### Admin Features

- Admin dashboard
- User management
- Platform statistics overview

## Tech Stack

- Backend: Laravel 12
- Language: PHP 8
- Database: MySQL
- Frontend: Blade + TailwindCSS

## Installation

### Follow these steps to run the project locally.

#### 1 Clone the Repository
git clone <repository-url>
cd habitforge
#### 2 Install Dependencies
composer install
#### 3 Setup Environment File
cp .env.example .env

Then configure your database credentials inside .env

Example:
- DB_DATABASE=habitforge
- DB_USERNAME=root
- DB_PASSWORD=

#### 4 Generate Application Key
php artisan key:generate
#### 5 Run Database Migration
php artisan migrate

If your project has seeders:

php artisan db:seed

Or

php artisan migrate --seed
#### 6 Start the Development Server
php artisan serve

The application will be available at:

http://127.0.0.1:8000
## Project Structure
app/
 ├── Models
 │   ├── Habit.php
 │   └── Checkin.php
 │   └── ...

 │
 ├── Http/Controllers
 │   ├── HabitController.php
 │   └── AdminController.php
 |   └── ...

database/
 ├── migrations
 └── seeders

resources/
 └── views

## Database Relationships

User → Habits (One to Many)
Habit → Checkins (One to Many)

Example:

User
 └── hasMany(Habit)

Habit
 ├── belongsTo(User)
 └── hasMany(Checkin)

## Future Improvements

- Habit reminder notifications
- Mobile-friendly UI improvements
- Advanced analytics for habit tracking
- Email reminders

### Author
Developed as part of an Intro to Web Development project using Laravel.
