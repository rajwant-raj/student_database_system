<?php include('db.php'); ?>

<!DOCTYPE html>
<html>
<head>
<title>View Students</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>
<body>

<!-- 🌌 PARTICLES -->
<div id="particles-js"></div>

<!-- 🧠 MAIN CONTAINER -->
<div class="container-fluid px-5 fade-in">

    <div class="container-box">

        <h2 class="mb-4 text-center">📋 Student List</h2>

        <!-- 🔥 RESPONSIVE TABLE -->
        <div class="table-responsive">

            <table class="table table-dark table-hover text-center align-middle">

                <thead class="table-light text-dark">
                    <tr>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

<?php
$sql = "SELECT s.id, s.name, s.roll_no, s.email, 
        IFNULL(c.course_name, 'Not Assigned') AS course_name
        FROM students s
        LEFT JOIN enrollments e ON s.id = e.student_id
        LEFT JOIN courses c ON e.course_id = c.course_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['roll_no']}</td>
                <td>{$row['email']}</td>
                <td>{$row['course_name']}</td>
                <td>
                    <a href='update_student.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='delete_student.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No students found</td></tr>";
}
?>

                </tbody>

            </table>
        </div>

    </div>

</div>

<!-- 🌌 PARTICLE SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

<script>
tsParticles.load("particles-js", {
  background: { color: "transparent" },
  particles: {
    number: { value: 80 },
    color: { value: "#ffffff" },
    links: { enable: true, color: "#ffffff", distance: 150 },
    move: { enable: true, speed: 2 },
    size: { value: 2 },
    opacity: { value: 0.5 }
  }
});
</script>

</body>
</html>