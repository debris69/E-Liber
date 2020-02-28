<?php
  session_start();
  if ($_SESSION['active-emp']!='yes')
    header('Location: ../index.html');
 ?>

 <?php
    include('connection.php');

    if(mysqli_connect_errno())
      echo mysqli_connect_error;
    else{
      $query = "select issue_request.id,member.name as member from issue_request inner join member where issue_request.member = member.id and issue_request.response='' limit 10";

      $result = $connection->query($query) or die($connection->error);

      if(mysqli_num_rows($result) > 0){
        $var = "<table align='center' cellpadding='16' class='issue-list'> <tr> <th>ID</th><th>Member</th> </tr>";
        while($row = $result->fetch_assoc()){
          $var = $var."<tr><td>{$row['id']}</td><td>{$row['member']}</td></tr>";
        }
        $var = $var."</table>";
      }
      else{
        $var = "<img src='../img/smile.svg' class='smile'><p>There are no pending issue requests!!</p>";
      }

      $_SESSION['dash-request'] = $var;

      $query = "select id,name from member where status='INACTIVE' order by id desc limit 10";

      $result = $connection->query($query) or die($connection->error);

      if(mysqli_num_rows($result) > 0){
        $var = "<table align='center' cellpadding='16' class='member-list'> <tr> <th>ID</th><th>Member</th> </tr>";
        while($row = $result->fetch_assoc()){
          $var = $var."<tr><td>{$row['id']}</td><td>{$row['name']}</td></tr>";
        }
        $var = $var."</table>";
      }
      else{
        $var = "<img src='../img/smile.svg' class='smile'><p>There are no members pending activation!!</p>";
      }

      $_SESSION['dash-member'] = $var;
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
      .member-results{
        overflow-y: scroll;
        overflow-x: hidden;
        height: 650px;
        margin-left: 0px;
        margin-top:30px;
      }

      .member-list td{
        font-family: Roboto;
        text-align: center;
        background: #fcf8e8;
        padding: 25px 90px;
        border-bottom: .3px solid grey;
      }
      .member-list th{
        font-family: Roboto;
        text-align: center;
        padding: 20px 90px;
        background: #010a43;
        color: #f1f3f4;
      }
      .issue-results{
        overflow-y: scroll;
        overflow-x: hidden;
        height: 650px;
        margin-left: 0px;
        margin-top: 30px;

      }

      .issue-list td{
        font-family: Roboto;
        text-align: center;
        background: #fcf8e8;
        padding: 25px 90px;
        border-bottom: .3px solid grey;
      }
      .issue-list th{
        font-family: Roboto;
        text-align: center;
        padding: 20px 90px;
        background: #010a43;
        color: #f1f3f4;
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
            <script type="text/javascript">
              document.getElementsByClassName('issue-results')[0].innerHTML = "<?php echo $_SESSION['dash-request']; ?>";
            </script>
        </div>
      </div>
      <div class="col-md-4 new-members">
        <h3>Activate Membership</h3>
        <div class="member-results">
          <script type="text/javascript">
            document.getElementsByClassName('member-results')[0].innerHTML = "<?php echo $_SESSION['dash-member']; ?>"
          </script>
        </div>
      </div>
    </div>

  </body>
</html>
