<?php 
include 'includes/db.php';
include 'includes/header.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO students (name, age, gender, contact, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $_POST['name'], $_POST['age'], $_POST['gender'], $_POST['contact'], $_POST['address']);
    if ($stmt->execute()) echo "<script>window.location='students.php';</script>";
}
?>
<div class="mb-4">
    <h2 class="fw-bold">Add Student</h2>
    <p class="text-muted">Create a new student record</p>
</div>
<div class="card p-4" style="max-width: 800px;">
    <form method="post">
        <div class="mb-3"><label class="form-label">Full Name</label><input type="text" name="name" class="form-control" required></div>
        <div class="row">
            <div class="col-md-6 mb-3"><label class="form-label">Age</label><input type="number" name="age" class="form-control" required></div>
            <div class="col-md-6 mb-3"><label class="form-label">Gender</label><select name="gender" class="form-select"><option>Male</option><option>Female</option></select></div>
        </div>
        <div class="mb-3"><label class="form-label">Contact Number</label><input type="text" name="contact" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Address</label><textarea name="address" class="form-control" rows="3"></textarea></div>
        <button type="submit" class="btn btn-dark">Save Student</button>
        <a href="students.php" class="btn btn-light border ms-2">Cancel</a>
    </form>
</div>
<?php include 'includes/footer.php'; ?>