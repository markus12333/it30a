<?php

// ==========================================================
// Database Connection
// ==========================================================

$host = 'localhost';
$db = 'it30a_library_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


// ==========================================================
// Session
// ==========================================================

session_start();


// ==========================================================
// Determine Current Section
// ==========================================================

$section = $_GET['section'] ?? 'students';


// ==========================================================
// CRUD Operations
// ==========================================================

$actions = $_GET['actions'] ?? '';


// ==========================================================
// Students
// ==========================================================

// Fetch students
if ($section === 'students') {

    $stmt = $pdo->query("
        SELECT *
        FROM students
        ORDER BY student_id DESC
    ");

    $students = $stmt->fetchAll();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IT30A Library Management System</title>

</head>

<body>

    <h1>IT30A Library Management System</h1>


    <!-- =====================================================
         Navigation
    ====================================================== -->

    <nav>

        <a href="?section=students">
            Students
        </a>

        |

        <a href="?section=books">
            Books
        </a>

        |

        <a href="?section=borrowings">
            Borrowings
        </a>

    </nav>


    <hr>


    <!-- =====================================================
         Students Section
    ====================================================== -->

    <?php if ($section === 'students'): ?>

        <h2>Students</h2>

        <table border="1" cellpadding="8" cellspacing="0">

            <thead>

                <tr>

                    <th>Student ID</th>

                    <th>First Name</th>

                    <th>Last Name</th>

                    <th>Course</th>

                </tr>

            </thead>

            <tbody>

                <?php if (!empty($students)): ?>

                    <?php foreach ($students as $student): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($student['student_id']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($student['student_first_name']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($student['student_last_name']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($student['student_course']) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="4">
                            No students found.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    <?php endif; ?>


</body>

</html>