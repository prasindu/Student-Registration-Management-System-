<?php 
include 'includes/db.php';
include 'includes/header.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO courses (code, title, credits) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $_POST['code'], $_POST['title'], $_POST['credits']);
    if ($stmt->execute()) echo "<script>window.location='courses.php';</script>";
}
?>
<div class="mb-4"><h2 class="fw-bold">Add Course</h2></div>
<div class="card p-4" style="max-width: 800px;">
    <form method="post">
        <div class="mb-3"><label class="form-label">Course Code</label><input type="text" name="code" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Course Title</label><input type="text" name="title" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Credits</label><input type="number" name="credits" class="form-control" required></div>
        <button type="submit" class="btn btn-dark">Save Course</button>
        <a href="courses.php" class="btn btn-light border ms-2">Cancel</a>
    </form>
</div>
<?php include 'includes/footer.php'; ?>