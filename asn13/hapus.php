<?php include 'db_connect.php'; ?>

<?php
$id = $_GET['id_booking'];
$query = "DELETE FROM booking WHERE id_booking=$id";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>