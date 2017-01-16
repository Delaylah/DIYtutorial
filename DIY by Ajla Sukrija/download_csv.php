<?php
include "config.php";
header("Content-Type: text/csv");
header("Content-Disposition: attachment;filename=projects.csv");

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$images = $conn->query("SELECT * FROM images ORDER BY created_at DESC");

//ob_start();
$df = fopen("php://output", 'w');
fputcsv($df, array("id", "date", "title", "description", "image",));
while($image = $images->fetch_assoc())
{
    fputcsv($df, array($image['id'], $image['created_at'], $image['title'], $image['description'], $image['file_name']));
}
fclose($df);
$conn->close();
//return ob_get_clean();
?>