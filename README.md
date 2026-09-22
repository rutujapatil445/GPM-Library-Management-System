# 📚 GPM Library Management System

A web-based **Library Management System** developed using **PHP, MySQL, HTML, CSS, JavaScript, and Composer**. The system provides separate functionality for administrators, staff, and students to manage library operations digitally.

## 🚀 Project Overview

The **GPM Library Management System** is designed to simplify and automate common library activities such as book management, student registration, book issuing, book requests, fines, feedback, and user authentication.

The system provides different interfaces for:

* 👨‍💼 **Admin**
* 👨‍🏫 **Staff**
* 🎓 **Students**

It helps reduce manual work and provides a centralized platform for managing library records.

---

## ✨ Features

### 👨‍💼 Admin Module

* Admin registration and login
* Admin profile management
* Manage books
* Add and delete books
* Manage students
* Approve admin requests
* Manage book issue information
* Manage fines
* View student requests
* Update password
* Import book/data information
* Manage feedback

### 👨‍🏫 Staff Module

* Staff login
* Staff dashboard
* Library-related management operations
* Access to relevant library information

### 🎓 Student Module

* Student registration
* Student login
* Student profile
* Update profile information
* Search and view books
* Request books
* Issue books
* View issued books
* View fines
* Update password
* Submit feedback
* Logout

### 🔐 Authentication

* User registration
* Login system
* Role-based access
* Profile management
* Password update functionality
* Verification functionality

---

## 🛠️ Technologies Used

| Technology       | Purpose                                   |
| ---------------- | ----------------------------------------- |
| **PHP**          | Backend development and server-side logic |
| **MySQL**        | Database management                       |
| **HTML5**        | Web page structure                        |
| **CSS3**         | Styling and responsive layout             |
| **JavaScript**   | Client-side functionality                 |
| **SCSS**         | CSS preprocessing                         |
| **Composer**     | PHP dependency management                 |
| **XAMPP**        | Local development environment             |
| **Git & GitHub** | Version control and project hosting       |

---

## 📂 Project Structure

```text
GPM-Library-Management-System/
│
├── admin/
│   ├── assets/
│   ├── images/
│   ├── add.php
│   ├── books.php
│   ├── fines.php
│   ├── issue_info.php
│   ├── login.php
│   ├── student.php
│   └── ...
│
├── assets/
│   ├── css/
│   ├── js/
│   └── scss/
│
├── images/
│
├── staff/
│
├── student/
│   ├── assets/
│   ├── images/
│   ├── books.php
│   ├── issue_book.php
│   ├── login.php
│   ├── profile.php
│   ├── request.php
│   └── ...
│
├── aboutus.php
├── books.php
├── connection.php
├── feedback.php
├── import.php
├── index.php
├── login.php
├── navbar.php
├── student_registration.php
├── verify.php
├── composer.json
├── composer.lock
└── style.css
```

---

## ⚙️ Requirements

Before running the project, install:

* XAMPP
* PHP
* MySQL
* Composer
* Git

---

## 💻 Installation & Setup

### 1. Clone the repository

```bash
git clone https://github.com/rutujapatil445/GPM-Library-Management-System.git
```

### 2. Move the project to XAMPP

Copy the project folder into:

```text
C:\xampp\htdocs\
```

The final path should be:

```text
C:\xampp\htdocs\GPM Library Management System
```

### 3. Start XAMPP

Open XAMPP Control Panel and start:

```text
Apache
MySQL
```

### 4. Create the database

Open:

```text
http://localhost/phpmyadmin
```

Create a database named:

```text
library
```

Import the project's database SQL file if available.

> **Note:** The project currently expects the database to be named `library`.

### 5. Configure database connection

The project uses MySQL through PHP's `mysqli` connection.

Update the database configuration in the relevant `connection.php` files according to your local MySQL setup.

Example:

```php
<?php

$db = mysqli_connect("localhost", "root", "", "library");

if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
```

### 6. Install Composer dependencies

From the project directory:

```bash
composer install
```

### 7. Run the project

Open your browser and visit:

```text
http://localhost/GPM%20Library%20Management%20System/
```

---

## 🔄 System Workflow

```text
                    ┌─────────────────────┐
                    │   Library System    │
                    └──────────┬──────────┘
                               │
              ┌────────────────┼────────────────┐
              │                │                │
              ▼                ▼                ▼
          Admin             Staff           Student
              │                │                │
              ▼                ▼                ▼
        Manage Books      Staff Access     Search Books
        Manage Users                       Request Books
        Manage Fines                       Issue Books
        Approvals                          View Fines
        Requests                           Feedback
```

---

## 🎯 Objectives

* Digitize library management operations
* Reduce manual record keeping
* Simplify book management
* Provide role-based access for different users
* Track book issues and requests
* Manage fines efficiently
* Improve accessibility of library information
* Provide a centralized database for library records

---

## 🔒 Security Considerations

The application uses authentication and database connectivity to manage users and library information.

For production deployment, additional security measures should be implemented, including:

* Password hashing
* Prepared SQL statements
* Input validation and sanitization
* Environment variables for database credentials
* Session security
* CSRF protection
* Secure error handling

---

## 🔮 Future Enhancements

Some possible improvements include:

* 📱 Responsive mobile-first interface
* 📊 Admin analytics dashboard
* 🔍 Advanced book search and filtering
* 📧 Email notifications for due dates
* 🔔 Automated overdue reminders
* 📚 Book availability notifications
* 🔐 Improved authentication and authorization
* 📈 Library usage reports
* ☁️ Cloud deployment
* 🔎 ISBN-based book search
* 📱 QR/barcode-based book management

---

## 📸 Screenshots

Add screenshots of the main pages here:

### Home Page

```text
Add screenshot here
```

### Admin Dashboard

```text
Add screenshot here
```

### Student Dashboard

```text
Add screenshot here
```

### Book Management

```text
Add screenshot here
```

---

## 👩‍💻 Author

**Rutuja Patil**

Computer Engineering Student
Pune, Maharashtra

### Connect With Me

* GitHub: [rutujapatil445](https://github.com/rutujapatil445)
* LinkedIn: [Rutuja Patil](https://linkedin.com/in/rutuja-patil-b5b3a9327)

---

## 📄 License

This project is developed for **academic and educational purposes**.

---

⭐ If you find this project useful, consider giving the repository a star!
