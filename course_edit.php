<?php 
include 'includes/db.php';
include 'includes/header.php'; 
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM courses WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE courses SET code=?, title=?, credits=? WHERE id=?");
    $stmt->bind_param("ssii", $_POST['code'], $_POST['title'], $_POST['credits'], $id);
    if ($stmt->execute()) echo "<script>window.location='courses.php';</script>";
}
?>
<div class="mb-4"><h2 class="fw-bold">Edit Course</h2></div>
<div class="card p-4" style="max-width: 800px;">
    <form method="post">
        <div class="mb-3"><label class="form-label">Course Code</label><input type="text" name="code" value="<?php echo $row['code']; ?>" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Title</label><input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Credits</label><input type="number" name="credits" value="<?php echo $row['credits']; ?>" class="form-control" required></div>
        <button type="submit" class="btn btn-dark">Update Course</button>
        <a href="courses.php" class="btn btn-light border ms-2">Cancel</a>
    </form>
</div>
<?php include 'includes/footer.php'; ?>