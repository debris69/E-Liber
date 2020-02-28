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

    .search-results{
      overflow-y: scroll;
      overflow-x: hidden;
      margin-top: 20px;
      height: 620px;
    }
    .book-list{

      margin-top: 0px;
    }

    .book-list th{
      font-family: Roboto;
      text-align: center;
      padding: 12px 30px;
      background: #010a43;
      color: #f1f3f4;
    }

    .book-list td{
      font-family: Roboto;
      text-align: center;
      background: #fcf8e8;
      padding: 20px 30px;
      border: .5px solid grey;
    }

    .search-box{
      width: 84%;
    }

    </style>
    <script type="text/javascript">
      function add(x){
        document.getElementById('cart-book').value=x;
        document.getElementById('add-cart').submit();
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
      <form id="add-cart" action="add-cart.php" method="post" style="display: none;">
        <input type="number" name="id" value="">
        <input type="number" name="book" id="cart-book" value="">
      </form>
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
            <form id="book-search" action="booklist.php" method="post">
              <input type="text" class="search-box" name="srchtxt" value="" placeholder="Browse our collection">
              <button type="button" class="btn btn-primary"  onclick="document.getElementById('book-search').submit();" name="button">Search</button>
            </form>
          </div>
          <div class="search-results">
              <script>
                document.getElementsByClassName('search-results')[0].innerHTML = "<?php echo $_SESSION['book-list'] ?>";
              </script>
          </div>
        </div>
      </div>

    </div>

  </body>
</html>
