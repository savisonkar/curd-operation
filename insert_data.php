

<?php include("dbcon.php") ?>
<?php 
  
  if(isset($_POST['add_students'])){
      $fname = $_POST['f_name'];
      $lname = $_POST['l_name'];
      $age = $_POST['age'];

      if($fname==""||empty($fname)){
        header("location:index.php?massege=you need to fill in tha first name!");
      }
      else{
       $query= "insert into `students` (`first_name`,`last_name`,`age`) values ('$fname','$lname', '$age')";

       $result = mysqli_query($connection , $query);

       if(!$result){
        die("query failed".mysqli_errno($connection));
       }

       else{
         header("location:index.php?insert_msg= You data has been added sucessfully ");
       }

      }

  }
?>

