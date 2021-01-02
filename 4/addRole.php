<?php

include('config/dbConfig.php');

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    
    $sql = "INSERT INTO `role` (`role_name`) VALUES ('$name')";

    //Menginput data form ke Database
    if(mysqli_query($conn, $sql)){
        //Berhasil
        header('Location: index.php');
    //Gagal
    }else{
        echo 'Query error: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Header di-include dengan PHP untuk reusability -->
<?php include('includes/header.php'); ?>

<div class="container my-5">
    <!-- FORM TAMBAH HERO -->
    <form action="addRole.php" method="POST">
      
      <h3>Tambah Role Baru</h3>
      <!-- INPUT NAMA HERO -->
      <div class="form-group">
        <label>Nama Role baru:</label>
        <input type="text" class="form-control" name="name" placeholder="Nama role...">
      </div>
      
      <button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
    </div>

    <!-- Footer di-include dengan PHP untuk reusability -->
  <?php include('includes/footer.php'); ?>

</html>
