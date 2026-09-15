<?php
require_once __DIR__ . '/config/database.php';

$pageTitle = 'Insights & Calendar';

$monthInput = $_GET['month'] ?? date('Y-m');
$month = DateTimeImmutable::createFromFormat('!Y-m', $monthInput);

if (!$month || $month->format('Y-m') !== $monthInput) {
    $month = new DateTimeImmutable('first day of this month');
}

$monthStart = $month->modify('first day of this month');
$monthEnd = $month->modify('last day of this month');
$previousMonth = $monthStart->modify('-1 month')->format('Y-m');
$nextMonth = $monthStart->modify('+1 month')->format('Y-m');
$today = new DateTimeImmutable('today');

$calendarStatement = $pdo->prepare(
    'SELECT
        a.id,
        a.title,
        a.due_date,
        m.module_code,
        m.module_name
     FROM assessments a
     JOIN modules m ON a.module_id = m.id
     WHERE a.due_date BETWEEN :month_start AND :month_end
     ORDER BY a.due_date, m.module_code, a.title'
);

$calendarStatement->execute([
    'month_start' => $monthStart->format('Y-m-d'),
    'month_end' => $monthEnd->format('Y-m-d')
]);

$monthAssessments = $calendarStatement->fetchAll();
$eventsByDay = [];

foreach ($monthAssessments as $assessment) {
    $day = (int) (new DateTimeImmutable($assessment['due_date']))->format('j');
    $eventsByDay[$day][] = $assessment;
}

$studentProgress = $pdo->query(
    'SELECT
        s.id,
        s.student_number,
        s.first_name,
        s.last_name,
        COUNT(r.id) AS result_count,
        ROUND(
            AVG(
                CASE
                    WHEN a.maximum_mark > 0
                    THEN (r.mark_achieved / a.maximum_mark) * 100
                    ELSE NULL
                END
            ),
            2
        ) AS overall_progress
     FROM students s
     LEFT JOIN results r ON r.student_id = s.id
     LEFT JOIN assessments a ON r.assessment_id = a.id
     GROUP BY
        s.id,
        s.student_number,
        s.first_name,
        s.last_name
     HAVING COUNT(r.id) > 0
     ORDER BY overall_progress DESC, s.last_name, s.first_name
     LIMIT 8'
)->fetchAll();

$assessmentPerformance = $pdo->query(
    'SELECT
        a.id,
        a.title,
        m.module_code,
        COUNT(r.id) AS result_count,
        ROUND(
            AVG(
                CASE
                    WHEN a.maximum_mark > 0
                    THEN (r.mark_achieved / a.maximum_mark) * 100
                    ELSE NULL
                END
            ),
            2
        ) AS average_percentage
     FROM assessments a
     JOIN modules m ON a.module_id = m.id
     LEFT JOIN results r ON r.assessment_id = a.id
     GROUP BY a.id, a.title, m.module_code
     HAVING COUNT(r.id) > 0
     ORDER BY average_percentage DESC, m.module_code, a.title
     LIMIT 8'
)->fetchAll();

$upcomingCount = (int) $pdo->query(
    'SELECT COUNT(*)
     FROM assessments
     WHERE due_date BETWEEN CURRENT_DATE() AND DATE_ADD(CURRENT_DATE(), INTERVAL 30 DAY)'
)->fetchColumn();

$overdueCount = (int) $pdo->query(
    'SELECT COUNT(*)
     FROM assessments
     WHERE due_date < CURRENT_DATE()'
)->fetchColumn();

$totalResults = (int) $pdo->query('SELECT COUNT(*) FROM results')->fetchColumn();

$averagePerformance = $pdo->query(
    'SELECT ROUND(
        AVG(
            CASE
                WHEN a.maximum_mark > 0
                THEN (r.mark_achieved / a.maximum_mark) * 100
                ELSE NULL
            END
        ),
        2
     )
     FROM results r
     JOIN assessments a ON r.assessment_id = a.id'
)->fetchColumn();

require __DIR__ . '/includes/header.php';
?>

