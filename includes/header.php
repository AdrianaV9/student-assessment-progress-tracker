<?php
$pageTitle = $pageTitle ?? 'Student Progress Tracker';
$currentPage = basename($_SERVER['PHP_SELF']);
$isHomePage = $currentPage === 'index.php';

$studentPages = ['students.php','add_student.php','view_student.php','edit_student.php','delete_student.php'];
$assessmentPages = ['assessments.php','add_assessment.php','edit_assessment.php','delete_assessment.php'];
$resultPages = ['results.php','add_result.php','edit_feedback.php'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="css/style.css?v=<?= filemtime(__DIR__ . '/../css/style.css') ?>">
</head>
<body>

<a class="skip-link" href="#main-content">Skip to main content</a>

<header class="site-header home-site-header">
    <div class="container">
        <a
            class="home-brand"
            href="index.php"
            aria-label="Student Progress Tracker home"
        >
            <span class="home-brand-logo" aria-hidden="true">
                <svg viewBox="0 0 48 48">
                    <path
                        d="M8 16L24 8l16 8-16 8L8 16Z"
                        fill="currentColor"
                    />

                    <path
                        d="M14 22v9c0 4 5 8 10 8s10-4 10-8v-9l-10 5-10-5Z"
                        fill="currentColor"
                        opacity=".82"
                    />
                </svg>
            </span>

            <span>
                Student Progress Tracker
            </span>
        </a>
    </div>
</header>

<nav class="main-nav" id="primary-navigation" aria-label="Primary navigation">
    <div class="container nav-links">
        <a class="<?= $currentPage === 'index.php' ? 'active' : '' ?>" href="index.php">Home</a>
        <a class="<?= $currentPage === 'dashboard.php' ? 'active' : '' ?>" href="dashboard.php">Dashboard</a>
        <a class="<?= in_array($currentPage, $studentPages, true) ? 'active' : '' ?>" href="students.php">Students</a>
        <a class="<?= in_array($currentPage, $assessmentPages, true) ? 'active' : '' ?>" href="assessments.php">Assessments</a>
        <a class="<?= in_array($currentPage, $resultPages, true) ? 'active' : '' ?>" href="results.php">Results</a>
        <a class="<?= $currentPage === 'progress.php' ? 'active' : '' ?>" href="progress.php">Progress</a>
    </div>
</nav>

<main class="container main-content" id="main-content">
