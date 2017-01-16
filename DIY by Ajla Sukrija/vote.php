<?php
include "config.php";
session_start();

if (!isset($_GET['imageId']))
    die("Image ID ne postoji!");

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

// Provjerava da li je korisnik vec glasao
$imageId = $conn->real_escape_string($_GET['imageId']);
$userId = $conn->real_escape_string($_SESSION['user_id']);
$alreadyVoted = $conn->query("SELECT * FROM votes WHERE image_id=$imageId AND user_id=$userId ");
if ($alreadyVoted->num_rows > 0)
    die("Već ste glasali za sliku.");

$conn->query("INSERT INTO votes (image_id, user_id, created_at) VALUES ($imageId, $userId, NOW())");
echo "Uspješno ste glasali za sliku.";
$conn->close();
?>
