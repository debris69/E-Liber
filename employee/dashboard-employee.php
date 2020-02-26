<?php
  session_start();
  if ($_SESSION['active']!='yes')
    header('Location: ../index.html');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/dashboard.css">
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-sm bg-light navbar-light">
      <!-- Brand/logo -->
      <a class="navbar-brand" href="#">
        <img src="../img/logo.png" alt="logo" style="width:70px;">
        E-Liber
      </a>

      <!-- Links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="dashboard-employee.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="issue-requests.php">Issue Requests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-books.php">Add Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage-member.php">Members</a>
        </li>
        <?php
          if($_SESSION['role']=='ADMIN'){
            echo '<li class="nav-item"><a class="nav-link" href="manage-employee.php">Employees</a></li>';
          }
         ?>
        <li class="nav-item">
          <a class="nav-link" href="member-account.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-danger btn-md" href="logout.php">Log Out</a>
        </li>
      </ul>
    </nav>

    <div class="main">
      <div class="col-md-4 issue-requests">
        <h3>Issue Requests</h3>
        <div class="issue-results">
          <img src="../img/smile.svg" class="smile" alt="">
          <p>There are no pending issue requests!!</p>
        </div>
      </div>
      <div class="col-md-4 new-members">
        <h3>Activate Membership</h3>
        <div class="member-results">
          <img src="../img/smile.svg" class="smile" alt="">
          <p>There are no members pending activation!!</p>
        </div>
      </div>
    </div>

  </body>
</html>
