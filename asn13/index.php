<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Booking Hotel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('https://lh3.googleusercontent.com/p/AF1QipMZpBblkGSLNgcgeVifgYrSsyDhRXleZeQ82nGh=s1360-w1360-h1020-rw');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 30px;
            border-radius: 20px;
            max-width: 90%;
            overflow-x: auto;
            color: white;
        }

        h2 {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .add-btn {
            display: inline-block;
            background-color:rgb(50, 70, 170);
            color: white;
            padding: 10px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .add-btn:hover {
            background-color:rgb(27, 39, 99);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #555;
        }

        th {
            background-color: #1f2937;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-edit {
            background-color:rgb(50, 70, 170);
            color: white;
        }

        .btn-edit:hover {
            background-color:rgb(27, 39, 99);
        }

        .btn-hapus {
            background-color:rgb(227, 13, 13);
            color: white;
        }

        .btn-hapus:hover {
            background-color:rgb(153, 10, 10);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Booking Hotel</h2>
    <a href="tambah.php" class="add-btn">+ Tambah Data</a>

    <table>
        <tr>
            <th>ID Booking</th>
            <th>Nama Tamu</th>
            <th>Tipe Kamar</th>
            <th>Tanggal Check-in</th>
            <th>Tanggal Check-out</th>
            <th>Status Pembayaran</th>
            <th>Aksi</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM booking");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>".$row['id_booking']."</td>
                <td>".$row['nama_tamu']."</td>
                <td>".$row['tipe_kamar']."</td>
                <td>".$row['tanggal_check_in']."</td>
                <td>".$row['tanggal_check_out']."</td>
                <td>".$row['status_pembayaran']."</td>
                <td>
                    <a class='btn btn-edit' href='edit.php?id_booking=".$row['id_booking']."'>Edit</a>
                    <a class='btn btn-hapus' href='hapus.php?id_booking=".$row['id_booking']."' onclick=\"return confirm('Yakin hapus?');\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
