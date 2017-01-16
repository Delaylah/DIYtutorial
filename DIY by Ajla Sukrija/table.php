<?php
include "config.php";
?>

<a href="download_csv.php">Download CSV</a>
<a href="download_pdf.php">Download PDF</a>

<table>
  <tr>
    <th>number</th>
    <th>title</th>
    <th>description</th>
    <th>date</th>
    <th>photo</th>
    <th></th>
  </tr>

<?php
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$conn)
  die("Connection failed: " . mysqli_connect_error());

$images = $conn->query("SELECT * FROM images ORDER BY created_at DESC");

while($image = $images->fetch_assoc()) { 
  echo "<tr>";
  echo "<td>".$image['id'] . "</td>";
  echo "<td>".$image['title'] . "</td>";
  echo "<td>".$image['description']  . "</td>";
  echo "<td>".$image['created_at']  . "</td>";
  echo '<td><a href="uploads/'.$image['file_name'] . '" target="_blank">'.$image['file_name'] .'</a></td>';
  echo '<td><a href="#" onclick="loadPage(\'edit_gallery_form.php?num='.$image['id'].'\', function() { doEditGalleryValidation(true); })">Edit</a> <a href="#" onclick="deleteImage('.$image['id'].')">Delete</a>';
  echo "</tr>";   
} 

$conn->close();
?>







   
</table>