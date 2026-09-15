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
        <a class="shortcut-card" href="dashboard.php">
            <span class="shortcut-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
            </span>
            <div><h3>Dashboard</h3><p>Review progress, results and assessment due-date information.</p></div>
            <span class="shortcut-arrow" aria-hidden="true">→</span>
        </a>

        <a class="shortcut-card" href="students.php">
            <span class="shortcut-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3"/><path d="M3.5 19c.7-3.3 2.5-5 5.5-5s4.8 1.7 5.5 5"/><path d="M16 7.5a2.5 2.5 0 1 1 0 5"/><path d="M16.5 14.5c2.3.4 3.6 1.8 4 4.5"/></svg>
            </span>
            <div><h3>Students</h3><p>Add, view, edit, search and manage student records.</p></div>
            <span class="shortcut-arrow" aria-hidden="true">→</span>
        </a>

        <a class="shortcut-card" href="assessments.php">
            <span class="shortcut-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h5M8 16l2 2 4-4"/></svg>
            </span>
            <div><h3>Assessments</h3><p>Create and maintain assessments, due dates and maximum marks.</p></div>
            <span class="shortcut-arrow" aria-hidden="true">→</span>
        </a>

        <a class="shortcut-card" href="results.php">
            <span class="shortcut-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="M6 18 18 6"/><circle cx="7" cy="7" r="2.5"/><circle cx="17" cy="17" r="2.5"/></svg>
            </span>
            <div><h3>Results</h3><p>Record marks, review percentages and maintain feedback.</p></div>
            <span class="shortcut-arrow" aria-hidden="true">→</span>
        </a>

        <a class="shortcut-card" href="progress.php">
            <span class="shortcut-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="M4 18h16"/><path d="m5 15 4-4 3 3 6-7"/><path d="M15 7h3v3"/></svg>
            </span>
            <div><h3>Progress</h3><p>Review each student's overall recorded assessment progress.</p></div>
            <span class="shortcut-arrow" aria-hidden="true">→</span>
        </a>
    </div>
</section>

<section class="home-section home-about-card">
    <div>
        <p class="home-eyebrow">About the System</p>
        <h2>Clear academic progress tracking</h2>
    </div>
    <div>
        <p>The application brings student, assessment and result data together in one structured system.</p>
        <p>Percentages and overall recorded progress are calculated automatically from assessment results.</p>
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
