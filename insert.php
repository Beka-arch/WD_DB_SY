<?php
// 1. Enable Error Reporting (Very important for debugging!)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // 2. Connect to the database file 'Student' in the web root
    // Note: We use the absolute path to ensure Apache finds the right file
    $db = new PDO('sqlite:/var/www/html/Student');
    
    // Set error mode to Exception so we can catch errors in the 'catch' block below
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 3. Check if the form was actually submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // 4. Collect data from the POST request (index.php form names)
        $name   = $_POST['full_name'];
        $email  = $_POST['email'];
        $course = $_POST['course'];

        // 5. Prepare the SQL Statement
        // This matches the 'students' table and columns we created
        $sql = "INSERT INTO students (full_name, email, course) 
                VALUES (:full_name, :email, :course)";
        
        $stmt = $db->prepare($sql);

        // 6. Bind parameters and Execute (Prevents SQL Injection)
        $stmt->execute([
            ':full_name' => $name,
            ':email'     => $email,
            ':course'    => $course
        ]);

        // 7. Success Message
        echo "<div style='color: green; font-weight: bold;'>";
        echo "Registration successful! Student: " . htmlspecialchars($name);
        echo "</div>";
        echo "<br><a href='index.php'>Go Back</a> | <a href='view.php'>View All Students</a>";
    }

} catch (PDOException $e) {
    // 8. Error Handling
    // If there is an error (like 'no such table'), it will print here
    echo "<div style='color: red; padding: 10px; border: 1px solid red;'>";
    echo "<strong>Database Error:</strong> " . $e->getMessage();
    echo "</div>";
    echo "<br><p>Tip: Ensure you ran the terminal command to create the 'students' table inside the 'Student' file.</p>";
}
?>
