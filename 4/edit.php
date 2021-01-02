<?php

include('config/dbConfig.php');

    // MENDAPATKAN ID TIAP POST
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM `hero` WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $hero = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    //SUBMIT
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $role_id = $_POST['role_id'];
        $description = $_POST['description'];

        $sql = "UPDATE hero SET name='$name', id_role='$role_id, description='$description' WHERE id=$id";

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
    <form action="edit.php" method="POST" enctype="multipart/form-data">
      
      <h3>Edit Hero</h3>
      <!-- INPUT NAMA HERO -->
      <div class="form-group">
        <label for="nama">Nama Hero:</label>
        <input type="text" class="form-control" name="name" placeholder="<?php echo $hero['name'] ?>">
      </div>
      
      <!-- SELECT ROLE HERO -->
      <div class="form-group">
        <?php
          $sql2 = "SELECT * FROM 'role' ";
          $hasil = mysqli_query($conn, $sql2);
          $selections = mysqli_fetch_all($hasil, MYSQLI_ASSOC);
        ?>
        
        <label class="my-1 mr-2" for="role_id">Role Hero: </label>
        <!-- Role Selection -->
        <select class="custom-select my-1 mr-sm-2" name='role_id'>
          <option selected>Role...</option>
          <?php foreach($selections as $select): ?>
            <option value="<?php echo $select['role_id'] ?>"><?php echo $select['role_name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- DESKRIPSI HERO -->
      <div class="form-group">
        <label for="description">Deskripsi Hero:</label>
        <textarea class="form-control" rows="3" name="description" placeholder="<?php echo $hero['description'] ?>"></textarea>
      </div>
      
      <button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Submit</button>
    </form>

  </div>

    <!-- Footer di-include dengan PHP untuk reusability -->
  <?php include('includes/footer.php'); ?>

</html>
