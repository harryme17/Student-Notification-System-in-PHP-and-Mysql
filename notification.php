<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: staffLogin.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <a class="nav-link" href="welcome2.php">Back</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome " . $_SESSION['username']; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <div class="container text-left d-grid gap-2 col-6 mx-auto custom-container">
        <h3><?php echo "Welcome " . $_SESSION['username']; ?>! You can now use this website</h3>
        <hr>

        <?php
        $insert = false;
        require_once "config.php";

        if (isset($_POST["submit"])) {
            $Name = $_POST["uerName"];
            $notification = $_POST["notification"];
            $pql = "INSERT INTO `login`.`notification_s` (`student`, `notification`) VALUES ('$Name', '$notification')";

            if ($conn->query($pql) === true) {
                $insert = true;
            } else {
                echo "ERROR: $pql <br> $conn->error";
            }

            // Close the database connection
            $conn->close();
        }
        ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Username</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="uerName">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Notification</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name="notification">
            </div>

            <button type="submit" class="btn btn-danger" name="submit">Submit</button>
            <a href="welcome2.php" type="button" class="btn btn-dark">Back</a>
            <!-- <button type="button" class="btn btn-dark">Logout</button> -->
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
