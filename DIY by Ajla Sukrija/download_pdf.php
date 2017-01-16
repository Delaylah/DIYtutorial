<?php
include "config.php";
require('/fpdf/fpdf.php'); 

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$images = $conn->query("SELECT * FROM images ORDER BY created_at DESC");

//create a FPDF object
$pdf=new FPDF();

while($image = $images->fetch_assoc())
{
    //set font for the entire document
    $pdf->SetFont('Helvetica','B',20);
    $pdf->SetTextColor(50,60,100);

    //set up a page
    $pdf->AddPage('P'); 
    $pdf->SetDisplayMode('real','default');

    //insert an image and make it a link
    $pdf->Image("uploads/".$image['file_name'],50, 40, 100);

    //display the title with a border around it
    $pdf->SetXY(50,20);
    $pdf->SetDrawColor(50,60,100);
    $pdf->Cell(100,10,$image['title'],1,0,'C',0);

    //Set x and y position for the main text, reduce font size and write content
    $pdf->SetXY (10,180);
    $pdf->SetFontSize(10);
    $pdf->Write(5,"Added: ".$image['created_at']);

    //Set x and y position for the main text, reduce font size and write content
    $pdf->SetXY (10,185);
    $pdf->SetFontSize(10);
    $pdf->Write(5,$image['description']);
}

//Output the document
$pdf->Output('example1.pdf','I'); 
$conn->close();
?>