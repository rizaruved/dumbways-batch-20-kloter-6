<?php

    include('config/dbConfig.php');

    $id = $_GET['role_id'];
    //Query untuk semua item di table heroes_tb
    $sql = "SELECT * FROM `hero` AS h INNER JOIN `role` AS r ON h.id_role = r.role_id WHERE id_role = ('$id')";

    //Membuat query dan menyimpan hasilnya dalam variabel result
    $result = mysqli_query($conn, $sql);

    //Fetch hasil query sebagai associative array
    $heroes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    //Free Memory
    mysqli_free_result($result);

    //Menutup koneksi
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<!-- Header di-include dengan PHP untuk reusability -->
<?php include('includes/header.php'); ?>

  <!-- Page Content -->
  <div class="container my-5">
    <!-- Page Features -->
    <div class="row text-center">

    <?php foreach($heroes as $hero): ?>
      <div class="col-lg-3 col-md-6 mb-4 card-text-allignment">
        <div class="card h-100">
          <a href="details.php?id=<?php echo $hero['id']?>"><img class="card-img-top" src="<?php echo ($hero['image']);?>" style="height:400px"></a>
          <div class="card-body">
            <a href="details.php?id=<?php echo $hero['id']?>"><h4 class="card-title"><?php echo ($hero['name']);?></h4></a>
            <a href="roleDetail.php?id=<?php echo $hero['role_id']?>"><h6 class="card-subtitle mb-2 text-muted"><?php echo ($hero['role_name']);?></h6></a>
            <!-- <a href="details.php?id=<?php echo $hero['id']?>" class="btn btn-primary">Selengkapnya...</a> -->
          </div>
        </div>
      </div>
    <?php endforeach; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer di-include dengan PHP untuk reusability -->
  <?php include('includes/footer.php'); ?>

</html>
