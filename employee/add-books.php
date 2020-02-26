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
    <link rel="stylesheet" href="../css/addbooks.css">

    <script type="text/javascript">

      //update count function
      function submitForm(x,z){
        var y = 'count-';
        y = y.concat(x);
        document.getElementById('update-ct').value = document.getElementById(y).value;
        document.getElementById('update-id').value = z;
        document.getElementById('update-count').submit();

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

    .update-result{
      overflow-y: scroll;
      overflow-x: hidden;

      height: 500px;
    }
    .update-list{
      margin-left: 18px;
      margin-top: 0px;

    }

    .update-result{
      margin-top: 13px;
    }

    .update-list th{
      font-family: Roboto;
      text-align: center;
      padding: 6px;
      background: #010a43;
      color: #f1f3f4;
    }
    .update-list td{
      font-family: Roboto;
      text-align: center;
      background: #fcf8e8;
      border: .5px solid grey;
    }
    .count{
      width:60px;
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
          <a class="nav-link active" href="add-books.php">Add Books</a>
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

      <form id="update-count" action="update-count.php" method="post" style="display: none;">
        <input type="number" name="id" id="update-id" value="">
        <input type="number" name="count" id="update-ct" value="">
      </form>

      <div class="col-md-4 update-stock">
        <h3>Update Existing Book Count</h3>
        <div class="search-section">
          <form id="update-form" action="updatelist.php" method="post">


          <input type="text" class="search-box" name="srchtxt" value="" placeholder="Search to update">
          <select class="dropdown" name="option">
            <option value="name">Book Name</option>
            <option value="id">Book ID</option>
          </select>
          <button type="button" class="btn btn-primary" name="update" onclick="document.getElementById('update-form').submit();">Search</button>
        </form>
        </div>

        <div class="update-result">
          <script>
            document.getElementsByClassName('update-result')[0].innerHTML = "<?php echo $_SESSION['update-list'] ?>"
          </script>
        </div>

      </div>
      <div class="col-md-4 add-books">
        <h3>Add New Book</h3>
        <div class="addbook-form">
          <form class="" action="addbook.php" method="post">
            <table cellpadding="10" align="center">
            <tr>
              <td>Name</td>
              <td> <input type="text" name="name" value="" class="input-box"> </td>
            </tr>
            <tr>
              <td>Author</td>
              <td> <input type="text" name="author" value="" class="input-box"> </td>
            </tr>
            <tr>
              <td>Year</td>
              <td> <input type="text" name="year" value="" class="input-box" > </td>
            </tr>
            <tr>
              <td>Genre</td>
              <td> <input type="text" name="genre" value="" class="input-box"> </td>
            </tr>
            <tr>
              <td>Type</td>
              <td> <select class="dropdown type" name="type">
                <option value="Paperback">Paperback</option>
                <option value="Hardcover">Hardcover</option>
              </select> </td>
            </tr>
            <tr>
              <td>Count</td>
              <td> <input type="number" name="count" value="" class="input-box"> </td>
            </tr>
            <tr>
              <td>Tags</td>
              <td> <input type="text" name="tags" value="" class="input-box" placeholder=""> </td>
            </tr>
          </table>
          <input type="submit" class="btn btn-primary submit" name="submit" value="Add Book">
          </form>
        </div>
      </div>

    </div>

  </body>
</html>
