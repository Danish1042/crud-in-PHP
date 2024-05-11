<?php include('./db.php'); ?>
<?php include('./layouts/header.php'); ?>
<div class="container">
    <div class="row justify-content-center">
        <h3>CRUD Application in PHP</h3>
        <div class="col-md-12">
            <!-- <form action="" class="border p-4 rounded shadow"></form> -->

            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD Students</button> -->
            <!-- <input type="submit" class="btn btn-primary" value="Add Student"> -->
            <?php
                if(isset($_GET['message'])){
                    echo "<h5>".$_GET['message']."</h5>";
                }
            ?>
            <a href="./crud/add_student.php" type="submit" class="btn btn-primary">Add Student</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM `students`";
                        $result = mysqli_query($connection, $query);
                        if(!$result){
                            die("Query Failed.");
                        }
                        else{
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td>
                                            <a href="./crud/update_student.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                            <a href="./crud/delete_student.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php include('./layouts/footer.php'); ?>