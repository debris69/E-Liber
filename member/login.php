<html>
<body>
<?php
  $email = $_POST['email'];
  $pass  = md5($_POST['password']);

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server".mysqli_connect_error()."</br>";
  else{

    $query = "select * from member where email='$email' and password='$pass' limit 1";
    $result = $connection->query($query) or die($connection->error);
    $result = $result->fetch_assoc();

    if($result['email']==$email && $result['password']==$pass){
      session_start();
      $_SESSION['active']='yes';
      $_SESSION['name']=$result['name'];
      $_SESSION['id']=$result['id'];
      $_SESSION['email']=$result['email'];
      $_SESSION['status']=$result['status'];


      echo "<script> alert('Login Successful! Hello {$_SESSION["name"]}');
        window.location.replace('dashboard-member.php');
        </script>";

    }
    else{
      echo "<script> alert('Login Unsucessful! No Match Found!!');
      window.location.replace('login-member.html');
      </script>";
    }
  }

 ?>
</body>

</html>
