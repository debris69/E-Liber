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
    <link rel="stylesheet" href="../css/manage.css">
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
          <a class="nav-link" href="dashboard-employee.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="issue-requests.php">Issue Requests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-books.php">Add Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="manage-member.php">Members</a>
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

      <div class="col-md-8 member-manage">
        <h3>Manage Members</h3>
        <div class="search-section">
          <input type="text" class="search-box" name="" value="" placeholder="Search Member">
          <select class="dropdown" name="option">
            <option value="all">All</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
          <button type="button" class="btn btn-primary" name="button">Search</button>
        </div>
        <div class="search-result">

        </div>
      </div>

    </div>

  </body>
</html>
