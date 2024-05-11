<?php include('../layouts/header.php'); ?>
<?php include('../db.php'); ?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
} 

$query = "SELECT * FROM `students` where `id` = '$id'";
$result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed.");
    }
    else{
        $row = mysqli_fetch_assoc($result);
    }
if(isset($_POST['update_student'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    
    // $query = "INSERT INTO `students` (`name`, `age`, `email`) VALUES ('$name', '$age', '$email')";
    $query = "update `students` set `name` = '$name',`age` = '$age',`email` = '$email' where `id` = '$id'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed.");
    }
    else{
        header('location:../index.php?message=Data Successfuly Updated');
    }
}
?>
<div class="container mt-5 justify-content-center">
    <div class="col-md-12 ">
        <form action="./update_student.php?id=<?php echo $id?>" method="POST" class="border p-4 rounded shadow">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo $row['name']?>">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" name="age" placeholder="Enter Age" value="<?php echo $row['age']?>">
          </div> 
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $row['email']?>">
          </div>
          <input type="submit" class=" mt-3 btn btn-success" name ="update_student" value="Add Student">
        </form>
    </div>

</div>

<?php include('../layouts/footer.php'); ?>