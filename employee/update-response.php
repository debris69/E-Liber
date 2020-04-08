<?php
  session_start();
  $id = $_POST['id'];
  $response = $_POST['response'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo mysqli_connect_error();
  else{

    if($response=='accept'){
      $query = "select count(*) as count from issue_request inner join borrowed_book where issue_request.member = borrowed_book.member and issue_request.id={$id}";
      $result = $connection->query($query) or die($connection->error);
      $result = $result->fetch_assoc();

      if($result['count']<2){

        $query = "update issue_request set response='ACCEPTED', employee={$_SESSION['id']}, response_time=CURRENT_TIMESTAMP where id=$id";
        if($connection->query($query)==TRUE){

          $query = "select member,book from issue_request where id=$id";
          $result = $connection->query($query) or die($connection->error);
          $result = $result->fetch_assoc();



          $query2  = "update book set count = (select count-1 from book where id={$result['book']}) where id={$result['book']}";
          if($connection->query($query2)==TRUE){
            $query = "insert into borrowed_book(member,book) values({$result['member']},{$result['book']})";
            if($connection->query($query)==TRUE){
              $_SESSION['request-list'] = '';
              echo "<script> alert('Response recorded!! Request Accepted!!');
              window.location.replace('issue-requests.php');
              </script>";
            }
          }


        }
      }

      else{
        $response = 'reject';
      }


    }

    if($response=='reject'){
      $query = "update issue_request set response='REJECTED', employee={$_SESSION['id']}, response_time=CURRENT_TIMESTAMP where id=$id";
      if($connection->query($query)==TRUE){
        $_SESSION['request-list'] = '';
        echo "<script> alert('Response recorded!! Request Rejected!!');
        window.location.replace('issue-requests.php');
        </script>";
      }
    }

  }

 ?>
