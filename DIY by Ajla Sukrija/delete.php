<?php
include "config.php";

if (isset($_POST['imageId']))
{
    $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
    if (!$conn)
        die("Connection failed: " . mysqli_connect_error());
    
    $id = $conn->real_escape_string($_POST['imageId']);
    $images = $conn->query("DELETE FROM images WHERE id=$id");
    echo "Successfully deleted";

    $conn->close();
}
?>