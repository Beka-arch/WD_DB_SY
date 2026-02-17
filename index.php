<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        form { max-width: 300px; display: flex; flex-direction: column; gap: 10px; }
        input { padding: 8px; }
        button { background: #28a745; color: white; border: none; padding: 10px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Register New Student</h2>
    <form action="insert.php" method="POST">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="course" placeholder="Course Name">
        <button type="submit" name="submit">Register Student</button>
    </form>
</body>
</html>
