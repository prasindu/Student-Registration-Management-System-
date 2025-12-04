<?php 
include 'includes/db.php';
include 'includes/header.php'; 

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
    echo "<script>window.location='students.php';</script>";
}

$search = $_GET['search'] ?? '';
$gender_filter = $_GET['gender'] ?? '';

$sql = "SELECT * FROM students WHERE (name LIKE '%$search%' OR contact LIKE '%$search%')";
if($gender_filter) { $sql .= " AND gender = '$gender_filter'"; }
$result = $conn->query($sql);
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Students</h2>
        <p class="text-muted mb-0">Manage student records and information</p>
    </div>
    <a href="student_add.php" class="btn btn-dark"><i class="fas fa-plus me-2"></i> Add Student</a>
</div>

<div class="card p-3 mb-4">
    <form class="row g-2">
        <div class="col-md-10">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search by name or contact..." value="<?php echo $search; ?>">
            </div>
        </div>
        <div class="col-md-2">
            <select name="gender" class="form-select" onchange="this.form.submit()">
                <option value="">All Genders</option>
                <option value="Male" <?php if($gender_filter=='Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if($gender_filter=='Female') echo 'selected'; ?>>Female</option>
            </select>
        </div>
    </form>
</div>

<div class="card border-0">
    <table class="table table-hover mb-0">
        <thead class="bg-light">
            <tr><th class="ps-4">ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Contact</th><th>Address</th><th class="text-end pe-4">Actions</th></tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td class="ps-4 text-muted"><?php echo $row['id']; ?></td>
                <td class="fw-medium"><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><span class="badge bg-light text-dark border"><?php echo $row['gender']; ?></span></td>
                <td><?php echo $row['contact']; ?></td>
                <td class="text-muted small text-truncate" style="max-width: 200px;"><?php echo $row['address']; ?></td>
                <td class="text-end pe-4">
                    <a href="student_edit.php?id=<?php echo $row['id']; ?>" class="btn-icon"><i class="fas fa-pencil-alt small"></i></a>
                    <a href="students.php?delete=<?php echo $row['id']; ?>" class="btn-icon" onclick="return confirm('Delete?')"><i class="fas fa-trash small"></i></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include 'includes/footer.php'; ?>