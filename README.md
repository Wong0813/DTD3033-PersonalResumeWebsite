# 🌐 Personal Resume & Portfolio Website

[![PHP](https://img.shields.io/badge/PHP-7.4%2B%20%7C%208.x-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

> **DTD3033 Coursework Project**  
> A dynamic personal resume and portfolio web application built with PHP and MySQL, featuring responsive frontend design, interactive UI animations, and built-in CRUD management modules.

---

## 📖 Overview

This repository contains a full-stack personal portfolio and resume web application designed for showcasing academic accomplishments, software engineering projects, technical capabilities, and professional journey. 

The application separates presentation from content through a database-driven architecture powered by MySQL. Each core page is paired with an intuitive online update form, allowing real-time content modification, profile image updates, and project documentation (PDF) uploads without modifying the underlying source code.

---

## ✨ Features

- **Responsive & Modern UI/UX**
  - Built on Bootstrap 5 with responsive grid layouts that adapt seamlessly across mobile, tablet, and desktop devices.
  - Smooth visual interactions powered by **AOS (Animate On Scroll)**, dynamic text typing effects via **Typed.js**, and lightbox media preview via **GLightbox**.
- **Dynamic Database-Driven Architecture**
  - Fully powered by MySQL database with PHP `mysqli` prepared statements for reliable data handling.
  - Complex nested structures (e.g., skill sets, career milestones, educational history) are stored in structured JSON format and rendered dynamically.
- **Dedicated In-Page Content Management (CRUD)**
  - **Home Manager**: Update full name, professional tagline, personal summary, and upload new avatar images.
  - **About Manager**: Edit academic credentials, university background, contact details, and skill percentages.
  - **Resume Manager**: Modify work history, academic timeline, and categorized technical skill groups.
  - **Portfolio Manager**: Add new projects, upload project cover images and full PDF documentation, filter by project category, and delete obsolete entries.
  - **Contact Manager**: Maintain contact addresses, phone numbers, and email accounts; store visitor inquiry messages directly into the database.
- **Media & Document Handling**
  - Built-in file upload processing for images (`assets/img/portfolio/`, `uploads/`) and project documents (`assets/pdf/`).

---

## 🗂️ Project Structure

```plaintext
Assignment1/
│
├── assets/                     # Static frontend assets
│   ├── css/                    # Custom stylesheets (main.css)
│   ├── cv_file/                # Downloadable curriculum vitae (CV)
│   ├── file/profolio/          # Attached project deliverables and specs
│   ├── img/                    # Image resources (avatars, portfolio covers, icons)
│   ├── js/                     # Custom client-side scripts (main.js)
│   ├── pdf/                    # Uploaded project documentation and PDF reports
│   └── vendor/                 # Third-party vendor libraries (Bootstrap, AOS, etc.)
│
├── forms/                      # Form handlers
│   └── contact.php             # Contact submission handler
│
├── uploads/                    # Target directory for dynamic user uploads
│
├── about.php                   # "About Me" presentation page
├── about_update_form.php       # "About Me" management form
├── contact.php                 # "Contact" view with inquiry form
├── contact_update_form.php     # Contact details manager and message storage
├── databaseLink.php            # Database connection configuration script
├── database.sql                # Complete schema & sample data SQL dump
├── footer.php                  # Reusable footer component
├── header.php                  # Reusable header component and meta tags
├── home_update_form.php        # Hero section content manager
├── index.php                   # Landing page (Hero section with typed tagline)
├── navigation.php              # Global navbar with dynamic page management links
├── portfolio.php               # "Portfolio" page with category filtering
├── portfolio_update_form.php   # Project CRUD and attachment management form
├── resume.php                  # "Resume" page (Experience, Education, Skills)
├── resume_update_form.php      # Resume data management form
├── .gitignore                  # Git ignore rules
├── LICENSE                     # MIT License file
└── README.md                   # Project documentation
```

---

## 🛠️ Technology Stack

| Layer | Technology | Description |
| :--- | :--- | :--- |
| **Backend** | PHP 7.4+ / PHP 8.x | Server-side script handling business logic & `mysqli` queries |
| **Database** | MySQL 5.7+ / MariaDB | Relational database with JSON data column support |
| **Frontend** | HTML5, CSS3, JavaScript (ES6) | Standards-compliant page structure and styling |
| **Framework** | Bootstrap 5.3 & Bootstrap Icons | Responsive UI framework and icon set |
| **Libraries** | AOS, Typed.js, GLightbox, Isotope, Swiper | Scroll triggers, animations, lightbox gallery, layout filtering |
| **Environment** | Laragon / XAMPP / WampServer | Local Apache, PHP, and MySQL development environment |

---

## 🚀 Getting Started & Local Setup

### 1. Prerequisites
Ensure you have a local web server environment installed:
- [Laragon](https://laragon.org/) (Recommended for Windows) or [XAMPP](https://www.apachefriends.org/)
- PHP 7.4 or higher
- MySQL 5.7 / MariaDB 10.3 or higher

### 2. Clone the Repository
Clone the repository into your web server's root directory (e.g., `C:/laragon/www/` for Laragon or `htdocs/` for XAMPP):

```bash
cd C:/laragon/www/
git clone https://github.com/Wong0813/DTD3033-PersonalResumeWebsite.git Assignment1
```

### 3. Import Database Schema
1. Open phpMyAdmin or your preferred database client (e.g., HeidiSQL, Navicat, DBeaver).
2. Create a new database named `resume_db`.
3. Import the **`database.sql`** file located at the project root to set up all tables and initial sample data.

### 4. Configure Database Connection
Open **`databaseLink.php`** in the project root and adjust your credentials accordingly:

```php
<?php
$servername = "localhost";
$username   = "root";         // Default user in local environments
$password   = "";             // Default password (leave blank for local Laragon/XAMPP)
$dbname     = "resume_db";    // Your imported database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Database Connection Error: " . mysqli_connect_error());
}
?>
```

### 5. Run the Application
Start Apache and MySQL services, then navigate to:
```text
http://localhost/Assignment1/
```
Or if using Laragon virtual host:
```text
http://assignment1.test
```

---

## 🗄️ Database Schema Summary

| Table | Description | Key Attributes |
| :--- | :--- | :--- |
| `home` | Landing section hero content | `full_name`, `tagline`, `introduction`, `profile_image` |
| `about` | Personal background & skills | `subtitle`, `title`, `description`, `experience`, `degree`, `skills` (JSON) |
| `resume` | Career journey & qualifications | `experience` (JSON), `education` (JSON), `skills` (JSON) |
| `portfolio` | Projects & showcase deliverables | `title`, `description`, `image`, `pdf`, `category`, `year` |
| `contact_info` | Official contact coordinates | `address`, `phone`, `email` |
| `contact_messages` | Inquiries submitted by visitors | `name`, `email`, `subject`, `message`, `created_at` |

---

## 👨‍💻 Author

- **Wong Chun Liang**
- GitHub: [@Wong0813](https://github.com/Wong0813)
- Email: [wongchunliang8158@gmail.com](mailto:wongchunliang8158@gmail.com)

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).
