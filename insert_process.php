<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $deskripsi_panjang = $_POST["deskripsi_panjang"];
    $deskripsi_pendek = $_POST["deskripsi_pendek"];
    
    // Mengunggah gambar ke server
    $gambar = $_FILES["gambar"]["name"];
    $gambar_temp = $_FILES["gambar"]["tmp_name"];
    $ext_gambar = pathinfo($gambar, PATHINFO_EXTENSION);
    
    // Lokasi penyimpanan gambar
    $gambar_location = "gambar/" . uniqid() . "." . $ext_gambar;

    // Mendapatkan nama produk dari form
    $nama_produk = $_POST["nama"];

    // Mengubah nama produk menjadi huruf kecil dan mengganti spasi dengan tanda "-"
    $url = strtolower(str_replace(" ", "-", $nama_produk));

    
    move_uploaded_file($gambar_temp, $gambar_location);
    
    // Insert data ke database
    $query = "INSERT INTO produk (nama, deskripsi_panjang, deskripsi_pendek, url_gambar, ext_gambar, url) 
              VALUES ('$nama', '$deskripsi_panjang', '$deskripsi_pendek', '$gambar_location', '$ext_gambar', '$url')";
    
    if (mysqli_query($con, $query)) {
        header("Location: list");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}
?>
