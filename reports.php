<?php 
include 'includes/db.php';
include 'includes/header.php'; 
?>

<div class="mb-5">
    <h2 class="fw-bold">Reports</h2>
    <p class="text-muted">Generate and export system reports in PDF format</p>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card report-card">
            <div class="report-icon-box bg-blue-light"><i class="fas fa-user-friends"></i></div>
            <h5 class="fw-bold">Student List Report</h5>
            <p class="text-muted small mb-4">Generates a comprehensive list of all registered students including personal details.</p>
            <button onclick="window.print()" class="btn btn-dark w-100 mt-auto"><i class="fas fa-download me-2"></i> Generate PDF</button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card report-card">
            <div class="report-icon-box bg-green-light"><i class="fas fa-book"></i></div>
            <h5 class="fw-bold">Course List Report</h5>
            <p class="text-muted small mb-4">Generates a complete list of all available courses with codes, titles, and credit values.</p>
            <button onclick="window.print()" class="btn btn-dark w-100 mt-auto"><i class="fas fa-download me-2"></i> Generate PDF</button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card report-card">
            <div class="report-icon-box bg-purple-light"><i class="fas fa-clipboard-list"></i></div>
            <h5 class="fw-bold">Registration Report</h5>
            <p class="text-muted small mb-4">Generates a detailed list of all student enrollments with registration dates.</p>
            <button onclick="window.print()" class="btn btn-dark w-100 mt-auto"><i class="fas fa-download me-2"></i> Generate PDF</button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card report-card">
            <div class="report-icon-box bg-orange-light"><i class="fas fa-chart-pie"></i></div>
            <h5 class="fw-bold">Enrollment Summary</h5>
            <p class="text-muted small mb-4">Generates a summary report showing enrollment statistics for each course.</p>
            <button onclick="window.print()" class="btn btn-dark w-100 mt-auto"><i class="fas fa-download me-2"></i> Generate PDF</button>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>