<?php
// Relative path: looks for 'Student' in the same folder as this file
$db_path = __DIR__ . '/Student';

try {
    $db = new PDO("sqlite:$db_path");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['full_name'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        $sql = "INSERT INTO students (full_name, email, course) VALUES (:n, :e, :c)";
        $stmt = $db->prepare($sql);
        $stmt->execute([':n' => $name, ':e' => $email, ':c' => $course]);

        echo "Registration successful! <a href='view.php'>View List</a>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
