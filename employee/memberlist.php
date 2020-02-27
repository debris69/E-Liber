<?php
  $search = $_POST['srchtxt'];
  $option = $_POST['option'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server".mysqli_connect_error()."</br>";
  else{

    if($option=='all'){
      $query = "select * from member where name like '%{$search}%'";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<style> .member-list th{ padding: 15px 70px;}</style><table align='center' cellpadding='16' class='member-list'><tr><th>ID</th> <th>Name</th> <th> E-mail </th> <th> Status </th> </tr>";
        while($row = $result->fetch_assoc()){
          $var = $var."<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['status']."</td></tr>";
        }
        $var = $var."</table>";
      }
      else{
        $var = "<p>No match found!!</p>";
      }
    }

    if($option=='active'){
      $query = "select * from member where name like '%{$search}%' and status='ACTIVE'";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<table align='center' cellpadding='16' class='member-list'><tr> <th>ID</th> <th>Name</th> <th> E-mail </th> <th> Status </th> <th> Change</th></tr>";
        while($row = $result->fetch_assoc()){
          $var = $var ."<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['status']}</td><td><button class='btn btn-danger' onclick='deactivate({$row['id']})'>Deactivate</button></td></tr>";
        }
        $var = $var."</table>";
      }
      else{
        $var = "<p>No match found!!</p>";
      }
    }

    if($option=='inactive'){
      $query = "select * from member where name like '%$search%' and status='INACTIVE'";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<table align='center' cellpadding='16' class='member-list'><tr> <th>ID</th> <th>Name</th> <th> E-mail </th> <th> Status </th> <th> Change</th></tr>";
        while($row = $result->fetch_assoc()){
          $var = $var ."<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['status']}</td><td><button class='btn btn-success' onclick='activate({$row['id']})'>Activate</button></td></tr>";
        }
        $var = $var."</table>";
      }
      else{
        $var = "<p>No match found!!</p>";
      }
    }

    session_start();
    $_SESSION['member-list']= $var;

    header('Location: manage-member.php');

  }
 ?>
