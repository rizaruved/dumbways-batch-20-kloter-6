<?php

    include('config/dbConfig.php');

    // Untuk Menghapus tiap post
    if(isset($_POST['delete'])){
        $id_to_delete = $_POST['id_to_delete'];

        $sql = "DELETE FROM hero WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)) {
            //Berhasil
            header('Location: index.php');
        } else {
            //Gagal
            echo 'Query error: ' . mysqli_error($conn);
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM `hero` AS h INNER JOIN `role` AS r ON h.id_role = r.role_id WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $hero = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

?>

<!DOCTYPE html>
<html lang="en">

<!-- Header di-include dengan PHP untuk reusability -->
<?php include('includes/header.php'); ?>

<div class="container my-5">
  
  <!-- Page Features -->
  <div class="row text-center">

    <?php if($hero): ?>
      <div class="col-lg-3 col-md-6 mb-4 card-text-allignment">
          <div class="card h-100">
            <img class="card-img-top" src="<?php echo ($hero['image']);?>" style="height:425px">
          </div>
      </div>

      <div class="col-md-6 mb-4 card-text-allignment">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title"><i><?php echo ($hero['name']);?></i></h4>
            <br>
            <h6>Role: <i><?php echo ($hero['role_name']);?></i></h6>
            <h6>Description:</h6>
            <h6 class="card-subtitle mb-2 text-muted"><i><?php echo ($hero['description']);?></i></h6>
          </div>

          <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $hero['id']?>">
              <!-- EDIT BUTTON -->
              <a href="edit.php?id=<?php echo $hero['id']?>" class="btn btn-success btn-block">Edit</a>
              <!-- DELETE BUTTON -->
              <a href=""><input type="submit" name="delete" value="Delete" class="btn btn-danger btn-block"></a>
          </form>
        </div>
      </div>

      
    <?php endif; ?>

  </div>
  <!-- /.row -->

</div>
<!-- END CONTAINER -->

  <!-- Footer di-include dengan PHP untuk reusability -->
  <?php include('includes/footer.php'); ?>

</html>
