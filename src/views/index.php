<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redis CRUD Application</title>
</head>
<body>
    <h1>Redis CRUD Application</h1>
    <form method="POST" action="index.php?action=create">
        <input type="text" name="key" placeholder="Key" required>
        <input type="text" name="value" placeholder="Value" required>
        <button type="submit">Create</button>
    </form>

    <form method="POST" action="index.php?action=read">
        <input type="text" name="key" placeholder="Key" required>
        <button type="submit">Read</button>
    </form>

    <form method="POST" action="index.php?action=update">
        <input type="text" name="key" placeholder="Key" required>
        <input type="text" name="value" placeholder="Value" required>
        <button type="submit">Update</button>
    </form>

    <form method="POST" action="index.php?action=delete">
        <input type="text" name="key" placeholder="Key" required>
        <button type="submit">Delete</button>
    </form>

    <h2>All Keys</h2>
    <ul>
        <?php
        require_once __DIR__ . '/../controllers/RedisController.php';
        $controller = new RedisController();
        $keys = $controller->listKeys();
        foreach ($keys as $key) {
            echo "<li>$key</li>";
        }
        ?>
    </ul>
</body>
</html>
