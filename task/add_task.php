<?php
// Optional file for adding tasks if you want to separate the logic.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $new_task = [
        'task' => $_POST['task'],
        'completed' => false
    ];

    $tasks = json_decode(file_get_contents('tasks.json'), true);
    $tasks[] = $new_task;
    file_put_contents('tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
    
    header('Location: index.php');
}
?>
