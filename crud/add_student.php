<?php include('../layouts/header.php'); ?>
<?php include('../db.php'); ?>
<?php 
if(isset($_POST['insert_student'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    
    $query = "INSERT INTO `students` (`name`, `age`, `email`) VALUES ('$name', '$age', '$email')";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed.");
    }
    else{
        header('location:../index.php?message=Data Successfuly Inserted');
    }
}
?>
<div class="container mt-5 justify-content-center">
    <div class="col-md-12 ">
        <form action="./add_student.php" method="POST" class="border p-4 rounded shadow">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" name="age" placeholder="Enter Age">
          </div> 
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Enter Email">
          </div>
          <input type="submit" class=" mt-3 btn btn-success" name ="insert_student" value="Add Student">
        </form>
    </div>

</div>

<?php include('../layouts/footer.php'); ?>