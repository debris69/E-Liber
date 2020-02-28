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
    <link rel="stylesheet" href="../css/issuerequest.css">
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

    .issue-results{
      overflow-y: scroll;
      overflow-x: hidden;
      height: 600px;
      margin-left: 0px;
      margin-top: 60px;
    }


    .issue-list th{
      font-family: Roboto;
      text-align: center;
      padding: 15px 30px;
      background: #010a43;
      color: #f1f3f4;
    }
    .issue-list td{
      font-family: Roboto;
      text-align: center;
      background: #fcf8e8;
      padding: 15px 30px;
      border-bottom: .3px solid grey;
    }

      .drpdwn{
        width: 260px;
        height: 40px;
        padding: 5px;
        margin-left: 180px;
        margin-right: 30px;
        float: left;
        font-family: Roboto;
      }
      .btn{
        float:left;
      }
      .srch-section{
        margin-top: 20px;
      }

    </style>
    <script type="text/javascript">
      function accept(x){
        document.getElementById('response-id').value=x;
        document.getElementById('response').value = 'accept';
        document.getElementById('response-form').submit();
      }
      function reject(x){
        document.getElementById('response-id').value=x;
        document.getElementById('response').value = 'reject';
        document.getElementById('response-form').submit();
      }
    </script>
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
          <a class="nav-link active" href="issue-requests.php">Issue Requests</a>
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
      <form id="response-form" action="update-response.php" method="post" style="display:none;">
        <input type="number" name="id" id='response-id' value="">
        <input type="text" name="response" id='response' value="">
      </form>
      <div class="col-md-8 issue-requests">
        <h3>Issue Requests</h3>
        <div class="srch-section">
          <form class="" action="issuelist.php" method="post">
            <select class="drpdwn" name="option">
              <option value="pending">Pending</option>
              <option value="accepted">Accepted</option>
              <option value="rejected">Rejected</option>
              <option value="all">All</option>
            </select>
            <input type="submit" class="btn btn-primary" name="" value="Get Requests">
          </form>
        </div>
        <div class="issue-results">
          <script type="text/javascript">
            document.getElementsByClassName('issue-results')[0].innerHTML="<?php echo $_SESSION['request-list'] ?>";
          </script>
        </div>
      </div>

  </body>
</html>
