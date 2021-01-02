<?php

  include('config/dbConfig.php');

    $id = $_GET['id'];
    //Query untuk semua item di table heroes_tb
    $sql = "SELECT * FROM `hero` AS h INNER JOIN `role` AS r ON h.id_role = r.role_id WHERE h.id = $id";
    $sql2 = "SELECT * FROM role";

    //Membuat query dan menyimpan hasilnya dalam variabel result
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);

    //Fetch hasil query sebagai associative array
    $heroes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $heroes2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    //Free Memory
    mysqli_free_result($result);
    mysqli_free_result($result2);

    //Menutup koneksi
    mysqli_close($conn);
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
        <input type="text" class="form-control" name="name" placeholder="<?php foreach($heroes as $hero1): echo $hero1['name']; endforeach; ?>">
      </div>
      
      <!-- SELECT ROLE HERO -->
      <div class="form-group">
        
        <label class="my-1 mr-2" for="role_id">Role Hero: </label>
        <!-- Role Selection -->
        <select class="custom-select my-1 mr-sm-2" name='role_id'>
          <option selected><?php foreach($heroes as $hero1): echo $hero1['role_name']; endforeach; ?></option>
          <?php foreach($heroes2 as $hero): ?>
            <option value="<?php echo $hero['role_id'] ?>"><?php echo $hero['role_name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- DESKRIPSI HERO -->
      <div class="form-group">
        <label for="description">Deskripsi Hero:</label>
        <textarea class="form-control" rows="3" name="description" placeholder="<?php foreach($heroes as $hero1): echo $hero1['description']; endforeach; ?>"></textarea>
      </div>

      <br>
      
      <button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Submit</button>
    </form>

    <?php 
      //SUBMIT
      if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $role_id = $_POST['role_id'];
        $description = $_POST['description'];

        $sql = "UPDATE hero SET name='$name', id_role='$role_id', description='$description' WHERE id = $id";

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

  </div>

    <!-- Footer di-include dengan PHP untuk reusability -->
  <?php include('includes/footer.php'); ?>

</html>
