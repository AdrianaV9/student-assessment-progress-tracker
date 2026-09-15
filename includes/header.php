<?php
$pageTitle = $pageTitle ?? 'Student Progress Tracker';
$currentPage = basename($_SERVER['PHP_SELF']);

$studentPages = ['students.php','add_student.php','view_student.php','edit_student.php','delete_student.php'];
$assessmentPages = ['assessments.php','add_assessment.php','edit_assessment.php','delete_assessment.php'];
$resultPages = ['results.php','add_result.php','edit_feedback.php'];

$breadcrumbMap = [
    'add_student.php' => ['Students', 'students.php', 'Add Student'],
    'view_student.php' => ['Students', 'students.php', 'View Student'],
    'edit_student.php' => ['Students', 'students.php', 'Edit Student'],
    'delete_student.php' => ['Students', 'students.php', 'Delete Student'],
    'add_assessment.php' => ['Assessments', 'assessments.php', 'Create Assessment'],
    'edit_assessment.php' => ['Assessments', 'assessments.php', 'Edit Assessment'],
    'delete_assessment.php' => ['Assessments', 'assessments.php', 'Delete Assessment'],
    'add_result.php' => ['Results', 'results.php', 'Record Mark'],
    'edit_feedback.php' => ['Results', 'results.php', 'Assessment Feedback'],
];

$breadcrumb = $breadcrumbMap[$currentPage] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="css/style.css?v=<?= filemtime(__DIR__ . '/../css/style.css') ?>">
    <link rel="stylesheet" href="css/professional-ui.css?v=<?= filemtime(__DIR__ . '/../css/professional-ui.css') ?>">
    <link rel="stylesheet" href="css/learning-inspired.css?v=<?= filemtime(__DIR__ . '/../css/learning-inspired.css') ?>">
</head>
<body>

<header class="site-header">
    <div class="container site-header-inner">
        <a
            class="home-brand"
            href="index.php"
            aria-label="Student Progress Tracker home"
        >
            <span class="home-brand-logo" aria-hidden="true">
                <svg viewBox="0 0 48 48">
                    <path d="M8 16L24 8l16 8-16 8L8 16Z" fill="currentColor" />
                    <path d="M14 22v9c0 4 5 8 10 8s10-4 10-8v-9l-10 5-10-5Z" fill="currentColor" opacity=".82" />
                </svg>
            </span>
            <span class="brand-copy">
                <strong>Student Progress Tracker</strong>
                <small>Academic progress management</small>
            </span>
        </a>

        <button
            class="nav-toggle"
            type="button"
            aria-expanded="false"
            aria-controls="primary-navigation"
        >
            <span aria-hidden="true">☰</span>
            <span class="nav-toggle-label">Menu</span>
        </button>

        <nav class="main-nav" id="primary-navigation" aria-label="Primary navigation">
            <div class="nav-links">
                <a
                    class="<?= $currentPage === 'index.php' ? 'active' : '' ?>"
                    href="index.php"
                    <?= $currentPage === 'index.php' ? 'aria-current="page"' : '' ?>
                >Home</a>
                <a
                    class="<?= $currentPage === 'dashboard.php' ? 'active' : '' ?>"
                    href="dashboard.php"
                    <?= $currentPage === 'dashboard.php' ? 'aria-current="page"' : '' ?>
                >Dashboard</a>
                <a
                    class="<?= in_array($currentPage, $studentPages, true) ? 'active' : '' ?>"
                    href="students.php"
                    <?= in_array($currentPage, $studentPages, true) ? 'aria-current="page"' : '' ?>
                >Students</a>
                <a
                    class="<?= in_array($currentPage, $assessmentPages, true) ? 'active' : '' ?>"
                    href="assessments.php"
                    <?= in_array($currentPage, $assessmentPages, true) ? 'aria-current="page"' : '' ?>
                >Assessments</a>
                <a
                    class="<?= in_array($currentPage, $resultPages, true) ? 'active' : '' ?>"
                    href="results.php"
                    <?= in_array($currentPage, $resultPages, true) ? 'aria-current="page"' : '' ?>
                >Results</a>
                <a
                    class="<?= $currentPage === 'progress.php' ? 'active' : '' ?>"
                    href="progress.php"
                    <?= $currentPage === 'progress.php' ? 'aria-current="page"' : '' ?>
                >Progress</a>
            </div>
        </nav>

        <a class="header-action" href="add_result.php">+ Record Mark</a>
    </div>
</header>

<?php if ($breadcrumb): ?>
    <div class="breadcrumb-shell">
        <nav class="container breadcrumb" aria-label="Breadcrumb">
            <a href="<?= htmlspecialchars($breadcrumb[1]) ?>">
                <?= htmlspecialchars($breadcrumb[0]) ?>
            </a>
            <span class="breadcrumb-separator" aria-hidden="true">›</span>
            <span class="breadcrumb-current" aria-current="page">
                <?= htmlspecialchars($breadcrumb[2]) ?>
            </span>
        </nav>
    </div>
<?php endif; ?>

<main class="container main-content" id="main-content">
