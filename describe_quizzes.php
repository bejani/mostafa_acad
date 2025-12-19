<?php
$pdo = new PDO('mysql:host=localhost;dbname=tvto', 'root', '4562');
$stmt = $pdo->query('DESCRIBE quizzes');
$columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($columns as $col) {
    echo $col['Field'] . ' - ' . $col['Type'] . PHP_EOL;
}
