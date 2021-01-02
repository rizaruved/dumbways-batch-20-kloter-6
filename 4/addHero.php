<?php

include('config/dbConfig.php');

      // HANDLE UPLOAD GAMBAR
      if (isset($_FILES['image'])) {
        
        $ext_error = false;
        // Ekstensi file gambar yang dibolehkan
        $extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
        //Nama File
        $file = $_FILES['image']['name'];
        // Memecah antara nama file dan ekstensi
        $file_ext = explode('.', $file);
        // Mendapatkan ekstensi gambar yang diupload
        $file_ext = strtolower(end($file_ext));

        // Mengecek apakah ekstensi gambar yang diupload dibolehkan sesuai yang ada di var $extensions
        if(!in_array($file_ext, $extensions)) {
            $ext_error = true;
        }

        // Jika nilai kode errornya tidak sama dengan 0 (gagal upload), maka akan menampilkan pesan sesuai yang ada di list kode error
        if($_FILES['image']['error']) {
            echo "errorrrrr";
        }
        elseif($ext_error) {
            echo "Ekstensi file yang diupload tidak valid!";
        }
        else {
            echo "Upload berhasil!";
        }

        // Memindahkan gambar yang diupload ke folder /img
        move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$_FILES['image']['name']);
        $fileName = "img/".$file;
      }
      
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $role_id = $_POST['role_id'];
    $description = $_POST['description'];

    $sql = "INSERT INTO hero (name, id_role, image, description) VALUES ('$name', '$role_id', '$fileName', '$description')";

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
    <form action="addHero.php" method="POST" enctype="multipart/form-data">
      
      <h3>Tambah Hero Baru</h3>
      <!-- INPUT NAMA HERO -->
      <div class="form-group">
        <label for="nama">Nama Hero:</label>
        <input type="text" class="form-control" name="name" placeholder="Nama hero...">
      </div>
      
      <!-- SELECT ROLE HERO -->
      <div class="form-group">
        <?php
          $sql2 = 'SELECT * FROM role';
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
        <textarea class="form-control" rows="3" name="description" placeholder="Deskripsi hero..."></textarea>
      </div>
      
      <!-- UPLOAD GAMBAR HERO -->
      <div class="form-group">
        <label for="image">Gambar Hero:</label>
        <input type="file" class="form-control-file" name="image">
        <br>
        <p class="">*Accepted file type: .jpg .jpeg .png .gif .webp</p>
      </div>
      
      <button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Submit</button>
    </form>

  </div>

    <!-- Footer di-include dengan PHP untuk reusability -->
  <?php include('includes/footer.php'); ?>

</html>
