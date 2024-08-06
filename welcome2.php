<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: staffLogin.php");
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
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"
    >

    <link rel="stylesheet" href="welcome2.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <title><?php echo "Welcome " . $_SESSION['username']; ?></title>
    <style>
        .custom-container {
            margin-top: 9%;
        }
    </style>
</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">VP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                    <li class="nav-item">
                        <a class="nav-link" href="notification.php">Send Notification</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome " . $_SESSION['username']; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <div class="container text-left d-grid gap-2 col-6 mx-auto custom-container">
        <h3>
            <?php echo "Welcome " . $_SESSION['username']; ?>! You can now use this website 
            <a href="logout.php" class="badge bg-danger text-light">Logout</a>
        </h3>
        <hr>

        <?php
        $insert = false;
        require_once "config.php";

        if (isset($_POST["submit"])) {
            $uerName = $_POST["uerName"];
            $month = $_POST["month"];
            $present = $_POST["present"];
            $absent = $_POST["absent"];

            $sql = "INSERT INTO `login`.`notification` (`uerName`, `month`, `present`, `absent`) VALUES ('$uerName', '$month', '$present', '$absent')";

            if ($conn->query($sql) === true) {
                $insert = true;
            } else {
                echo "ERROR: $sql <br> $conn->error";
            }
        }
        ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Username</label>
                <input
                    type="text"
                    class="form-control"
                    id="formGroupExampleInput"
                    placeholder="Username as registered"
                    name="uerName"
                >
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Month</label>
                <select class="form-control" id="exampleFormControlSelect1" name="month">
                    <option>Jan</option>
                    <option>Feb</option>
                    <option>Mar</option>
                    <option>Apr</option>
                    <option>May</option>
                    <option>Jun</option>
                    <option>Jul</option>
                    <option>Aug</option>
                    <option>Sep</option>
                    <option>Oct</option>
                    <option>Nov</option>
                    <option>Dec</option>
                </select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Present</label>
                <input
                    type="number"
                    class="form-control"
                    id="formGroupExampleInput"
                    placeholder="Days present"
                    name="present"
                >
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Absent</label>
                <input
                    type="number"
                    class="form-control"
                    id="formGroupExampleInput2"
                    placeholder="Days absent"
                    name="absent"
                >
            </div>

            <button type="submit" class="btn btn-danger" name="submit">Insert Attendance</button>
            <button class="btn btn-dark" type="button">
                <a href="notification.php" class="text-light">Send notification</a>
            </button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"
    ></script>
</body>

</html>
