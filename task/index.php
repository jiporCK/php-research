<?php

// Load tasks from JSON file
$tasks = json_decode(file_get_contents('tasks.json'), true);

// Handle task submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $new_task = [
        'task' => $_POST['task'],
        'completed' => false
    ];

    // Add the new task to the tasks array
    $tasks[] = $new_task;

    // Save updated tasks to the JSON file
    file_put_contents('tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
}

// Mark task as completed
if (isset($_GET['complete'])) {
    $task_id = $_GET['complete'];
    $tasks[$task_id]['completed'] = true;

    // Save updated tasks to the JSON file
    file_put_contents('tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
}

// Mark task as not completed
if (isset($_GET['uncomplete'])) {
    $task_id = $_GET['uncomplete'];
    $tasks[$task_id]['completed'] = false;

    // Save updated tasks to the JSON file
    file_put_contents('tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h1>My To-Do List</h1>
    
    <!-- Add Task Form -->
    <form action="index.php" method="POST">
        <input type="text" name="task" placeholder="Enter a task" required>
        <button type="submit">Add Task</button>
    </form>
    
    <h2>Tasks</h2>
    <ul>
        <?php foreach ($tasks as $index => $task): ?>
            <li>
                <?php echo $task['task']; ?>
                <?php if ($task['completed']): ?>
                    <span> (Completed)</span>
                    <a href="?uncomplete=<?php echo $index; ?>">Mark as Incomplete</a>
                <?php else: ?>
                    <a href="?complete=<?php echo $index; ?>">Mark as Completed</a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