<section class="page-heading insights-heading">
    <div>
        <p class="eyebrow">Insights</p>
        <h2>Calendar & Performance Insights</h2>
        <p>Review assessment deadlines and visual summaries of recorded student performance.</p>
    </div>

    <div class="page-actions">
        <a href="add_assessment.php" class="button button-secondary">+ Assessment</a>
        <a href="add_result.php" class="button button-primary">+ Record Mark</a>
    </div>
</section>

<section class="insights-summary" aria-label="Insight summary">
    <article class="insight-stat insight-stat-green">
        <span>Due in next 30 days</span>
        <strong><?= $upcomingCount ?></strong>
        <small>Assessments</small>
    </article>

    <article class="insight-stat insight-stat-red">
        <span>Overdue</span>
        <strong><?= $overdueCount ?></strong>
        <small>Past due dates</small>
    </article>

    <article class="insight-stat insight-stat-blue">
        <span>Recorded results</span>
        <strong><?= $totalResults ?></strong>
        <small>Marks in the system</small>
    </article>

    <article class="insight-stat insight-stat-purple">
        <span>Average performance</span>
        <strong>
            <?= $averagePerformance !== null
                ? htmlspecialchars(number_format((float) $averagePerformance, 1)) . '%'
                : '—' ?>
        </strong>
        <small>Across recorded results</small>
    </article>
</section>

<section class="panel insights-calendar-panel">
    <div class="insights-section-heading calendar-heading">
        <div>
            <p class="eyebrow">Assessment Calendar</p>
            <h3><?= htmlspecialchars($monthStart->format('F Y')) ?></h3>
            <p>Due dates from your assessment records.</p>
        </div>

        <div class="calendar-controls" aria-label="Calendar navigation">
            <a class="calendar-control" href="insights.php?month=<?= htmlspecialchars($previousMonth) ?>" aria-label="Previous month">←</a>
            <a class="calendar-control calendar-today" href="insights.php?month=<?= htmlspecialchars(date('Y-m')) ?>">This month</a>
            <a class="calendar-control" href="insights.php?month=<?= htmlspecialchars($nextMonth) ?>" aria-label="Next month">→</a>
        </div>
    </div>

    <div class="calendar-desktop">
        <div class="calendar-weekdays" aria-hidden="true">
            <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
        </div>

        <div class="calendar-grid" role="grid" aria-label="<?= htmlspecialchars($monthStart->format('F Y')) ?> assessment calendar">
            <?php for ($blank = 1; $blank < (int) $monthStart->format('N'); $blank++): ?>
                <div class="calendar-day calendar-day-empty" aria-hidden="true"></div>
            <?php endfor; ?>

            <?php for ($day = 1; $day <= (int) $monthStart->format('t'); $day++): ?>
                <?php
                $date = $monthStart->setDate(
                    (int) $monthStart->format('Y'),
                    (int) $monthStart->format('m'),
                    $day
                );
                $isToday = $date->format('Y-m-d') === $today->format('Y-m-d');
                $dayEvents = $eventsByDay[$day] ?? [];
                ?>
                <div class="calendar-day <?= $isToday ? 'calendar-day-today' : '' ?>" role="gridcell">
                    <div class="calendar-day-number">
                        <span><?= $day ?></span>
                        <?php if ($dayEvents): ?>
                            <small><?= count($dayEvents) ?> due</small>
                        <?php endif; ?>
                    </div>

                    <div class="calendar-events">
                        <?php foreach (array_slice($dayEvents, 0, 2) as $event): ?>
                            <a
                                class="calendar-event"
                                href="edit_assessment.php?id=<?= (int) $event['id'] ?>"
                                title="<?= htmlspecialchars($event['module_code'] . ' - ' . $event['title']) ?>"
                            >
                                <strong><?= htmlspecialchars($event['module_code']) ?></strong>
                                <span><?= htmlspecialchars($event['title']) ?></span>
                            </a>
                        <?php endforeach; ?>

                        <?php if (count($dayEvents) > 2): ?>
                            <span class="calendar-more">+<?= count($dayEvents) - 2 ?> more</span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="calendar-mobile">
        <?php if ($monthAssessments): ?>
            <?php foreach ($monthAssessments as $assessment): ?>
                <?php $assessmentDate = new DateTimeImmutable($assessment['due_date']); ?>
                <a class="agenda-item" href="edit_assessment.php?id=<?= (int) $assessment['id'] ?>">
                    <span class="agenda-date">
                        <strong><?= htmlspecialchars($assessmentDate->format('d')) ?></strong>
                        <small><?= htmlspecialchars($assessmentDate->format('M')) ?></small>
                    </span>
                    <span class="agenda-copy">
                        <strong><?= htmlspecialchars($assessment['title']) ?></strong>
                        <small><?= htmlspecialchars($assessment['module_code'] . ' · ' . $assessment['module_name']) ?></small>
                    </span>
                    <span class="agenda-arrow" aria-hidden="true">→</span>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="insights-empty">No assessment due dates are recorded for this month.</p>
        <?php endif; ?>
    </div>
