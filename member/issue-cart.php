<?php
  session_start();
  if ($_SESSION['active']!='yes')
    header('Location: ../index.html');
 ?>

 <?php
  $id = $_SESSION['id'];

  include('connection.php');
  if($_SESSION['cart']!=0){
    if(mysqli_connect_errno())
      echo "Failed to connect to server".mysqli_connect_error()."</br>";
    else{
      $query = "select book.id,book.name,issue_cart.id as cartid from issue_cart inner join book where book.id=issue_cart.book and member=$id ";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<table align='center' class='cart-list'> <tr><th>Book Id</th> <th> Name </th> <th> Send Request </th> <th>Remove</th> </tr>";
        while($row = $result->fetch_assoc()){
          $var = $var."<tr><td>{$row['id']}</td><td>{$row['name']}</td><td><button class='btn btn-success' onclick='send({$row['cartid']});'>Send</button></td><td><button class='btn btn-danger' onclick='remove({$row['cartid']});'>Remove</button></td></tr>";
        }
        $var= $var."</table>";
      }
      $_SESSION['cart-list']=$var;
    }
  }


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
    <style media="screen">
      .cart-list th{
        font-family: Roboto;
        text-align: center;
        padding: 15px 30px;
        background: #010a43;
        color: #f1f3f4;
      }
      .cart-list td{
        font-family: Roboto;
        text-align: center;
        background: #fcf8e8;
        padding: 12px 50px;
        border: .5px solid grey;
      }
    </style>
    <script type="text/javascript">
      function send(x){
        document.getElementById('send-id').value=x;
        document.getElementById('send-form').submit();
      }
      function remove(x){
        document.getElementById('delete-id').value=x;
        document.getElementById('delete-form').submit();
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
      <form id="send-form" action="send-request.php" method="post" style="display:none;">
        <input type="number" name="id" id="send-id" value="">
      </form>
      <form id="delete-form" action="delete-item.php" method="post" style="display:none;">
        <input type="number" name="id" id="delete-id" value="">
      </form>
      <div class="col md-5 issue-books">
        <h2>Issue Request</h2>
        <div class="cart-results">
          <img src="../img/cart.svg" class="smile" alt="">
          <p>Your cart is empty!!</p>
          <script type="text/javascript">
            var y = <?php echo $_SESSION['cart']; ?>;
            if(y>0){
              document.getElementsByClassName('cart-results')[0].innerHTML = "<?php echo $_SESSION['cart-list']?>";
            }
          </script>
        </div>
      </div>

    </div>

  </body>
</html>
