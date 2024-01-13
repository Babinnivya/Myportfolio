<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple ToDo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h1>ToDo List</h1>

    <form action="index.php" method="post">
        <label for="task">New Task:</label>
        <input type="text" name="task" required>
        <button type="submit">Add Task</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $task = $_POST["task"];

        if (!empty($task)) {
            file_put_contents("tasks.txt", $task . PHP_EOL, FILE_APPEND);
        }
    }
    $tasks = file("tasks.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (!empty($tasks)) {
        echo "<ul>";
        foreach ($tasks as $task) {
            echo "<li>$task</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No tasks found.</p>";
    }
    ?>

</body>
</html>
