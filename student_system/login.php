<?php
session_start();
include('db.php');

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $username;
        setcookie("username", $username, time()+3600);
        header("Location: dashboard.php");
    } else {
        $error = "Invalid Login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="col-md-4 mx-auto container-box">
        <h2>Login</h2>

        <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

        <form method="post">
            <input class="form-control mb-3" type="text" name="username" placeholder="Username" required>
            <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
            <button class="btn btn-custom w-100">Login</button>
        </form>
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