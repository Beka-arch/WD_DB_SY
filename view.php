<?php
try {
    $db = new PDO('sqlite:/var/www/html/Student');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $db->query("SELECT * FROM students");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #28a745; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; background: #dc3545; color: white; }
    </style>
</head>
<body>
    <h2>Registered Students</h2>
    <a href="index.php" style="margin-bottom:10px; display:inline-block;">+ Register New Student</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo $row['student_id']; ?></td>
            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['course']); ?></td>
            <td>
                <a href="delete.php?id=<?php echo $row['student_id']; ?>" class="btn" onclick="return confirm('Delete this record?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
