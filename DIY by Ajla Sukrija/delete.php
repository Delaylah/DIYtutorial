<?php
if ($_GET && $_GET['num'])
{
    $xml=simplexml_load_file("dataForProjects.xml") or die("Error: Cannot create object");
    foreach($xml->program as $key => $program) 
    { 
        if ($program->arrayNumber == $_GET['num'])
        {
            $dom=dom_import_simplexml($program);
            $dom->parentNode->removeChild($dom);

            $doc = new DOMDocument('1.0');
            $doc->formatOutput = true;
            $doc->preserveWhiteSpace = true;
            $doc->loadXML($xml->asXML(), LIBXML_NOBLANKS);
            $doc->save('dataForProjects.xml');

            echo "Successfully deleted";
            exit();
        }
    }

    echo "Can't find entiry to delete";
}
?>