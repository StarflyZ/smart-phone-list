<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Produk</title>
</head>
<body>
    <h1>Tambah Produk Baru</h1>
    <form action="../insert_process.php" method="post" enctype="multipart/form-data">
    <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br><br>

        <label for="deskripsi_pendek">Deskripsi Pendek:</label><br>
        <input type="text" id="deskripsi_pendek" name="deskripsi_pendek"><br><br>
        
        <label for="deskripsi_panjang">Deskripsi Panjang:</label><br>
        <textarea id="deskripsi_panjang" name="deskripsi_panjang"></textarea><br><br>
        
        <label for="gambar">Gambar:</label><br>
        <input type="file" id="gambar" name="gambar"><br><br>
        
        <input type="submit" value="Simpan">
    </form>
    <br><br>
    <a href="../list"><button>Kembali ke Halaman Home</button></a>
</body>
</html>