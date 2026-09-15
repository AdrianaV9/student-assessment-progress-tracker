<?php
$pageTitle = 'Student Progress Tracker';
require_once 'includes/header.php';
?>

<div class="home-portal">
    <section class="portal-intro" aria-labelledby="home-title">
        <p class="portal-kicker">Student Assessment Management System</p>
        <h1 id="home-title">Student Progress Tracker</h1>
        <p class="portal-summary">
            Manage student records, assessments, marks, feedback and academic progress
            from one clear workspace.
        </p>

        <div class="portal-actions" aria-label="Primary actions">
            <a class="button button-primary" href="dashboard.php">Open Dashboard</a>
            <a class="button button-secondary" href="add_student.php">+ Add Student</a>
            <a class="button button-secondary" href="add_result.php">Record Mark</a>
        </div>
    </section>

    <section class="portal-section" aria-labelledby="quick-access-title">
        <div class="portal-section-heading">
            <div>
                <p class="portal-kicker">Quick Access</p>
                <h2 id="quick-access-title">Go directly to an area</h2>
            </div>
            <p>Choose the section you need without working through extra screens.</p>
        </div>

        <div class="portal-grid">
            <a class="portal-card" href="students.php">
                <span class="portal-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <circle cx="9" cy="8" r="3"/>
                        <path d="M3.5 19c.7-3.3 2.5-5 5.5-5s4.8 1.7 5.5 5"/>
                        <path d="M16 7.5a2.5 2.5 0 1 1 0 5"/>
                        <path d="M16.5 14.5c2.3.4 3.6 1.8 4 4.5"/>
                    </svg>
                </span>
                <span class="portal-card-content">
                    <strong>Students</strong>
                    <span>Add, search, view and manage student records.</span>
                </span>
                <span class="portal-card-link" aria-hidden="true">Open →</span>
            </a>

            <a class="portal-card" href="assessments.php">
                <span class="portal-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <rect x="4" y="3" width="16" height="18" rx="2"/>
                        <path d="M8 8h8M8 12h5M8 16l2 2 4-4"/>
                    </svg>
                </span>
                <span class="portal-card-content">
                    <strong>Assessments</strong>
                    <span>Create and maintain assessments, dates and maximum marks.</span>
                </span>
                <span class="portal-card-link" aria-hidden="true">Open →</span>
            </a>

            <a class="portal-card" href="results.php">
                <span class="portal-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M6 18 18 6"/>
                        <circle cx="7" cy="7" r="2.5"/>
                        <circle cx="17" cy="17" r="2.5"/>
                    </svg>
                </span>
                <span class="portal-card-content">
                    <strong>Results</strong>
                    <span>Review recorded marks, percentages and feedback.</span>
                </span>
                <span class="portal-card-link" aria-hidden="true">Open →</span>
            </a>

            <a class="portal-card" href="progress.php">
                <span class="portal-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M4 18h16"/>
                        <path d="m5 15 4-4 3 3 6-7"/>
                        <path d="M15 7h3v3"/>
                    </svg>
                </span>
                <span class="portal-card-content">
                    <strong>Progress</strong>
                    <span>Review each student's overall recorded assessment progress.</span>
                </span>
                <span class="portal-card-link" aria-hidden="true">Open →</span>
            </a>
        </div>
    </section>

    <section class="portal-section portal-help" aria-labelledby="help-title">
        <div class="portal-section-heading portal-help-heading">
            <div>
                <p class="portal-kicker">Help</p>
                <h2 id="help-title">Frequently Asked Questions</h2>
            </div>
        </div>

        <div class="portal-faq-list">
            <details class="portal-faq-item">
                <summary>How is an assessment percentage calculated?</summary>
                <p>The recorded mark is divided by the assessment maximum and multiplied by 100.</p>
            </details>

            <details class="portal-faq-item">
                <summary>How is overall student progress calculated?</summary>
                <p>Overall progress is the average of the student's recorded assessment percentages.</p>
            </details>

            <details class="portal-faq-item">
                <summary>Can student information be changed later?</summary>
                <p>Yes. Existing student records can be viewed and edited from the Students section.</p>
            </details>

            <details class="portal-faq-item">
                <summary>What do Upcoming and Overdue mean?</summary>
                <p>These labels describe the assessment due date; they are not submission-status labels.</p>
            </details>
        </div>
    </section>
</div>

<?php require_once 'includes/footer.php'; ?>
