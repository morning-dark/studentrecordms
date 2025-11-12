# 🎓 Student Record Management System (SRMS)

## 📖 Project Description

The **Student Record Management System (SRMS)** is a comprehensive web application designed to efficiently manage student, course, and subject information within an educational institution.  
Developed in **PHP** with a **MySQL** database, the system provides an intuitive interface for administrators to centralize and streamline administrative tasks.

---

## 🚀 Key Features

The system allows administrators to perform the following operations:

- **Student Management:** Add, edit, and delete student records.  
- **Course Management:** Create and maintain a list of available courses.  
- **Subject Management:** Define and manage subjects associated with each course.  
- **Course Availability:** Check and manage the availability of courses.  
- **Dashboard:** Visualize key system statistics through charts (powered by **Morris.js** and **Flot**).  
- **Secure Authentication:** Admin login and logout with password recovery functionality.

---

## 🛠️ Technologies Used

- **Backend:** PHP  
- **Database:** MySQL  
- **Frontend:** HTML5, CSS3, JavaScript  
- **Framework/Theme:** SB Admin 2 (Bootstrap)  
- **Libraries:** jQuery, Morris.js, Flot  

---

## ⚙️ Installation and Configuration

### 🧩 Prerequisites
Ensure that you have a web server environment (such as **XAMPP**, **WAMP**, or **LAMP**) with:

- A compatible version of **PHP**  
- **MySQL** or **MariaDB**

---

### 🪜 Installation Steps

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/morning-dark/studentrecordms.git
   cd studentrecordms
2. **Database Setup:**
- Create a new MySQL database named studentrecord.
- Import the file SQL File/studentrecord.sql into the new database.
3. **Database Connection Configuration:**
- Open includes/dbconnection.php.
- Edit the database credentials if necessary (username, password, database name).
4. **Deployment:**
- Place all project files in your web server’s root directory (e.g., htdocs for XAMPP).
5. **Access:**
Open your web browser and go to the project URL, e.g.:
   ```bash
   http://localhost:8080/studentrecordms

## 🔑 Default Login Information

The default admin login credentials can be found in the studentrecord.sql file after importing the database.

## 📁 Project Structure
   ``` bash
studentrecordms/
├── SQL File/
│   └── studentrecord.sql          # Database file
├── includes/
│   └── dbconnection.php           # Database connection file
├── bower_components/              # Frontend dependencies
├── dist/                          # CSS and JS files of the theme
├── add-course.php
├── add-subject.php
├── admin-profile.php
├── dashboard.php                  # Main dashboard
├── index.php                      # Homepage / redirect
├── login.php                      # Login page
├── manage-students.php
└── ... (other management files)
