# Student Registration Management System

A comprehensive web-based system for managing student registrations, courses, and academic records.

## Features

✅ **Admin Authentication** - Secure login with password hashing
✅ **Dashboard** - Overview of students, courses, and registrations
✅ **Student Management** - Add, edit, delete, and view student records
✅ **Course Management** - Manage course information and details
✅ **Registration System** - Assign students to courses
✅ **Reports** - Generate printable PDF reports
✅ **Search & Filter** - Quick search functionality
✅ **Responsive Design** - Works on desktop, tablet, and mobile

## Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Backend**: PHP (Core PHP with MySQLi)
- **Database**: MySQL
- **Server**: WAMPServer / XAMPP
- **Tools**: VS Code, phpMyAdmin, Git

## Installation Instructions

### Prerequisites
- WAMPServer or XAMPP installed
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Modern web browser

### Step 1: Download and Extract
1. Download the project files
2. Extract to your server directory:
   - WAMP: `C:\wamp64\www\student-registration-system`
   - XAMPP: `C:\xampp\htdocs\student-registration-system`

### Step 2: Create Database
1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Create a new database named `student_registration_db`
3. Import the SQL file:
   - Click on the database
   - Go to Import tab
   - Choose file: `sql/database.sql`
   - Click "Go"

### Step 3: Configure Database Connection
1. Open `config/database.php`
2. Update the following if needed:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');  // Your MySQL password
define('DB_NAME', 'student_registration_db');
```

### Step 4: Set Permissions (Optional)
Create the following directories if they don't exist:
- `uploads/student-photos/`
- `exports/reports/`
- `logs/`

### Step 5: Access the System
1. Start your WAMP/XAMPP server
2. Open browser and go to: `http://localhost/student-registration-system`
3. Login with default credentials:
   - **Username**: admin
   - **Password**: admin123

## Default Login Credentials

**Administrator Account:**
- Username: `admin`
- Password: `admin123`

⚠️ **Important**: Change the default password after first login!

## Folder Structure

```
student-registration-system/
├── config/              # Configuration files
├── includes/            # Reusable components
├── modules/             # Main application modules
│   ├── auth/           # Authentication
│   ├── dashboard/      # Dashboard
│   ├── students/       # Student management
│   ├── courses/        # Course management
│   ├── registration/   # Registration module
│   └── reports/        # Reports generation
├── assets/             # CSS, JS, Images
├── uploads/            # File uploads
├── exports/            # Generated reports
├── sql/                # Database files
└── index.php           # Entry point
```

## Usage Guide

### Managing Students
1. Go to **Students** menu
2. Click **Add New Student**
3. Fill in student information
4. Click **Save Student**

### Managing Courses
1. Go to **Courses** menu
2. Click **Add New Course**
3. Enter course details
4. Click **Save Course**

### Registering Students
1. Go to **Registration** menu
2. Click **Register Student**
3. Select student and course
4. Choose semester and academic year
5. Click **Register Student**

### Generating Reports
1. Go to **Reports** menu
2. Choose report type:
   - Students Report
   - Courses Report
   - Registration Report
3. Click **Generate Report**
4. Use browser print function to save as PDF

## Security Features

- Password hashing using PHP password_hash()
- SQL injection protection
- Session management
- Input sanitization
- CSRF protection
- Secure headers

## Troubleshooting

### Cannot connect to database
- Check if MySQL is running
- Verify database credentials in `config/database.php`
- Ensure database exists

### Page not found errors
- Check if `.htaccess` is enabled
- Verify file paths
- Check server permissions

### Cannot login
- Verify database is imported correctly
- Check if sessions are enabled
- Clear browser cache

## Future Enhancements

- Email notifications
- SMS integration
- Student portal (view-only)
- Grade management
- Attendance tracking
- Multi-branch support
- API integration

## Support

For issues or questions:
- Check the documentation
- Review error logs in `logs/error.log`
- Contact system administrator

## License

This project is developed for educational purposes.

## Credits

Developed using:
- Bootstrap 5
- Font Awesome
- DataTables
- jQuery

---

**Version**: 1.0.0  
**Last Updated**: December 2024# Student-Registration-Management-System-