</section>

<div class="insights-chart-grid">
    <section class="panel insights-chart-panel">
        <div class="insights-section-heading">
            <div>
                <p class="eyebrow">Student Progress</p>
                <h3>Highest recorded progress</h3>
                <p>Up to eight students, based on the average of their recorded assessment percentages.</p>
            </div>
            <a href="progress.php" class="text-link">Full progress view →</a>
        </div>

        <?php if ($studentProgress): ?>
            <div class="horizontal-chart" role="img" aria-label="Bar chart showing student overall recorded progress">
                <?php foreach ($studentProgress as $student): ?>
                    <?php $value = max(0, min(100, (float) $student['overall_progress'])); ?>
                    <div class="chart-row">
                        <div class="chart-row-label">
                            <strong><?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?></strong>
                            <small><?= htmlspecialchars($student['student_number']) ?> · <?= (int) $student['result_count'] ?> results</small>
                        </div>
                        <div class="chart-bar-track">
                            <span class="chart-bar chart-bar-green" style="width: <?= htmlspecialchars(number_format($value, 2, '.', '')) ?>%"></span>
                        </div>
                        <strong class="chart-value"><?= htmlspecialchars(number_format((float) $student['overall_progress'], 1)) ?>%</strong>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="insights-empty">Record assessment marks to populate the student progress chart.</p>
        <?php endif; ?>
    </section>

    <section class="panel insights-chart-panel">
        <div class="insights-section-heading">
            <div>
                <p class="eyebrow">Assessment Performance</p>
                <h3>Average by assessment</h3>
                <p>Up to eight assessments with recorded results.</p>
            </div>
            <a href="results.php" class="text-link">View results →</a>
        </div>

        <?php if ($assessmentPerformance): ?>
            <div class="horizontal-chart" role="img" aria-label="Bar chart showing average recorded result by assessment">
                <?php foreach ($assessmentPerformance as $assessment): ?>
                    <?php $value = max(0, min(100, (float) $assessment['average_percentage'])); ?>
                    <div class="chart-row">
                        <div class="chart-row-label">
                            <strong><?= htmlspecialchars($assessment['module_code'] . ' · ' . $assessment['title']) ?></strong>
                            <small><?= (int) $assessment['result_count'] ?> recorded results</small>
                        </div>
                        <div class="chart-bar-track">
                            <span class="chart-bar chart-bar-purple" style="width: <?= htmlspecialchars(number_format($value, 2, '.', '')) ?>%"></span>
                        </div>
                        <strong class="chart-value"><?= htmlspecialchars(number_format((float) $assessment['average_percentage'], 1)) ?>%</strong>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="insights-empty">Assessment averages will appear after marks are recorded.</p>
        <?php endif; ?>
    </section>
</div>

<section class="insights-note">
    <div>
        <span class="insights-note-icon" aria-hidden="true">i</span>
        <div>
            <strong>How to read these insights</strong>
            <p>Charts use only results already stored in your database. Calendar entries come directly from assessment due dates.</p>
        </div>
    </div>
    <a href="dashboard.php">Return to dashboard →</a>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
