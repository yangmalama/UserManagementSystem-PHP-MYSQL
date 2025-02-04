# Web Application Development -User Management System

This web application provides a secure user authentication system and profile management functionality. Users can register, upload a profile picture, log in, and update their profile information. Upon successful login, users are redirected to the homepage, which includes navigation links to key pages. The logout feature ensures session security, and users can modify their details through the profile update section.
The system is designed with security and usability in mind. Users register with their credentials, including a profile picture, and can later log in to access their personalized dashboard. The homepage contains links to an About Us page and a profile section where users can modify their details. Session handling ensures that unauthorized users cannot access restricted pages, making the system robust and efficient.

## 1. Introduction
This report documents the development of a web application that enables user authentication, profile management, and secure navigation. Built using PHP, MySQL, HTML5, and Bootstrap, the application provides an intuitive and responsive interface for users to interact with their accounts.

## 2. Features and Functionalities

### 2.1 User Authentication System
- **Login Page:**
  - Users enter their email and password.
  - "Login" button to authenticate credentials.
  - "Register" button to navigate to the registration page.

- **Registration Page:**
  - Users input:
    - First Name, Last Name
    - Email Address
    - Password & Confirm Password
    - Phone Number
  - "Register" button submits the form and redirects to the profile photo upload page.

- **Profile Photo Upload Page:**
  - Allows users to upload their profile picture.
  - Upon submission, redirects to the login page.

- **Secure Authentication:**
  - Passwords are securely hashed using `password_hash()`.
  - Sessions are implemented for secure access.
  - Redirects prevent unauthorized access.

### 2.2 Home Page
- Includes a navigation bar with:
  - Logo/Website Name
  - Home, About Us links
  - Profile Icon (redirects to profile page)
  - Logout Button (destroys session and redirects to login page)

### 2.3 Profile Management
- **Profile Page:**
  - Displays user details: Name, Email, Phone Number, Profile Picture.
  - "Update Profile" button for modifying user information.
- **Update Profile Page:**
  - Users can update:
    - First Name, Last Name
    - Email Address
    - Phone Number
    - Profile Picture
  - Changes are stored in the database.

### 2.4 Logout Functionality
- Securely logs out the user and redirects them to the login page.

### 2.5 About Us Page
- Contains information about the website/application.

## 3. Technologies Used
| Technology  | Purpose |
|-------------|------------------------------------------------|
| PHP         | Backend scripting and user authentication |
| MySQL       | Database for storing user information |
| Bootstrap   | Styling and responsive design |
| HTML5 & CSS | Structuring and designing web pages |

## 4. Database Design
### Tables:
- **users** (id, first_name, last_name, email, password, phone, profile_pic)
- **sessions** (session_id, user_id, created_at)

## 5. Security Measures
- **Password Hashing:** Uses `password_hash()`.
- **SQL Injection Prevention:** Prepared statements (`bind_param()`).
- **Session Management:** Restricts unauthorized access.
- **File Upload Security:** Validates image formats and file size.

## 6. Challenges & Solutions
- **Session Persistence:** Implemented proper session handling.
- **Form Validation:** Ensured input fields are correctly formatted.
- **Profile Picture Upload Issues:** Implemented image type validation.

## 7. Future Enhancements
- **Password Reset Functionality** via email verification.
- **Two-Factor Authentication (2FA)** for enhanced security.
- **User Role System** (Admin vs Regular Users).
- **Email Verification** upon registration.

## 8. Conclusion
The web application successfully implements user authentication, profile management, and secure session handling. The use of PHP and MySQL ensures data integrity, while Bootstrap enhances UI responsiveness. Further enhancements can improve security and user experience.

---
