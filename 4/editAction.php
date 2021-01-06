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

    $name = $_POST['name'];
    $role_id = $_POST['role_id'];
    $description = $_POST['description'];
    $idr = $_POST['id'];

    $sql = "UPDATE hero SET id='$idr', name='$name', id_role='$role_id', image='$fileName', description='$description' WHERE id = $idr";

    //Menginput data hasil edit form ke Database
    if(mysqli_query($conn, $sql)){
        //Berhasil
        header('Location: index.php');
    //Gagal
    }else{
        echo 'Query error: ' . mysqli_error($conn);
    }

?>
