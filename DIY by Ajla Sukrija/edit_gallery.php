<?php
include "config.php";
session_start();

if (!isUserLogedIn()) {
    http_response_code(500);
    die("Samo logovani korisnici mogu izmijeniti sliku!");
}

if($_POST)
{
    $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
    if (!$conn)
        die("Connection failed: " . mysqli_connect_error());

    // Selektuje postojeci red iz baze
    $imageId = $conn->real_escape_string($_POST['id']);
    $existingImageQuery = $conn->query("SELECT * FROM images WHERE id=$imageId");
    if ($existingImageQuery->num_rows == 0) {
        http_response_code(500);
        die("Slika ne postoji u bazi!");
    }

    $existingImage = $existingImageQuery->fetch_assoc();
    $nameNew = $existingImage['file_name'];

    // Ako je definisan url, download sliku ponovo
    if (isset($_POST['url']) && !empty($_POST['url']))
    {
        $url = $_POST['url'];
        $name = basename($url);
        list($txt, $ext) = explode(".", $name);
        $name = $txt.time();
        $nameNew = $name.".".$ext;

        // Uploaduje file
        if($ext == "jpg" or $ext == "png" or $ext == "gif")
        {
            $upload = file_put_contents("uploads/$nameNew",file_get_contents($url));
            if(!$upload)
            {
                http_response_code(500);
                die("Errow while copying file");
            }
        }
        else
        {
            http_response_code(500);
            die("Please upload only image files");
        }
    }

    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['message']);

    if ($conn->query("UPDATE images SET title='$title', description='$description', file_name='$nameNew' WHERE id=$imageId")) {
        // Vraca putanju do slike da bi je prikazali na formi
        echo "uploads/$nameNew";
    }
    else {
        echo "ERROR: ".$conn->error;
    }

    $conn->close();
}
?>