<?php
  session_start();
  if ($_SESSION['active']!='yes')
    header('Location: ../index.html');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/myaccount.css">
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
          <a class="nav-link" href="manage-member.php">Members</a>
        </li>
        <?php
          if($_SESSION['role']=='ADMIN'){
            echo '<li class="nav-item"><a class="nav-link" href="manage-employee.php">Employees</a></li>';
          }
         ?>
        <li class="nav-item">
          <a class="nav-link active" href="member-account.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-danger btn-md" href="logout.php">Log Out</a>
        </li>
      </ul>
    </nav>

    <div class="main">
      <div class="col md-5 myaccount">
          <h2>My Account</h2>
          <img src="../img/user.png" class="img-user" alt="" align="center">
          <table align="center" cellpadding="15">
            <tr>
              <td id="headlines">Employee ID</td>
              <td>#<?php echo $_SESSION['id'] ?></td>
            </tr>
            <tr>
              <td id="headlines">Name</td>
              <td><?php echo $_SESSION['name'] ?></td>
            </tr>
            <tr>
              <td id="headlines">E-mail</td>
              <td><?php echo $_SESSION['email'] ?></td>
            </tr>
            <tr>
              <td id="headlines">Role</td>
              <td><?php echo $_SESSION['role'] ?></td>
            </tr>
          </table>
      </div>
    </div>

  </body>
</html>
