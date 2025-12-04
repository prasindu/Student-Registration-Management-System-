<?php 
include 'includes/db.php';
include 'includes/header.php'; 
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE students SET name=?, age=?, gender=?, contact=?, address=? WHERE id=?");
    $stmt->bind_param("sisssi", $_POST['name'], $_POST['age'], $_POST['gender'], $_POST['contact'], $_POST['address'], $id);
    if ($stmt->execute()) echo "<script>window.location='students.php';</script>";
}
?>
<div class="mb-4">
    <h2 class="fw-bold">Edit Student</h2>
</div>
<div class="card p-4" style="max-width: 800px;">
    <form method="post">
        <div class="mb-3"><label class="form-label">Full Name</label><input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required></div>
        <div class="row">
            <div class="col-md-6 mb-3"><label class="form-label">Age</label><input type="number" name="age" class="form-control" value="<?php echo $row['age']; ?>" required></div>
            <div class="col-md-6 mb-3"><label class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option <?php if($row['gender']=='Male') echo 'selected'; ?>>Male</option>
                    <option <?php if($row['gender']=='Female') echo 'selected'; ?>>Female</option>
                </select>
            </div>
        </div>
        <div class="mb-3"><label class="form-label">Contact</label><input type="text" name="contact" class="form-control" value="<?php echo $row['contact']; ?>"></div>
        <div class="mb-3"><label class="form-label">Address</label><textarea name="address" class="form-control" rows="3"><?php echo $row['address']; ?></textarea></div>
        <button type="submit" class="btn btn-dark">Update Student</button>
        <a href="students.php" class="btn btn-light border ms-2">Cancel</a>
    </form>
</div>
<?php include 'includes/footer.php'; ?>