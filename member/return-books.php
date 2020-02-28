<?php
  session_start();
  if ($_SESSION['active']!='yes')
    header('Location: ../index.html');

  include('connection.php');
  $_SESSION['return-set'] = "<img src='../img/book.svg' class='smile'><p>You don't have any borrowed books yet!!</p>";
  if($_SESSION['borrowed']!=0){
    if(mysqli_connect_errno())
      echo mysqli_connect_error();
      else{
        $query = "select book.name,borrowed_book.id from book inner join borrowed_book where borrowed_book.book = book.id and borrowed_book.member={$_SESSION['id']}";
        $result = $connection->query($query) or die($connection->error);
        if(mysqli_num_rows($result)>0){
          $var = "<table align='center' class='borrow-list'> <tr><th>Name</th> <th>Return</th></tr>";
          while($row = $result->fetch_assoc()){
            $var = $var."<tr><td>{$row['name']}</td><td> <button class='btn btn-danger' onclick='returnBook({$row['id']});'>Return</button></td></tr>";
          }
          $var = $var."</table>";
          $_SESSION['return-set'] = $var;
        }

      }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Return Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/returnbooks.css">
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
      .return-books{
        margin-bottom: 250px;
      }
      .borrow-list td{
        font-family: Roboto;
        text-align: center;
        padding: 20px 99px;
        border: .5px solid grey;
        background: #fcf8e8;

      }
      .borrow-list th{
        font-family: Roboto;
        text-align: center;
        padding: 15px 99px;
        background: #010a43;
        color: #f1f3f4;
      }

    </style>
    <script type="text/javascript">
      function returnBook(x){
        document.getElementById('return-id').value=x;
        document.getElementById('return-form').submit();
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
          <a class="nav-link" href="dashboard-member.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="issue-cart.php">Issue Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="return-books.php">Return</a>
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
      <form id="return-form" action="return.php" method="post" style="display:none;">
        <input type="number" name="id" id="return-id" value="">
      </form>
      <div class="col md-5 return-books">
        <h2>Return Books</h2>
        <div class="borrowed-results">

          <script type="text/javascript">
            document.getElementsByClassName('borrowed-results')[0].innerHTML = "<?php echo $_SESSION['return-set']; ?>"
          </script>
        </div>

      </div>

    </div>

  </body>
</html>
