<?php
    //Koneksi ke database
    $conn = mysqli_connect('localhost', 'root', '', 'dumb_hero');

    //Cek koneksi
    if(!$conn){
        echo 'Connection error' . mysqli_connect_error();
    }
?>
