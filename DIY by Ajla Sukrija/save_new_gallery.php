<?php
if($_POST)
{
  $url = $_POST['url'];
  $name = basename($url);
  list($txt, $ext) = explode(".", $name);
  $name = $txt.time();
  $name = $name.".".$ext;
 
  // Uploaduje file
  if($ext == "jpg" or $ext == "png" or $ext == "gif" or $ext == "doc" or $ext == "docx" or $ext == "pdf")
  {
    $upload = file_put_contents("uploads/$name",file_get_contents($url));
    if(!$upload)
    {
      echo "Errow while copying file";
      exit();
    }
  }
  else
  {
    echo "Please upload only image/document files";
    exit();
  }

  $xml = simplexml_load_file("dataForProjects.xml");

  $arrayNumber = $_POST['arrayNumber'];
  $title = $_POST['title'];
  $date = $_POST['date'];
  $message = $_POST['message'];
  $url = $_POST['url'];


  $arrayNumber = htmlentities($arrayNumber, ENT_COMPAT, 'UTF-8', false);
  $date = htmlentities($date, ENT_COMPAT, 'UTF-8', false);
  $title = htmlentities($title, ENT_COMPAT, 'UTF-8', false);
  $message = htmlentities($message, ENT_COMPAT, 'UTF-8', false);
  $url = htmlentities($url, ENT_COMPAT, 'UTF-8', false);


  $newElement = $xml->addChild("program");
  $newElement->addChild('arrayNumber', $arrayNumber);
  $newElement->addChild('date', $date);
  $newElement->addChild('title', $title);
  $newElement->addChild('message', $message);
  $newElement->addChild('image',"uploads/$name");

  $doc = new DOMDocument('1.0');
  $doc->formatOutput = true;
  $doc->preserveWhiteSpace = true;
  $doc->loadXML($xml->asXML(), LIBXML_NOBLANKS);
  $doc->save('dataForProjects.xml');

  echo "Project added";
}
?>