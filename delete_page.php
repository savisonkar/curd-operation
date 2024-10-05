<?php include('dbcon.php'); ?>   




<?php

  if(isset($_GET['id'])){
     $id=$_GET['id'];
  }

  echo  $query="DELETE  FROM `students` WHERE `id`={$id}";
   $resul =mysqli_query($connection,$query);

     if(!$resul){
          die("Query failed".mysqli_errno($connection));
     }
     else{
          header('location:index.php?delete_msg=you have delete record');
     }

?>
