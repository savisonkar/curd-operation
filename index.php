<?php include("header.php") ?>
<?php include("dbcon.php") ?>

<script>
      function deleteConfirm(id){
            if(confirm("Are You Sure To  Delete This Record")){
                window.location.href = "delete_page.php?id=" + id;

            }
      }
</script>
<div class="box1">
      <h1>ALL STUDENTS</h1>
      <button  class="btn btn-primary" data-toggle="modal" data-target="#btn">
        ADD STUDENTS
        </button>

</div>
<table class="table table-hover table-bordered table-striped t1">
      <thead>
            <tr>
                  <th>ID</th>
                  <TH>FIRST NAME</TH>
                  <TH>LAST NAME</TH>
                  <TH>AGE</TH>
                  <th>UPDATE</th>
                  <th>DELETE</th>
            </tr>
      </thead>

      <Tbody>
            <?php
            $query = "select * from students";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                  die("query failed" . mysqli_errno($connection));
            } 
            else {
                  while ($row = mysqli_fetch_assoc($result)) {
            ?>

                        <tr>
                              <td><?php echo $row["id"]; ?></td>
                              <td><?php echo $row["first_name"]; ?></td>
                              <td><?php echo $row["last_name"]; ?></td>
                              <td><?php echo $row["age"]; ?></td>
                              <td> <a href="update_page1.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</a></td>
                              <!-- <td> <a href="delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td> -->

                              <td>  <a href="javascript:void(0)" 
       onclick="deleteConfirm(<?php echo $row['id']; ?>)" 
       class="btn btn-danger">
       Delete
    </a></td>

                        </tr>
            <?php
                  }
            }

            ?>


      </Tbody>
</table>

    <?php 
       if(isset($_GET['massege'])){
      echo "<h5>"."$_GET[massege]"."</h5>";
       }
    ?>

   <?php 
       if(isset($_GET['insert_msg'])){
      echo "<h5>"."$_GET[insert_msg]"."</h5>";
       }

       if(isset($_GET['update_msg'])){
            echo "<h5>"."$_GET[update_msg]"."</h5>";
             }

      if(isset($_GET['delete_msg'])){
            echo "<h5>"."$_GET[delete_msg]"."</h5>";
            }
    ?>

    
<!-- Modal -->
<form action="insert_data.php" method="post">
<div class="modal fade" id="btn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               <?php 

               ?>
            <div class="form-group">
                  <label for="f_name">First Name</label>
                  <input type="text" name="f_name" class="form-control">

                  <label for="l_name">Last Name</label>
                  <input type="text" name="l_name" class="form-control">

                  <label for="age">Age</label>
                  <input type="text" name="age" class="form-control">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD"/>
      </div>
    </div>
  </div>
</div>
</form>
<?php include("footer.php") ?>