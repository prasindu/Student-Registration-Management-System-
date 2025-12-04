<?php 
include 'includes/db.php';
include 'includes/header.php'; 

// Add Enrollment
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enroll'])) {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $check = $conn->query("SELECT * FROM enrollments WHERE student_id=$student_id AND course_id=$course_id");
    if($check->num_rows == 0) {
        $conn->query("INSERT INTO enrollments (student_id, course_id) VALUES ($student_id, $course_id)");
        echo "<script>window.location='enrollments.php';</script>";
    }
}

// Remove Enrollment
if(isset($_GET['remove'])) {
    $eid = $_GET['remove'];
    $conn->query("DELETE FROM enrollments WHERE id=$eid");
    echo "<script>window.location='enrollments.php';</script>";
}

$students = $conn->query("SELECT * FROM students");
$courses = $conn->query("SELECT * FROM courses");
$enrollments = $conn->query("SELECT e.id, s.name, c.title, c.code, e.enrolled_at FROM enrollments e JOIN students s ON e.student_id = s.id JOIN courses c ON e.course_id = c.id");
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Registrations</h2>
        <p class="text-muted mb-0">Manage student course enrollments</p>
    </div>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#enrollModal">
        <i class="fas fa-plus me-2"></i> Enroll Student
    </button>
</div>

<div class="modal fade" id="enrollModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enroll Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Select Student</label>
                        <select name="student_id" class="form-select" required>
                            <?php while($s = $students->fetch_assoc()): ?>
                                <option value="<?php echo $s['id']; ?>"><?php echo $s['name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Course</label>
                        <select name="course_id" class="form-select" required>
                            <?php while($c = $courses->fetch_assoc()): ?>
                                <option value="<?php echo $c['id']; ?>"><?php echo $c['code']." - ".$c['title']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="enroll" class="btn btn-dark">Enroll</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card border-0">
    <table class="table table-hover mb-0">
        <thead class="bg-light">
            <tr><th class="ps-4">ID</th><th>Student</th><th>Course</th><th>Registration Date</th><th class="text-end pe-4">Actions</th></tr>
        </thead>
        <tbody>
            <?php while($row = $enrollments->fetch_assoc()): ?>
            <tr>
                <td class="ps-4 text-muted"><?php echo $row['id']; ?></td>
                <td class="fw-medium"><?php echo $row['name']; ?></td>
                <td><?php echo $row['code']." - ".$row['title']; ?></td>
                <td><?php echo date('M d, Y', strtotime($row['enrolled_at'])); ?></td>
                <td class="text-end pe-4">
                    <a href="enrollments.php?remove=<?php echo $row['id']; ?>" class="btn-icon" onclick="return confirm('Remove enrollment?')"><i class="fas fa-trash small"></i></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include 'includes/footer.php'; ?>