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
    <script type="text/javascript">

    </script>
    <style media="screen">
    ::-webkit-scrollbar {
      width: 3px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
      background: #3d3d3d;
    }

    .search-result{
      overflow-y: scroll;
      overflow-x: hidden;

      height: 500px;
    }

    .member-list{
      margin-top: 25px;
    }

    .search-result p{
      margin-top: 40px;
      font-family: Roboto;
      font-size: 130%;
    }

    .member-list th{
      font-family: Roboto;
      text-align: center;
      padding: 15px 50px;
      background: #010a43;
      color: #f1f3f4;
    }

    .member-list td{
      font-family: Roboto;
      text-align: center;
      background: #fcf8e8;
      border-bottom: .3px solid grey;
    }

    </style>
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
          <form id="member-search" action="memberlist.php" method="post">
          <input type="text" class="search-box" name="srchtxt" value="" placeholder="Search Member">
          <select class="dropdown" name="option">
            <option value="all">All</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
          <button type="button" class="btn btn-primary" onclick="document.getElementById('member-search').submit();" name="button">Search</button>
        </form>
        </div>
        <div class="search-result">
          <script>
            document.getElementsByClassName('search-result')[0].innerHTML="<?php echo $_SESSION['member-list'] ?>";
          </script>
        </div>
      </div>

    </div>

  </body>
</html>
