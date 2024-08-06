<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: studentLogin.php");
}

// else{
//     echo '<script type="text/javascript">
//     alert("Loging Sucess!");
// </script>';
// }


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


  <title> <?php echo "Welcome " . $_SESSION['username'] ?> </title>
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
          <li class="nav-item active">
            <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome " . $_SESSION['username'] ?></a>
          </li>
        </ul>
      </div>


    </div>
  </nav> -->

  <div class="container text-left d-grid gap-2 col-6 mx-auto custom-container">
    <h3><?php echo "Welcome " . $_SESSION['username'] ?>! You can now use this website <a href="logout.php" class="badge bg-danger text-light">Logout</a></h3>
    <hr>

    <?php
    $user = $_SESSION["username"];
    // echo $user;
    require_once "config.php";
    $result = mysqli_query($conn, "select * from notification WHERE uerName = '$user'");
    $rowcount = mysqli_num_rows($result);
    ?>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Month</th>
          <th scope="col">Present</th>
          <th scope="col">Absent</th>
        </tr>
      </thead>
      <?php

      for ($i = 1; $i <= $rowcount; $i++) {

        $row = mysqli_fetch_array($result);

      ?>
        <tbody>
          <tr>
            <td><?php echo $row["month"] ?></td>
            <td><?php echo $row["present"] ?></td>
            <td><?php echo $row["absent"] ?></td>

          </tr>

        <?php
      }
        ?>
        </tbody>
    </table>

    <?php

    ?>

    <?php

    require_once "config.php";


    $query1 = mysqli_query($conn, "select * from notification_s WHERE student = '$user'");
    // $query=mysqli_query($conn, "select * from notification where userName=$user");

    $rowcount = mysqli_num_rows($query1);

    ?>




    <hr>
    <div class="alert alert-danger" role="alert">
      Notifications
    </div>

    <?php

    for ($j = 1; $j <= $rowcount; $j++) {

      $bow = mysqli_fetch_array($query1);

    ?>




      <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <?php echo $bow["notification"] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <?php
    }
    ?>

  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>