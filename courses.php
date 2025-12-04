<?php 
include 'includes/db.php';
include 'includes/header.php'; 

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM courses WHERE id=$id");
    echo "<script>window.location='courses.php';</script>";
}

$search = $_GET['search'] ?? '';
$result = $conn->query("SELECT * FROM courses WHERE code LIKE '%$search%' OR title LIKE '%$search%'");
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Courses</h2>
        <p class="text-muted mb-0">Manage course catalog and information</p>
    </div>
    <a href="course_add.php" class="btn btn-dark"><i class="fas fa-plus me-2"></i> Add Course</a>
</div>

<div class="card p-3 mb-4">
    <form class="w-100">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
            <input type="text" name="search" class="form-control border-start-0" placeholder="Search by course code or title..." value="<?php echo $search; ?>">
        </div>
    </form>
</div>

<div class="card border-0">
    <table class="table table-hover mb-0">
        <thead class="bg-light">
            <tr><th class="ps-4">ID</th><th>Course Code</th><th>Title</th><th>Credits</th><th class="text-end pe-4">Actions</th></tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td class="ps-4 text-muted"><?php echo $row['id']; ?></td>
                <td class="fw-medium"><?php echo $row['code']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['credits']; ?></td>
                <td class="text-end pe-4">
                    <a href="course_edit.php?id=<?php echo $row['id']; ?>" class="btn-icon"><i class="fas fa-pencil-alt small"></i></a>
                    <a href="courses.php?delete=<?php echo $row['id']; ?>" class="btn-icon" onclick="return confirm('Delete?')"><i class="fas fa-trash small"></i></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include 'includes/footer.php'; ?>