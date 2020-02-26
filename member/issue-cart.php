<?php
  session_start();
  if ($_SESSION['active']!='yes')
    header('Location: ../index.html');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Issue Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/issuecart.css">
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
          <a class="nav-link" href="dashboard-member.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="issue-cart.php">Issue Cart</a>
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
      <div class="col md-5 issue-books">
        <h2>Issue Books</h2>
        <div class="cart-results">
          <img src="../img/cart.svg" class="smile" alt="">
          <p>Your cart is empty!!</p>
        </div>
        <button type="button" name="button" class="btn btn-success h">Issue Request</button>
        <button type="button" name="button" class="btn btn-primary" onclick="window.location.href='dashboard-member.html'" >Go Back</button>
      </div>

    </div>

  </body>
</html>
