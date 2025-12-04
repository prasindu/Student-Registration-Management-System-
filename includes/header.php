<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) != 'login.php') {
    header("Location: login.php");
    exit();
}

function isActive($page) {
    return basename($_SERVER['PHP_SELF']) == $page ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRS - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?php if (isset($_SESSION['user_id'])): ?>
    <nav class="sidebar">
        <div class="brand-logo">
            <div class="brand-icon"><i class="fas fa-graduation-cap"></i></div>
            <div>
                <div class="fw-bold">SRS</div>
                <div class="text-muted small">Admin Panel</div>
            </div>
        </div>

        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link <?php echo isActive('index.php'); ?>" href="index.php">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo isActive('students.php'); ?> <?php echo isActive('student_add.php'); ?> <?php echo isActive('student_edit.php'); ?>" href="students.php">
                    <i class="fas fa-user-friends"></i> Students
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo isActive('courses.php'); ?> <?php echo isActive('course_add.php'); ?> <?php echo isActive('course_edit.php'); ?>" href="courses.php">
                    <i class="fas fa-book-open"></i> Courses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo isActive('enrollments.php'); ?>" href="enrollments.php">
                    <i class="fas fa-clipboard-list"></i> Registrations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo isActive('reports.php'); ?>" href="reports.php">
                    <i class="fas fa-file-alt"></i> Reports
                </a>
            </li>
        </ul>

        <div class="user-profile">
            <div class="d-flex align-items-center mb-3">
                <div class="ms-2">
                    <div class="fw-bold text-dark">admin</div>
                    <div class="text-muted small">admin@example.com</div>
                </div>
            </div>
            <a href="logout.php" class="btn btn-outline-secondary w-100 btn-sm">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </div>
    </nav>

    <div class="main-content">
        <div class="d-flex justify-content-end mb-4 text-muted small no-print">
            admin<br>Administrator
        </div>
<?php endif; ?>