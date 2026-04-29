<?php
include('db.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // Insert student
    $stmt = $conn->prepare("INSERT INTO students(name, roll_no, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $roll, $email);

    if ($stmt->execute()) {

        $student_id = $conn->insert_id;

        // Insert enrollment
        $stmt2 = $conn->prepare("INSERT INTO enrollments(student_id, course_id) VALUES (?, ?)");
        $stmt2->bind_param("ii", $student_id, $course);
        $stmt2->execute();

        echo "<script>alert('Student Added Successfully!'); window.location='view_students.php';</script>";

    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div id="particles-js"></div>

<div class="container fade-in">
    <div class="container-box">

        <h2>Add Student</h2>

        <form method="post">

            <input class="form-control mb-3" name="name" placeholder="Name" required>

            <input class="form-control mb-3" name="roll" placeholder="Roll No" required>

            <input class="form-control mb-3" name="email" placeholder="Email" required>

    
            <select class="form-select custom-select mb-3" name="course" required>
                 <option value="" disabled selected>Select Course</option>
                  <option value="1">B.Tech</option>
                  <option value="2">BCA</option>
                  <option value="3">MCA</option>
            </select>

            <button class="btn btn-custom w-100">Add Student</button>

        </form>

    </div>
</div>

</body>
</html>