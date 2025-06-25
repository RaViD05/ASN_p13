<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Booking</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            display: flex;
            height: 100%;
            font-family: Arial, sans-serif;
            background-image: url('https://lh3.googleusercontent.com/p/AF1QipMZpBblkGSLNgcgeVifgYrSsyDhRXleZeQ82nGh=s1360-w1360-h1020-rw');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            align-items: center;
            justify-content: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        form {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center; 
            text-align: center;
        }

        form label {
            width: 100%;
            text-align: left;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: none;
            text-align: center;
        }

        button {
            background-color:rgb(50, 70, 170);
            color: white;
            cursor: pointer;
            width: 50%;
            padding: 8px;
            margin: 8px 0;
            border-radius: 5px;
            border: none;
        }

        button:hover {
            background-color:rgb(27, 39, 99);
        }
    </style>
</head>
<body>

<form method="POST" action="">
    <h2>Form Booking Hotel</h2><br>
    Id Booking <input type="text" name="id_booking" required><br>
    Nama Tamu <input type="text" name="nama_tamu" required><br>
    Tipe Kamar <input type="text" name="tipe_kamar" required><br>
    Tanggal Check-in <input type="date" name="tanggal_check_in" required><br>
    Tanggal Check-out <input type="date" name="tanggal_check_out" required><br>
    Status Pembayaran <input type="text" name="status_pembayaran" required><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $id = $_POST['id_booking'];
    $nama = $_POST['nama_tamu'];
    $tipe_kamar = $_POST['tipe_kamar'];
    $tanggal_checkin = $_POST['tanggal_check_in'];
    $tanggal_checkout = $_POST['tanggal_check_out'];
    $status_pembayaran = $_POST['status_pembayaran'];

    $query = "INSERT INTO booking (id_booking, nama_tamu, tipe_kamar, tanggal_check_in, tanggal_check_out, status_pembayaran) 
                VALUES ('$id', '$nama', '$tipe_kamar', '$tanggal_checkin', '$tanggal_checkout', '$status_pembayaran')";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

</body>
</html>