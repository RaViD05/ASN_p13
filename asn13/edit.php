<?php include 'db_connect.php'; ?>

<?php
$id = $_GET['id_booking'];
$data = mysqli_query($conn, "SELECT * FROM booking WHERE id_booking=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
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

        .form-container {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 30px 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 400px;
            color: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
        }

        .form-container input[type="text"],
        .form-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color:rgb(50, 70, 170);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        .form-container button:hover {
            background-color: #2563eb;
        }

        .form-container a {
            color: #3b82f6;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Booking</h2>
    <form method="POST" action="">
        <input type="text" name="nama_tamu" value="<?php echo $row['nama_tamu']; ?>" placeholder="Nama Tamu" required>
        <input type="text" name="tipe_kamar" value="<?php echo $row['tipe_kamar']; ?>" placeholder="Tipe Kamar" required>
        <input type="date" name="tanggal_check_in" value="<?php echo $row['tanggal_check_in']; ?>" required>
        <input type="date" name="tanggal_check_out" value="<?php echo $row['tanggal_check_out']; ?>" required>
        <input type="text" name="status_pembayaran" value="<?php echo $row['status_pembayaran']; ?>" placeholder="Status Pembayaran" required>
        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama_tamu'];
        $tipe_kamar = $_POST['tipe_kamar'];
        $tanggal_checkin = $_POST['tanggal_check_in'];
        $tanggal_checkout = $_POST['tanggal_check_out'];
        $status_pembayaran = $_POST['status_pembayaran'];

        $query = "UPDATE booking SET nama_tamu='$nama', tipe_kamar='$tipe_kamar', tanggal_check_in='$tanggal_checkin', 
        tanggal_check_out='$tanggal_checkout', status_pembayaran='$status_pembayaran' WHERE id_booking=$id";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil diupdate!'); window.location.href='index.php';</script>";
        } else {
            echo "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</div>

</body>
</html>
