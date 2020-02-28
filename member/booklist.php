<?php
  $search = $_POST['srchtxt'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server".mysqli_connect_error()."</br>";
  else{
    $query = "select * from book where name like '%$search%' or author like '%$search%' or genre like '%$search%' or year like '%$search%' or type like '%$search%' or tags like '%$search%' and count!=0";

    $result = $connection->query($query) or die($connection->error);

    if(mysqli_num_rows($result) > 0){
      $var = "<table align='center' class='book-list'> <tr> <th>ID</th> <th>Name</th> <th>Author</th> <th>Year</th> <th>Genre</th> <th>Type</th> <th> Add </th> </tr>";
      while($row= $result->fetch_assoc()){
        $var = $var."<tr> <td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['author']}</td><td>{$row['year']}</td><td>{$row['genre']}</td><td>{$row['type']}</td><td><button class='btn btn-warning' onclick='add({$row['id']});'>Add</button></td></tr>";
      }
      $var = $var."</table>";
    }
    else{
      $var = "<p> No match Found!!</p>";
    }
    session_start();
    $_SESSION['book-list'] = $var;

    header('Location: dashboard-member.php');
  }
 ?>
