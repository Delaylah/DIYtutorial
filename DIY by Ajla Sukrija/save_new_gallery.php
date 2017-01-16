<?php
include "config.php";
session_start();

if (!isUserLogedIn()) {
    http_response_code(500);
    die("Samo logovani korisnici mogu dodati sliku!");
}

if($_POST)
{
  // Create connection
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
  if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

  try
  {
    $urlName = basename($_POST['url']);
    list($name, $ext) = explode(".", $urlName);
    $fileName = $name.time();
    $fileName = $fileName.".".$ext;
    // Download file na server
    if($ext == "jpg" or $ext == "png" or $ext == "gif")
    {
      $upload = file_put_contents("uploads/$fileName", file_get_contents($_POST['url']));
      if(!$upload)
      {
        echo "Errow while copying file";
        exit();
      }
    }
    else
    {
      echo "Please upload only image files";
      exit();
    }

    // Snima u bazu
    $title = $conn->real_escape_string(htmlspecialchars($_POST['title']));
    $description = $conn->real_escape_string(htmlspecialchars($_POST['message']));
    $fileNameForDb = $conn->real_escape_string(htmlspecialchars($fileName));
    $userId = $conn->real_escape_string($_SESSION['user_id']);

    $sql = "INSERT INTO images (title, description, file_name, user_id, created_at) VALUES ('$title', '$description', '$fileNameForDb', '$userId', NOW())";
    if ($conn->query($sql)) {
      echo "Project added";
    }
    else {
      echo "Error while adding project to DB";
    }
  }
  finally
  {
    $conn->close();
  } 
}
?>