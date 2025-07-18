# CRUD Management Application

This is a simple Laravel 12 application for managing authors and their books. It provides full CRUD (Create, Read, Update, Delete) functionality using SQLite as the database.

## ✅ Features

- Manage **Authors** (Add, View, Edit, Delete)
- Manage **Books** (Add, View, Edit, Delete)
- Books can be linked to Authors
- Clean UI using Blade templates and TailwindCSS (if applied)
- Uses **SQLite** for a lightweight database setup

## 📦 Requirements

Before setting up the project, ensure you have the following installed:

- PHP >= 8.1
- Composer
- SQLite (or any PDO-supported DB)
- Node.js & NPM (for compiling frontend assets, if needed)

## 🚀 Installation Steps

Follow these steps to get the application up and running:

1. **Extract the Project**

    - unzip CRUD-Management.zip
    - cd CRUD-Management

2. **I-install ang PHP dependencies**

    - composer install

3. **Setup Environment File**

    - cp .env.example .env
    - php artisan key:generate

4. **Configure the Database (SQLite)**

    1. Edit Connection
    2. Server type (SQLITE)
    3. DB_DATABASE=/path/to/your/project/database/database.sqlite

5. **Run Database Migrations**

    - php artisan migrate

6. **Serve the Application**

    - php artisan serve



**Authors**

<img width="1893" height="854" alt="image" src="https://github.com/user-attachments/assets/1cdfdc2f-cf34-4c77-bd0f-eae003e151e3" />


**Books**


<img width="1882" height="856" alt="image" src="https://github.com/user-attachments/assets/76bddfa5-5d8f-4ca1-8b42-eb4fdc3e0acd" />



