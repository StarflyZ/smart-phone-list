<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartphone Produk List</title>
    <style>
        .judul{
            font-family: Arial;
            text-align: center;
        }
        .button {
            display: inline-block;
            background-color: #007bff;  
            padding: 10px 20px;   
            font-size: 16px; 
            border-radius: 5px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
            margin-left: 4%;
        }

        .button:hover {
            background-color: #0056b3; 
        }

        .button:active {
            background-color: #00428a;
        }

        .button a{
            text-align: center;
            color: azure;
            text-decoration: solid;
        }
        #nama{
            display: inline-block;
            width: 100%;
            text-align: center;
            text-decoration: solid;
            font-size: 24px;
            font-family: Arial;
        }
        #img{
            width: 75%;
            height: 75%;
        }
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            width: auto;
            table-layout: fixed;
            margin-right: 4%;
            margin-left: 4%;
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
            text-align: center;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }
            
            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
            
            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }
            
            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: 20px;
                text-align: center;
            }
            
            table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
            
            table td:last-child {
                border-bottom: 0;
            }
        }
        .paging {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .paging a {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: var(--primary);
            background-color: var(--greyLight);
            border: 1px solid var(--greyLight);
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            font-size: 24px;
        }

        .paging a:hover {
            color: orangered;
            background-color: var(--primary);
        }


    </style>
</head>
<body>
    <h1 class="judul">Daftar Produk</h1>
    <button class="button"><a href="insert/insert-data-baru">Tambah Produk</a></button>
    <br><br>
   
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi Pendek</th>
            <th>Gambar</th>
        </tr>
        <?php
        include 'koneksi.php';

        // Jumlah item per halaman
        $items_per_page = 10;

        // Halaman saat ini
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Menghitung offset
        $offset = ($current_page - 1) * $items_per_page;


        // Menghitung total jumlah produk
        $total_query = "SELECT COUNT(*) as total FROM produk";
        $total_res = mysqli_query($con, $total_query);
        $total_row = mysqli_fetch_assoc($total_res);
        $total_produk = $total_row['total'];

        // Hitung total halaman
        $total_pages = ceil($total_produk / $items_per_page);

        // Query untuk mengambil data produk
        $query = "SELECT * FROM produk LIMIT $offset, $items_per_page";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
                echo "<td>".$row['idproduk']."</td>";
                echo "<td><a href='produk/".$row['url']."' id='nama'>".$row['nama']."</a></td>";
                echo "<td style='font-family: Arial'>".$row['deskripsi_pendek']."</td>";
                echo "<td><img src='".$row['url_gambar']."' width='100' id='img'></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <!-- Pagination -->
    <div class="paging">
        <?php for($i = 1; $i <= $total_pages; $i++) : ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
