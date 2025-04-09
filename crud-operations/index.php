<?php
require_once "db_connect.php";

$success_message = "";
$error_message = "";

// Create
if (isset($_POST['create'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($conn, $sql)) {
        $success_message = "User created successfully!";
    } else {
        $error_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Read
$users = mysqli_query($conn, "SELECT * FROM users");

// Update
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $success_message = "User updated successfully!";
    } else {
        $error_message = "Error updating record: " . mysqli_error($conn);
    }
}

// Delete
if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete']);
    
    $sql = "DELETE FROM users WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $success_message = "User deleted successfully!";
    } else {
        $error_message = "Error deleting record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Operations</title>
    <style>
        .container { max-width: 800px; margin: 20px auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        .error { color: red; }
        .success { color: green; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New User</h2>
        <?php if ($error_message) echo "<p class='error'>$error_message</p>"; ?>
        <?php if ($success_message) echo "<p class='success'>$success_message</p>"; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <button type="submit" name="create">Add User</button>
        </form>

        <h2>Users List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            <?php while ($user = mysqli_fetch_assoc($users)): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['created_at']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a> | 
                    <a href="?delete=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>