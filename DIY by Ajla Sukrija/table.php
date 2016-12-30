
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
$xml=simplexml_load_file("dataForProjects.xml") or die("Error: Cannot create object");
foreach($xml->program as $program) { 
  echo "<tr>";
  echo "<td>".$program->arrayNumber . "</td>";
  echo "<td>".$program->title . "</td>";
  echo "<td>".$program->message . "</td>";
  echo "<td>".$program->date . "</td>";
  echo '<td><a href="'.$program->image . '" target="_blank">'.$program->image.'</a></td>';
  echo '<td><a href="#" onclick="loadPage(\'edit_gallery_form.php?num='.$program->arrayNumber.'\', function() { doEditGalleryValidation(true); })">Edit</a> <a href="delete.php?num='.$program->arrayNumber.'">Delete</a>';
  echo "</tr>";   
} 
?>







   
</table>