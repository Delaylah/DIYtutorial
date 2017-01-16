<?php
include "config.php";
session_start();

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$conn)
  die("Connection failed: " . mysqli_connect_error());

$totalImages = 0;
$insertedImages = 0;

$xml=simplexml_load_file("dataForProjects.xml") or die("Error: Cannot create object");
foreach($xml->program as $key => $program) 
{
    $totalImages++;

    $title = $conn->real_escape_string($program->title);
    $existingImage = $conn->query("SELECT Id FROM images WHERE title='$title'");
    if ($existingImage->num_rows == 0) {
        $descripton = $conn->real_escape_string($program->message);
        $fullPath = explode("/", $program->image);
        $fileName = $conn->real_escape_string(end($fullPath));
        $userId = $conn->real_escape_string($_SESSION['user_id']);
        $createdAt = $conn->real_escape_string($program->date);
        if ($conn->query("INSERT INTO images (title, description, file_name, user_id, created_at) VALUES ('$title', '$descripton', '$fileName', $userId, '$createdAt')")) {
            $insertedImages++;
        }
    }
}

$conn->close();

echo "Total images: $totalImages; Inserted images: $insertedImages";
?>