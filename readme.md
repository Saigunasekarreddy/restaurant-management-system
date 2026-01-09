🍽️ Restaurant Management System

A full-stack Restaurant Management System built using HTML, CSS, JavaScript, PHP, and MySQL, designed to manage user authentication, food orders, and table reservations through a clean web interface.

📌 Features
🔐 User Authentication

User Sign Up and Login

Secure password hashing

Session-based authentication

Logout functionality

📋 Menu

Categorized menu (Pizza, Pasta, Starters)

Tab-based UI using W3.CSS

Fully responsive layout

🛒 Orders

Select food items from dropdown

Quantity selection

Special instructions

Orders stored in MySQL database

📅 Reservations

Table reservation with date & time

Special requirements message

Data stored securely in database

🧑‍💻 Technologies Used
Layer	Technologies
Frontend	HTML5, CSS3, JavaScript, W3.CSS
Backend	PHP (Built-in Server)
Database	MySQL
Server	PHP CLI (No XAMPP required)
📂 Project Structure
Restaurant Management System/
│
├── index.html
├── menu.html
├── about.html
├── contact.html
│
├── login.php
├── signup.php
├── logout.php
├── orders.php
├── reservation.php
│
├── db.php
│
├── css/
│   ├── style.css
│   └── auth.css
│
├── js/
│   └── menu.js
│
└── README.md

🗄️ Database Schema
users table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255)
);

orders table
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  food VARCHAR(100),
  quantity INT,
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

reservations table
CREATE TABLE reservations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  table_no VARCHAR(10),
  reservation_date DATETIME,
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

⚙️ Setup Instructions
1️⃣ Install PHP

Download PHP (ZIP) from:

https://www.php.net/downloads


Enable extensions in php.ini:

extension=mysqli
extension=pdo_mysql

2️⃣ Create Database
CREATE DATABASE restaurant_db;
USE restaurant_db;


Create tables using the SQL above.

3️⃣ Configure Database (db.php)
<?php
$conn = mysqli_connect("localhost", "root", "YOUR_PASSWORD", "restaurant_db");
if (!$conn) {
    die("Database connection failed");
}
?>

4️⃣ Run the Project

Open terminal in project folder:

php -S localhost:8000


Open browser:

http://localhost:8000/index.html

🔐 Default Flow

User signs up

User logs in

User views menu

User places order

User reserves table

User logs out

🚀 Future Enhancements

Admin dashboard

Order price calculation

Payment gateway integration

Menu loaded dynamically from database

Role-based access control

👨‍🎓 Academic Use

This project is suitable for:

Web Development coursework

Full-stack mini projects

PHP & MySQL practice

Resume portfolio

📄 License

This project is for educational purposes only.