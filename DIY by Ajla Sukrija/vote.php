<?php
include "config.php";
session_start();

if (!isUserLogedIn()) {
    http_response_code(500);
    die("Samo logovani korisnici mogu glasati za slike!");
}

if (!isset($_POST['imageId'])) {
    http_response_code(500);
    die("Image ID ne postoji!");
}

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

// Provjerava da li je korisnik vec glasao
$imageId = $conn->real_escape_string($_POST['imageId']);
$userId = $conn->real_escape_string($_SESSION['user_id']);
$alreadyVoted = $conn->query("SELECT * FROM votes WHERE image_id=$imageId AND user_id=$userId ");
if ($alreadyVoted->num_rows > 0) {
    http_response_code(500);
    die("Već ste glasali za sliku.");
}

// Upisuje glas
$conn->query("INSERT INTO votes (image_id, user_id, created_at) VALUES ($imageId, $userId, NOW())");

// Vraca ukupan broj glasova za sliku
$totalVotesQuery = $conn->query("SELECT COUNT(*) as votesNum FROM votes WHERE image_id=$imageId");
$totalVotes = $totalVotesQuery->fetch_assoc();
echo $totalVotes['votesNum'];

$conn->close();
?>
