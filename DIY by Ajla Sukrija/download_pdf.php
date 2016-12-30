<?php 
require('/fpdf/fpdf.php'); 

$xml=simplexml_load_file("dataForProjects.xml") or die("Error: Cannot create object");

//create a FPDF object
$pdf=new FPDF();

foreach($xml->program as $key => $program) 
{
    //set font for the entire document
    $pdf->SetFont('Helvetica','B',20);
    $pdf->SetTextColor(50,60,100);

    //set up a page
    $pdf->AddPage('P'); 
    $pdf->SetDisplayMode('real','default');

    //insert an image and make it a link
    $pdf->Image((string)$program->image,50, 40, 100);

    //display the title with a border around it
    $pdf->SetXY(50,20);
    $pdf->SetDrawColor(50,60,100);
    $pdf->Cell(100,10,$program->title,1,0,'C',0);

    //Set x and y position for the main text, reduce font size and write content
    $pdf->SetXY (10,180);
    $pdf->SetFontSize(10);
    $pdf->Write(5,"Added: ".$program->date);

    //Set x and y position for the main text, reduce font size and write content
    $pdf->SetXY (10,185);
    $pdf->SetFontSize(10);
    $pdf->Write(5,$program->message);
}

//Output the document
$pdf->Output('example1.pdf','I'); 
?>