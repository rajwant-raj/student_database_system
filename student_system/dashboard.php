<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark custom-navbar px-4">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">🎓 Student System</span>

        <div class="ms-auto d-flex align-items-center gap-3">
            <span class="text-light small">
                Welcome, <b><?php echo $_SESSION['user']; ?></b>
            </span>

            <a href="logout.php" class="btn btn-logout">Log out</a>
        </div>
    </div>
</nav>

<div class="container">
  <div class="row text-center">

        <div class="col-md-4">
            <div class="container-box">
                <h4>Add Student</h4>
                <a href="add_student.php" class="btn btn-custom w-100">Go</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="container-box">
                <h4>View Students</h4>
                <a href="view_students.php" class="btn btn-custom w-100">Go</a>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

<div id="particles-js"></div>

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