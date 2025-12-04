<?php 
include 'includes/db.php';
include 'includes/header.php'; 

// Fetch Stats
$stu_count = $conn->query("SELECT count(*) as count FROM students")->fetch_assoc()['count'];
$course_count = $conn->query("SELECT count(*) as count FROM courses")->fetch_assoc()['count'];
$enroll_count = $conn->query("SELECT count(*) as count FROM enrollments")->fetch_assoc()['count'];
$avg_enroll = ($stu_count > 0) ? round($enroll_count / $stu_count, 1) : 0;

// Fetch Recent
$recent = $conn->query("SELECT s.name, c.code, e.enrolled_at FROM enrollments e JOIN students s ON e.student_id = s.id JOIN courses c ON e.course_id = c.id ORDER BY e.id DESC LIMIT 4");
?>

<div class="mb-5">
    <h2 class="fw-bold">Dashboard</h2>
    <p class="text-muted">Overview of the student registration system</p>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card stat-card h-100">
            <div class="d-flex justify-content-between">
                <div class="stat-label">Total Students</div>
                <i class="fas fa-user-friends stat-icon"></i>
            </div>
            <div class="stat-value"><?php echo $stu_count; ?></div>
            <div class="text-muted small mt-2">Registered in the system</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card h-100">
            <div class="d-flex justify-content-between">
                <div class="stat-label">Total Courses</div>
                <i class="fas fa-book-open stat-icon"></i>
            </div>
            <div class="stat-value"><?php echo $course_count; ?></div>
            <div class="text-muted small mt-2">Available courses</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card h-100">
            <div class="d-flex justify-content-between">
                <div class="stat-label">Total Registrations</div>
                <i class="fas fa-clipboard-check stat-icon"></i>
            </div>
            <div class="stat-value"><?php echo $enroll_count; ?></div>
            <div class="text-muted small mt-2">Course enrollments</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card h-100">
            <div class="d-flex justify-content-between">
                <div class="stat-label">Avg. Enrollment</div>
                <i class="fas fa-chart-line stat-icon"></i>
            </div>
            <div class="stat-value"><?php echo $avg_enroll; ?></div>
            <div class="text-muted small mt-2">Courses per student</div>
        </div>
    </div>
</div>

<div class="card p-4">
    <h5 class="fw-bold mb-4">Recent Registrations</h5>
    <div class="list-group list-group-flush">
        <?php while($row = $recent->fetch_assoc()): ?>
        <div class="list-group-item px-0 py-3 border-bottom d-flex justify-content-between align-items-center">
            <div>
                <div class="fw-bold"><?php echo $row['name']; ?></div>
                <div class="text-muted small">enrolled in <?php echo $row['code']; ?></div>
            </div>
            <div class="text-muted small"><?php echo date('M d, Y', strtotime($row['enrolled_at'])); ?></div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php include 'includes/footer.php'; ?>