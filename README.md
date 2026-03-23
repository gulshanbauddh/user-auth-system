# User Authentication System (Signup, Login & Logout)

A lightweight and secure **User Authentication System** built using PHP and MySQL. This project handles user registration, secure login validation, session management, and features a responsive UI.

## 🚀 Live Demo
Check out the live project hosted on InfinityFree:  
[https://gulshanlogin.page.gd/index.php](https://gulshanlogin.page.gd/signup.php)

## ✨ Features
- **User Registration:** Securely collect and store user data.
- **Login System:** Validate credentials against the database.
- **Session Management:** Maintains user state across pages and handles secure logout.
- **Responsive Design:** Optimized for different screen sizes using CSS/Bootstrap.
- **MySQL Integration:** Robust backend for data persistence.

## 🛠️ Tech Stack
- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap
- **Backend:** PHP
- **Database:** MySQL
- **Hosting:** InfinityFree

## 📂 Project Structure
```text
├── css/                # Stylesheets
├── js/                 # Form validation scripts
├── _connaction.php      # Database connection logic
├── signup.php          # User registration
├── login.php           # User login
├── home.php            # Dashboard (Protected)
├── logout.php          # Session termination
└── _mysql.sql        # SQL schema for table setup

### How to Create a GitHub Repository and Upload Your Code

Follow these steps to get your project on GitHub:

#### Step 1: Create a New Repository on GitHub
1.  Log in to your **GitHub** account.
2.  Click the **+** icon in the top-right corner and select **New repository**.
3.  **Repository name:** Enter a name (e.g., `php-auth-system`).
4.  **Description:** (Optional) Briefly describe your project.
5.  **Public/Private:** Keep it **Public** if you want to show it in your portfolio.
6.  Leave "Initialize this repository with..." options unchecked.
7.  Click **Create repository**.

```
#### Step 2: Upload Code via Terminal (Recommended)
Open your project folder in your terminal or VS Code terminal and run these commands:

1.  **Initialize Git:**
    ```bash
    git init
    ```
2.  **Add all files:**
    ```bash
    git add .
    ```
3.  **Commit the changes:**
    ```bash
    git commit -m "Initial commit: Added Signup, Login, and Logout features"
    ```
4.  **Link to GitHub** (Copy the URL from your new GitHub repo page):
    ```bash
    git remote add origin https://github.com/gulshanbauddh/user-auth-system
    ```
5.  **Push the code:**
    ```bash
    git branch -M main
    git push -u origin main
    ```