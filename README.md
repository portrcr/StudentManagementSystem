# Student Management System

A lightweight CRUD web application built with PHP, PDO, and MySQL for managing student records.

## Features
- **Dashboard**: Quick overview and navigation links.
- **Add Student**: Enrol new students with name, email, phone, and course details.
- **List Students**: View all registered students in a formatted table.
- **Modify Data**: Update existing student records by ID.
- **Remove Student**: Delete student records by ID and name verification.

## Tech Stack
- **Backend**: PHP 8+ (PDO MySQL)
- **Database**: MySQL / MariaDB (`student_db`)
- **Frontend**: HTML5, CSS3

## Setup & Installation
1. Place the project folder in your web server directory (e.g., `C:/xampp/htdocs/StudentManagementSystem`).
2. Start Apache and MySQL in XAMPP.
3. Create a database named `student_db` and a `students` table:
   ```sql
   CREATE DATABASE student_db;
   USE student_db;

   CREATE TABLE students (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL UNIQUE,
       phone VARCHAR(20),
       course VARCHAR(50) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```
4. Access the app in your browser at `http://localhost/StudentManagementSystem/`.
