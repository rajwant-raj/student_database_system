<?php
include('db.php');

$id = $_GET['id'];

// Fetch existing data
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE students SET name=?, roll_no=?, email=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $roll, $email, $id);
    $stmt->execute();

    echo "<script>alert('Updated Successfully'); window.location='view_students.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>
<body>

<div id="particles-js"></div>

<div class="container fade-in">
    <div class="container-box col-md-6 mx-auto">

        <h2 class="mb-4 text-center">✏️ Update Student</h2>

        <form method="post">

            <input type="text" name="name" 
                class="form-control mb-3"
                value="<?php echo $row['name']; ?>" 
                placeholder="Name" required>

            <input type="text" name="roll" 
                class="form-control mb-3"
                value="<?php echo $row['roll_no']; ?>" 
                placeholder="Roll No" required>

            <input type="email" name="email" 
                class="form-control mb-3"
                value="<?php echo $row['email']; ?>" 
                placeholder="Email" required>

            <button class="btn btn-custom w-100">Update Student</button>

        </form>

    </div>
</div>

<!-- 🌌 PARTICLES -->
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