<?php
// 1. Load the database connection FIRST
require 'includes/db.php'; 

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 2. Now $conn is available for use
    $sql = "SELECT id, password FROM users WHERE username = ?";
    
    // 3. Check if prepare() fails (good for debugging)
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // Direct password comparison (since you removed hash)
            if ($password === $row['password']) {
                $_SESSION['user_id'] = $row['id'];
                header("Location: index.php");
                exit();
            }
        }
        $error = "Invalid username or password";
        $stmt->close();
    } else {
        // If $conn is null here, the require failed silently
        die("Database error: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - SRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="login-container d-flex align-items-center justify-content-center">
    
    <div class="login-card text-center">
        <div class="mb-4">
            <div class="brand-icon mx-auto" style="width: 50px; height: 50px; font-size: 24px;">
                <i class="fas fa-graduation-cap"></i>
            </div>
        </div>
        <h4 class="fw-bold mb-1">Student Registration System</h4>
        <p class="text-muted mb-4">Sign in to access the admin dashboard</p>

        <?php if(isset($error)) echo "<div class='alert alert-danger py-2 small'>$error</div>"; ?>

        <form method="post">
            <div class="mb-3 text-start">
                <label class="form-label small fw-bold">Username</label>
                <input type="text" name="username" class="form-control p-2" placeholder="Enter your username" required>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label small fw-bold">Password</label>
                <input type="password" name="password" class="form-control p-2" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-dark w-100 py-2 mt-2">Sign In</button>
        </form>
        
        <div class="mt-4 text-muted small">
            Default credentials: <strong>admin / admin123</strong>
        </div>
    </div>

</body>
</html>