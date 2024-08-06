<?php
// This script will handle login
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: welcome2.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

// If request method is POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
        echo $err;
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if (empty($err)) {
        $sql = "SELECT id, username, password FROM staff WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $password);

                if (mysqli_stmt_fetch($stmt)) {
                    // This means the password is correct. Allow user to login
                    $_SESSION["username"] = $username;
                    $_SESSION["id"] = $id;
                    $_SESSION["loggedin"] = true;

                    // Redirect user to welcome page
                    header("Location: welcome2.php");
                    exit;
                }
            } else {
                echo '<script type="text/javascript">
                    alert("Wrong ID or Password!");
                </script>';
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="studentLogin.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <title>Login Staff!</title>

    <style>
        .custom-container {
            margin-top: 8%;
        }
    </style>
</head>

<body>
    <!-- Main content starts from here -->
    <form action="" method="post">
        <div class="container text-left d-grid gap-2 col-6 mx-auto custom-container">
            <h1>Login Here Staff</h1>
            <hr>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Enter Your Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Enter Your Password</label>
            </div>
            <button type="submit" class="btn btn-danger btn-lg submit_btn">Submit</button>
            <a href="Start.html" class="btn btn-secondary btn-lg submit_btn">Go to Start</a>
            <!-- <a href="logout.php" class="btn btn-secondary btn-lg submit_btn">Logout</a> -->
        </div>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

</html>
