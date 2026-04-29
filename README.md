# 🎓 Student Database Management System

A web-based Student Database Management System built using **PHP, MySQL, Bootstrap, and custom CSS**.  
This project allows administrators to manage student records efficiently with a modern UI and secure backend.

---

## 🚀 Features

### 🔐 Authentication
- Admin login system using PHP sessions
- Cookie support for user experience

### 📊 Student Management (CRUD)
- ➕ Add Student
- 📋 View Students
- ✏️ Update Student Details
- ❌ Delete Student

---

## 📸 Screenshots

### 🏠 Home Page
![Home](images/Home.png)

###  Donate Page
![Home](images/donate.png)

###  Login Page
![Home](images/login.png)






---
### 🔗 Database Integration
- MySQL database with relational structure
- Tables:
  - `students`
  - `courses`
  - `enrollments`
  - `users`
- SQL JOIN used to fetch related data

### 🎨 UI/UX
- Modern dashboard design
- Glassmorphism effect
- Animated particle background
- Responsive layout (Bootstrap)

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, Bootstrap
- **Backend:** PHP
- **Database:** MySQL (phpMyAdmin)
- **Server:** XAMPP / Apache

---

## 📂 Project Structure

```

student_system/
│
├── db.php
├── login.php
├── dashboard.php
├── logout.php
│── images // ui images 
├── add_student.php
├── view_students.php
├── update_student.php
├── delete_student.php
│
├── style.css
└── README.md

```



---

## ⚙️ Setup Instructions

### 1️⃣ Install XAMPP
Download and install XAMPP from:
https://www.apachefriends.org/

---

### 2️⃣ Start Server
Open XAMPP Control Panel and start:
- Apache
- MySQL

---

### 3️⃣ Create Database

Go to:

```
http://localhost/phpmyadmin
```

Create a database:
student_db


Run this SQL:

```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    roll_no VARCHAR(20),
    email VARCHAR(100)
);

CREATE TABLE courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100)
);

CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id INT
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

INSERT INTO users (username, password)
VALUES ('admin', 'admin123');

INSERT INTO courses (course_name)
VALUES ('B.Tech'), ('BCA'), ('MCA');

```

---

### 4️⃣ Place Project

Move project folder to:

```
C:\xampp\htdocs\
```

### 5️⃣ Run Project

Open browser:

```
http://localhost/student_system/login.php
```

---

### 🔑 Login Credentials


Username: admin


Password: admin123

---


### 🧠 Key Concepts Used

CRUD Operations (Create, Read, Update, Delete)

SQL Joins

Prepared Statements (SQL Injection Prevention)

Session Management

Cookies Handling










