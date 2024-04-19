<?php 
include '../koneksi.php';
$url = $_GET['url'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $url; ?></title>
    <?php
    $nama = "SELECT name FROM produk";
    echo '<meta property="og:title" content="' . $nama . '">';
    $url_gambar = "SELECT url_gambar FROM produk";
    echo '<meta property="og:image" content="' . $url_gambar . '">';
    $deskripsi = "SELECT deskripsi_pendek FROM produk";
    echo '<meta property="og:description" content="' . $deskripsi . '">';
    echo '<meta property="og:description" content="' . $url . '">';
    ?>
    <style>
        body{
            background-color: #233142;
        }
        h1{
            font-family: Arial;
            color: #A5DEF1;
        }
        p{
            font-family: Tahoma;
            color: #A5DEF1;
        }
        .container {
            display: flex;
            justify-content: center;
        }
        .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 80%;
            max-width: 1600px; /* Maksimum lebar card */
            padding: 20px;
            border-radius: 8px;
            background-color: #36506C;
        }
        .product-image {
            width: 100%;
            max-width: 500px; /* Maksimum lebar gambar */
            margin-bottom: 20px;
        }
        .product-info {
            text-align: justify;
            margin-top: 20px;
        }
        .product-info h1{
            font-size: 36px;
            display: inline;
            font-weight: bold;
        }
        .produk-info p{
            color: black;
            font-size: 24px;
            font-weight: bold;
        }
        .back-btn {
            align-items: center;
            background-color: 	#00224D;
            border: 2px solid #111;
            border-radius: 8px;
            box-sizing: border-box;
            color: #111;
            cursor: pointer;
            display: flex;
            font-family: Inter,sans-serif;
            font-size: 16px;
            height: 48px;
            justify-content: center;
            line-height: 24px;
            max-width: 100%;
            padding: 0 25px;
            position: relative;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        a{
            text-decoration: solid;
            font-family: Arial;
            color: azure;
        }
        .back-btn:after {
            background-color: #111;
            border-radius: 8px;
            content: "";
            display: block;
            height: 48px;
            left: 0;
            width: 100%;
            position: absolute;
            top: -2px;
            transform: translate(8px, 8px);
            transition: transform .2s ease-out;
            z-index: -1;
        }

        .back-btn:hover:after {
            transform: translate(0, 0);
        }

        .back-btn:active {
            background-color: #00224D;
            outline: 0;
        }

        .back-btn:hover {
            outline: 0;
        }
        @media (max-width: 600px) {
            .container {
                flex-direction: column;
            }
            .card {
                width: 90%;
            }
            .back-btn {
                padding: 0 40px;
            }
        }
    </style>
</head>
<body>
    <button class="back-btn"><a href="../list">< Kembali ke Home</a></button>
    <br><br>
    <div class="container">
        <?php 
            //include '../koneksi.php';
            //$url = $_GET['url'];
            
            $sql = "SELECT * FROM produk WHERE url = '$url'";
            $res = mysqli_query($con, $sql);
            
            if(mysqli_num_rows($res) > 0){
                $row = mysqli_fetch_assoc($res);
                echo "<div class='card'>";
                echo "<img src='../".$row['url_gambar']."' class='product-image'>";
                    echo "<div class='product-info'>";
                        echo "<h1>".$row['nama']."</h1>";
                        echo "<p>".$row['deskripsi_panjang']."</p>";
                    echo "</div>";
                echo "</div>";
            } else {
                echo "Produk tidak ditemukan.";
            }
        ?>
    </div>
</body>
</html>