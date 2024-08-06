<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: adminLogin.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="welcome3.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
        crossorigin="anonymous"
    >
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"
    >
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <title><?php echo "Welcome " . $_SESSION['username']; ?></title>

    <style>
        .custom-container {
            margin-top: 10%;
        }
    </style>
</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">VP</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> 
                            <?php echo "Welcome " . $_SESSION['username']; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <!-- <div class="container mt-4">
        <h3><?php echo "Welcome " . $_SESSION['username']; ?>! You can now use this website</h3>
        <hr>
    </div> -->

    <div class="container text-left d-grid gap-2 col-6 mx-auto custom-container">
        <h1><?php echo $_SESSION['username']; ?>! Select Role To Register !!</h1>
        <hr>
        <a class="btn btn-info btn-lg submit_btn" href="studentRegistration.php">Student</a>
        <a class="btn btn-info btn-lg submit_btn" href="staffRegistration.php">Staff</a>
        <a class="btn btn-danger btn-lg submit_btn" href="logout.php">Logout</a>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"
    ></script>
</body>

</html>
