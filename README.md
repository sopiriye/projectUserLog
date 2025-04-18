# 🛡️ projectUserLog

A secure user authentication system built with **PHP** and **MySQL**, following best practices for backend security, session handling, role-based access, and file uploads — structured with clean architecture and Bootstrap-styled UI.

---

## 🚀 Features

- ✅ User Registration with Email Verification
- ✅ Secure Login with Session Management
- ✅ Role-based Access Control (User & Admin)
- ✅ Admin Panel to View & Download Uploaded Files
- ✅ File Upload Functionality (PDF, DOC, TXT)
- ✅ Password Hashing using `password_hash()`
- ✅ Password Reset via Email Link (PHPMailer)
- ✅ User Session Timeout for Inactivity
- ✅ Real-time Feedback via Alerts
- ✅ Full PHPMailer Email Integration (via Gmail SMTP)

---

## 🔧 Technologies Used

- **PHP 8+**
- **SQL**
- **MySQL**  
- **PHPMailer**  
- **Bootstrap 5**  
- **HTML + CSS**  

---

## 🧪 How to Set Up Locally

### 1. Clone the Repository

```bash
git clone https://github.com/sopiriye/projectUserLog.git
```
### 2. Start Your Local Server
You can use the native PHP server.

### 3. Create a MySQL Database
Create a DB called projectUserLog and import the SQL schema (projectUserLog.sql) or generate it manually.

### 4. Configure DB Credentials
Update the file at config/config.php with your DB credentials:

### 5. Setup PHPMailer
- PHPMailer is already included in the repo.
- Generate a Gmail App Password for your account.
- Replace your email and app password in mailer.php

---

## Email Features

| Feature              | Description                                     |
|----------------------|-------------------------------------------------|
| Email Verification   | Users must verify their email before login     |
| Password Reset       | Tokenized secure reset links sent via email    |
| PHPMailer Integration| Used for sending all transactional emails      |

---

## 🧠 How Everything Connects
- Users register → receive a verification email via PHPMailer
- After verification → they can log in and upload documents
- Admins (added manually in DB) → can view/download uploads
- Session timeout after 15 minutes of inactivity
- Password reset available for all verified users

---

## 🛡️ Security Features
- password_hash() & password_verify() for secure password storage
- Token-based email verification and password resets
- Role-based access with clear Admin/User dashboard segregation
- Sessions protected against hijacking and misuse


