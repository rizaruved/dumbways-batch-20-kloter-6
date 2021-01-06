<?php 
// Code PHP untuk mencari 3 angka terbesar dan bukan genap di dalam sebuah array 
// Shaprizal Ibrahim
// Dicompile dari berbagai sumber
  
// FUNGSI UTAMA MENCARI TIGA ANGKA TERBESAR GANJIL
function tigaAngkaTerbesar($arr, $arr_size) 
{ 
    $i; $first; $second; $third;
  
    // Minimal harus ada 3 elemen
    if ($arr_size < 3)
    { 
        echo " Jumlah angka kurang dari 3! ";
        return;
    }
	
	// Menentukan tiga angka terbesar pada array ganjil
	$third = $second = $first = PHP_INT_MIN;
    
	for ($i = 0; $i < $arr_size ; $i ++)
    { 
        // Jika elemen saat looping i lebih besar dari elemen $first 
        if ($arr[$i] > $first) 
        { 
            $third = $second; 
            $second = $first; 
            $first = $arr[$i]; 
        } 
  
        // Jika arr[i] berada di antara $first dan $second, maka update $second 
        else if ($arr[$i] > $second) 
        { 
            $third = $second; 
            $second = $arr[$i]; 
        } 
  
        // Jika arr[i] berada di antara $second dan $third, maka update $third
		else if ($arr[$i] > $third) 
            $third = $arr[$i]; 
    } 
  
    echo "Nilai tertinggi pertama: ", $first, "\n";
	echo "Nilai tertinggi kedua: ", $second, "\n";
	echo "Nilai tertinggi ketiga: ", $third;
}

// Fungsi untuk memisahkan bilangan ganjil dan genap
function odd($arr)
{
	return (($arr%2)==1);
}

// ARRAY YANG MAU DIUJI DIMASUKKAN DI VARIABEL BERIKUT INI //
// ========================================================================== //

$arr = array(1,4,6,2,6,8,9,21,20,14,3,6,11,1,1,2,3,4,6,8,9,2,1,5,2,5,6,8,3,2);

// ========================================================================== //
// ARRAY YANG MAU DIUJI DIMASUKKAN DI VARIABEL BERIKUT INI //


//Memfilter array hanya terdiri dari bilangan ganjil
$oddArray = array_filter($arr, "odd");

// Menimpa nilai variabel $arr dengan nilai ganjil yg sudah disortir
$arr = $oddArray;

// Jumlah elemen pada $arr yang sudah disortir
$n = count($arr);


// JALANKAN FUNGSI UTAMA DISINI
tigaAngkaTerbesar($arr, $n);
  
?>
