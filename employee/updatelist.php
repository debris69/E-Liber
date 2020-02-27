<?php
  $search = $_POST['srchtxt'];
  $option = $_POST['option'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server".mysqli_connect_error()."</br>";
  else{

    if($option=='id'){
      $query = "select * from book where id=$search";
    }
    else{
      $query = "select * from book where name like '%$search%'";
    }

    //execute query
    $result = $connection->query($query) or die($connection->error);

    //check rows
    if(mysqli_num_rows($result) > 0){
      $var = "<table align='center' cellpadding='16' class='update-list'> <tr> <th> ID </th> <th> Name </th> <th> Count </th> <th> Update </th> </tr>";
      $i = 0;
      while($row= $result->fetch_assoc()){

        $var = $var."<tr> <td>".$row['id']."</td><td>".$row['name']."</td><td> <input type='number' class='count' id='count-$i' value='{$row['count']}'>"."</td><td><input type='submit' value='Change' class='btn btn-warning' onclick='submitForm($i,{$row['id']});'></td> </form></tr>";
        $i += 1;
      }
      $var = $var."</table>";
    }
    else{
      $var = "<h3>No Match Found!!</h3>";
    }

    session_start();
    $_SESSION['update-list'] = $var;

    header('Location: add-books.php');


  }
 ?>
