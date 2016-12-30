<?php
if($_POST)
{
    // Ako je definisan url, download sliku ponovo
    if (isset($_POST['url']) && !empty($_POST['url']))
    {
        $url = $_POST['url'];
        $name = basename($url);
        list($txt, $ext) = explode(".", $name);
        $name = $txt.time();
        $nameNew = $name.".".$ext;

        // Uploaduje file
        if($ext == "jpg" or $ext == "png" or $ext == "gif" or $ext == "doc" or $ext == "docx" or $ext == "pdf")
        {
            $upload = file_put_contents("uploads/$nameNew",file_get_contents($url));
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
    }

    $xml = simplexml_load_file("dataForProjects.xml");

    $arrayNumber = $_POST['arrayNumber'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $url = $_POST['url'];

    $xml=simplexml_load_file("dataForProjects.xml") or die("Error: Cannot create object");
    foreach($xml->program as $key => $program) 
    { 
        if ($program->arrayNumber == $_POST['arrayNumber'])
        {
            $program->arrayNumber = htmlentities($arrayNumber, ENT_COMPAT, 'UTF-8', false);
            $program->date = htmlentities($date, ENT_COMPAT, 'UTF-8', false);
            $program->title = htmlentities($title, ENT_COMPAT, 'UTF-8', false);
            $program->message = htmlentities($message, ENT_COMPAT, 'UTF-8', false);
            if (isset($nameNew))
            {
                $program->image = "uploads/$nameNew";
            }

            // Save as xml
            $doc = new DOMDocument('1.0');
            $doc->formatOutput = true;
            $doc->preserveWhiteSpace = true;
            $doc->loadXML($xml->asXML(), LIBXML_NOBLANKS);
            $doc->save('dataForProjects.xml');

            echo "Project edited";

            break;
        }
    }
}
?>