<?php

include('config/dbConfig.php');

// MENDAPATKAN ID POST YANG INGIN DIEDIT
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `hero` AS h INNER JOIN `role` AS r ON h.id_role = r.role_id WHERE id = $id;";
    // $sql .= "SELECT * FROM 'role'";
    
    $result = mysqli_query($conn, $sql);
    $heroes = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Header di-include dengan PHP untuk reusability -->
<?php include('includes/header.php'); ?>

  <div class="container my-5">
    <!-- FORM EDIT HERO -->
    <form action="editAction.php" method="POST" enctype="multipart/form-data">
      
      <h3>Edit Hero</h3>
    
      <!-- ID HERO HIDDEN -->
      <input type="hidden" name="id" value="<?php echo $heroes['id']; ?>">

      <!-- INPUT NAMA HERO -->
      <div class="form-group">
        <label for="nama">Nama Hero:</label>
        <input type="text" class="form-control" name="name" value="<?php echo $heroes['name']; ?>">
      </div>
      
      <!-- SELECT ROLE HERO -->
      <div class="form-group">
        
        <label class="my-1 mr-2" for="role_id">Role Hero: </label>
        <!-- Role Selection -->
        <select class="custom-select my-1 mr-sm-2" name='role_id'>
          <option selected>Role...</option>
            <option value="1">Assassin</option>
            <option value="2">Fighter</option>
            <option value="3">Mage</option>
            <option value="4">Marksman</option>
            <option value="5">Support</option>
            <option value="6">Tank</option>
        </select>
      </div>

      <!-- DESKRIPSI HERO -->
      <div class="form-group">
        <label for="description">Deskripsi Hero:</label>
        <textarea class="form-control" rows="3" name="description"><?php echo $heroes['description']; ?></textarea>
      </div>
      
      <!-- UPLOAD GAMBAR HERO -->
      <div class="form-group">
        <label for="image">Gambar Hero:</label>
        <input type="file" class="form-control-file" name="image">
        <br>
        <p>*Accepted file type: .jpg .jpeg .png .gif .webp</p>
      </div>
      
      <button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Submit</button>

    </form>

  </div>

    <!-- Footer di-include dengan PHP untuk reusability -->
  <?php include('includes/footer.php'); ?>

</html>
