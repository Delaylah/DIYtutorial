<?php
header("Content-Type: text/csv");
header("Content-Disposition: attachment;filename=projects.csv");

$xml=simplexml_load_file("dataForProjects.xml") or die("Error: Cannot create object");
//ob_start();
$df = fopen("php://output", 'w');
fputcsv($df, array("arrayNumber", "date", "title", "message", "image",));
foreach($xml->program as $key => $program) 
{
    fputcsv($df, array($program->arrayNumber, $program->date, $program->title, $program->message, $program->image));
}
fclose($df);
//return ob_get_clean();
?>