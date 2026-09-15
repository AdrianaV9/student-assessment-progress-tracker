<?php
$pageTitle = 'Student Progress Tracker';
require_once 'includes/header.php';
?>

<div class="ll-home">
    <section class="ll-hero" aria-labelledby="home-title">
        <div class="ll-hero-copy">
            <p class="ll-eyebrow">Student assessment management</p>
            <h1 id="home-title">See student progress <span>clearly.</span></h1>
            <p>
                Manage students, assessments, marks, feedback and overall academic progress
                from one simple workspace designed for quick everyday use.
            </p>

            <div class="ll-hero-actions" aria-label="Primary actions">
                <a class="button button-primary" href="dashboard.php">Open Dashboard</a>
                <a class="button button-secondary" href="add_student.php">+ Add Student</a>
            </div>

            <div class="ll-hero-notes" aria-label="System features">
                <span>Automatic percentages</span>
                <span>Clear progress views</span>
                <span>Simple record management</span>
            </div>
        </div>

        <div class="ll-hero-visual" aria-hidden="true">
            <div class="ll-preview">
                <div class="ll-preview-top">
                    <span></span><span></span><span></span>
                    <div class="ll-preview-title">Progress overview</div>
                </div>
                <div class="ll-preview-body">
                    <div class="ll-preview-grid">
                        <div class="ll-preview-card">
                            <small>Students</small>
                            <strong>Manage</strong>
                        </div>
                        <div class="ll-preview-card">
                            <small>Assessments</small>
                            <strong>Track</strong>
                        </div>
                        <div class="ll-preview-card">
                            <small>Results</small>
                            <strong>Review</strong>
                        </div>
                    </div>
                    <div class="ll-preview-chart">
                        <span></span><span></span><span></span><span></span><span></span><span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="ll-feature-band" aria-label="Quick access">
        <a href="students.php">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <circle cx="9" cy="8" r="3"/><path d="M3.5 19c.7-3.3 2.5-5 5.5-5s4.8 1.7 5.5 5"/><path d="M16 7.5a2.5 2.5 0 1 1 0 5"/>
            </svg>
            <strong>Student Records</strong>
            <span>Add, search, view and update student information.</span>
        </a>
        <a href="assessments.php">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h5M8 16l2 2 4-4"/>
            </svg>
            <strong>Assessments</strong>
            <span>Organise assessment details, deadlines and maximum marks.</span>
        </a>
        <a href="results.php">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M6 18 18 6"/><circle cx="7" cy="7" r="2.5"/><circle cx="17" cy="17" r="2.5"/>
            </svg>
            <strong>Results & Feedback</strong>
            <span>Record marks, review percentages and maintain feedback.</span>
        </a>
        <a href="progress.php">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M4 18h16"/><path d="m5 15 4-4 3 3 6-7"/><path d="M15 7h3v3"/>
            </svg>
            <strong>Progress</strong>
            <span>See overall recorded performance in a clear summary view.</span>
        </a>
    </nav>

    <section class="ll-section" aria-labelledby="workflow-title">
        <div class="ll-section-heading">
            <p class="ll-eyebrow">Simple workflow</p>
            <h2 id="workflow-title">From student record to progress overview in three steps.</h2>
            <p>The system keeps the core workflow straightforward so information is easy to enter and easy to review.</p>
        </div>

        <div class="ll-steps">
            <article class="ll-step">
                <span class="ll-step-number">1</span>
                <h3>Add students and assessments</h3>
                <p>Create the records needed for each learner and the assessments you want to track.</p>
            </article>
            <article class="ll-step">
                <span class="ll-step-number">2</span>
                <h3>Record marks and feedback</h3>
                <p>Enter assessment marks and add feedback while percentage calculations are handled automatically.</p>
            </article>
            <article class="ll-step">
                <span class="ll-step-number">3</span>
                <h3>Review progress</h3>
                <p>Use the dashboard and progress pages to review current results and overall recorded performance.</p>
            </article>
        </div>
    </section>

    <section class="ll-section ll-help" aria-labelledby="help-title">
        <div class="ll-section-heading">
            <p class="ll-eyebrow">Help</p>
            <h2 id="help-title">Common questions</h2>
            <p>Short explanations of the calculations and labels used throughout the tracker.</p>
        </div>

        <div class="ll-faq">
            <details>
                <summary>How is an assessment percentage calculated?</summary>
                <p>The recorded mark is divided by the assessment maximum and multiplied by 100.</p>
            </details>
            <details>
                <summary>How is overall student progress calculated?</summary>
                <p>Overall progress is the average of the student's recorded assessment percentages.</p>
            </details>
            <details>
                <summary>Can student information be changed later?</summary>
                <p>Yes. Existing student records can be viewed and edited from the Students section.</p>
            </details>
            <details>
                <summary>What do Upcoming and Overdue mean?</summary>
                <p>These labels describe the assessment due date; they are not submission-status labels.</p>
            </details>
        </div>
    </section>
</div>

<?php require_once 'includes/footer.php'; ?>
