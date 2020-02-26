<?php
  session_start();
  if ($_SESSION['active']!='yes')
    header('Location: ../index.html');
  if ($_SESSION['status']=='INACTIVE'){
    echo "<script> alert('Your membership is not active!');</script>";
  }
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
          <a class="nav-link active" href="dashboard-member.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="issue-cart.php">Issue Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="return-books.php">Return</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="member-account.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-danger btn-md" href="logout.php">Log Out</a>
        </li>
      </ul>
    </nav>

    <div class="main">
      <div class="row">
        <div class="col-md-3 borrowed-books">
          <h3>Borrowed Books</h3>
          <div class="borrowed-results">
            <img src="../img/book.svg" class="smile" alt="">
            <p>You don't have any borrowed books!!</p>
          </div>

        </div>
        <div class="col-md-8 search-books">
          <h3>Search Books</h3>
          <div class="search-section">
            <input type="text" class="search-box" name="" value="" placeholder="Browse our collection">
            <button type="button" class="btn btn-primary" name="button">Search</button>
          </div>
          <div class="search-results">

          </div>
        </div>
      </div>

    </div>

  </body>
</html>
