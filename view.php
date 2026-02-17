<?php
$db_path = __DIR__ . '/Student';
$db = new PDO("sqlite:$db_path");
$result = $db->query("SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Student List</h2>
    <table border="1">
        <tr><th>Name</th><th>Email</th><th>Course</th></tr>
        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['course']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br><a href="index.php">Back to Form</a>
</body>
</html>
