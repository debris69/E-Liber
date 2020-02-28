<?php
  session_start();
  if ($_SESSION['active-emp']!='yes')
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
      function promote(x){
        document.getElementById('status-id').value=x;
        document.getElementById('status-role').value='ADMIN';
        document.getElementById('status-form').submit();
      }
      function demote(x){
        document.getElementById('status-id').value=x;
        document.getElementById('status-role').value='LIBRARIAN';
        document.getElementById('status-form').submit();
      }

      function activate(x){
        document.getElementById('status-id').value=x;
        document.getElementById('status-role').value='LIBRARIAN';
        document.getElementById('status-form').submit();
      }
      function deactivate(x){
        document.getElementById('status-id').value=x;
        document.getElementById('status-role').value='';
        document.getElementById('status-form').submit();
      }
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
      margin-top: 25px;
      height: 600px;
    }

    .employee-list{
      margin-top: 0px;
    }

    .search-result p{
      margin-top: 40px;
      font-family: Roboto;
      font-size: 130%;
    }

    .employee-list th{
      font-family: Roboto;
      text-align: center;
      padding: 15px 60px;
      background: #010a43;
      color: #f1f3f4;
    }

    .employee-list td{
      font-family: Roboto;
      text-align: center;
      background: #fcf8e8;
      border-bottom: .3px solid grey;
    }

    .member-manage{
      width: 60%;
      margin-left: 19%;
    }

    .search-box{
      margin-left: 164px;
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
          <a class="nav-link" href="manage-member.php">Members</a>
        </li>
        <?php
          if($_SESSION['role']=='ADMIN'){
            echo '<li class="nav-item"><a class="nav-link active" href="manage-employee.php">Employees</a></li>';
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

      <form id="status-form" action="update-role.php" method="post" style="display: none;">
          <input type="number" name="id" id="status-id" value="">
          <input type="text" name="role"  id="status-role" value="">
      </form>

      <div class="col-md-8 member-manage">
        <h3>Manage Employee</h3>
        <div class="search-section">
          <form id="employee-search" action="employeelist.php" method="post">
          <input type="text" class="search-box" name="srchtxt" value="" placeholder="Search Employee">
          <select class="dropdown" name="option">
            <option value="all">All</option>
            <option value="admin">Admin</option>
            <option value="librarian">Librarian</option>
            <option value="other">Unassigned</option>
          </select>
          <button type="button" class="btn btn-primary" onclick="document.getElementById('employee-search').submit();" name="button">Search</button>
        </form>
        </div>
        <div class="search-result">
          <script>
            document.getElementsByClassName('search-result')[0].innerHTML="<?php echo $_SESSION['employee-list'] ?>";
          </script>
        </div>
      </div>

    </div>

  </body>
</html>
