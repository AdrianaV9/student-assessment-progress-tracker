<?php
$pageTitle = 'Student Progress Tracker';
require_once 'includes/header.php';
?>

<section class="home-hero">
    <div class="home-hero-content">
        <p class="home-eyebrow">Student Assessment Management System</p>
        <h2>Manage assessment information and monitor student progress in one place.</h2>
        <p class="home-introduction">
            Student Progress Tracker is a web-based academic management system
            designed to organise student records, assessments, marks, feedback
            and overall progress.
        </p>
        <div class="home-hero-actions">
            <a class="button" href="dashboard.php">Open Dashboard</a>
            <a class="button button-secondary" href="students.php">View Students</a>
        </div>
    </div>

    <div class="hero-progress-card" aria-hidden="true">
        <span class="hero-progress-label">Progress Overview</span>
        <strong>Track. Review. Improve.</strong>
        <div class="hero-progress-line"><span></span></div>
    </div>
</section>

<section class="home-section">
    <div class="home-section-heading">
        <p class="home-eyebrow">Quick Access</p>
        <h2>Application Shortcuts</h2>
        <p>Select an area below to continue directly to the relevant part of the system.</p>
    </div>

    <div class="shortcut-grid">
        <a class="shortcut-card" href="dashboard.php"><span class="shortcut-icon">▦</span><div><h3>Dashboard</h3><p>Review progress, results and assessment due-date information.</p></div><span>→</span></a>
        <a class="shortcut-card" href="students.php"><span class="shortcut-icon">♙</span><div><h3>Students</h3><p>Add, view, edit, search and manage student records.</p></div><span>→</span></a>
        <a class="shortcut-card" href="assessments.php"><span class="shortcut-icon">✓</span><div><h3>Assessments</h3><p>Create and maintain assessments, due dates and maximum marks.</p></div><span>→</span></a>
        <a class="shortcut-card" href="results.php"><span class="shortcut-icon">%</span><div><h3>Results</h3><p>Record marks, review percentages and maintain feedback.</p></div><span>→</span></a>
        <a class="shortcut-card" href="progress.php"><span class="shortcut-icon">↗</span><div><h3>Progress</h3><p>Review each student's overall recorded assessment progress.</p></div><span>→</span></a>
    </div>
</section>

<section class="home-section home-about-card">
    <div>
        <p class="home-eyebrow">About the System</p>
        <h2>Designed for clear academic progress tracking</h2>
    </div>
    <div>
        <p>The application brings student, assessment and result data together in one structured system.</p>
        <p>Percentages are calculated automatically and overall progress is calculated from recorded assessment percentages.</p>
    </div>
</section>

<section class="home-section home-faq-section">
    <div class="home-section-heading">
        <p class="home-eyebrow">Help</p>
        <h2>Frequently Asked Questions</h2>
    </div>

    <div class="faq-list">
        <details class="faq-item"><summary>How is an assessment percentage calculated?</summary><p>The system divides the recorded mark by the assessment maximum and multiplies the result by 100.</p></details>
        <details class="faq-item"><summary>How is overall student progress calculated?</summary><p>Overall progress is the average of the student's recorded assessment percentages.</p></details>
        <details class="faq-item"><summary>Can student information be edited later?</summary><p>Yes. Existing student records can be viewed and edited.</p></details>
        <details class="faq-item"><summary>Can a mark be higher than the assessment maximum?</summary><p>No. Validation prevents a mark from exceeding the selected assessment maximum.</p></details>
        <details class="faq-item"><summary>What does Upcoming or Overdue mean?</summary><p>These labels refer to the assessment due date, not a submission status.</p></details>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
