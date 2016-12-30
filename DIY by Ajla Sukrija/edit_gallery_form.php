<?php
if (isset($_GET['num']))
{
  $xml=simplexml_load_file("dataForProjects.xml") or die("Error: Cannot create object");
  foreach($xml->program as $key => $program) 
  { 
    if ($program->arrayNumber == $_GET['num'])
    {
      $gallery = $program;
      break;
    }
  }
}
?>
<div class="row group">
<div class="col-4" style="margin-left:33%">

        <form  id="contact" action="<?=(isset($_GET['num']) ? 'edit_gallery.php' : 'save_new_gallery.php')?>" method="post" autocomplete="true">
          <h3><?=(isset($_GET['num']) ? "Edit" : "Add new")?> gallery</h3>
          <fieldset>
           Number of image: 
           <input placeholder=" Image number" type="number" id="arrayNumber" name="arrayNumber" value="<?=(isset($gallery) ? $gallery->arrayNumber : ""); ?>" <?=(isset($gallery) ? 'readonly' : ""); ?> onkeyup="doEditGalleryValidation(<?=(isset($_GET['num']) ? 'true' : 'false')?>)" >
           <span class="validation-error" id="arrayNumberMsg">Number of image is required</span>
          </fieldset>
          <fieldset>
           Title:
           <input placeholder=" TITLE" type="text" id="title" name="title" value="<?=(isset($gallery) ? $gallery->title : ""); ?>" onkeyup="doEditGalleryValidation(<?=(isset($_GET['num']) ? 'true' : 'false')?>)" >
           <span class="validation-error" id="titleMsg">Title is required</span>
          </fieldset>
          <fieldset> 
            Description:<textarea placeholder="WRITE DOWN TEXT HERE" id="message" name="message" onkeyup="doEditGalleryValidation(<?=(isset($_GET['num']) ? 'true' : 'false')?>)" ><?=(isset($gallery) ? $gallery->message : ""); ?></textarea>
            <span class="validation-error" id="messageMsg">Description is required</span>
          </fieldset>
          <fieldset>
            Date of change:<input placeholder="DATE" type="date" id="date" name="date" value="<?=(isset($gallery) ? $gallery->date : ""); ?>" onchange="doEditGalleryValidation(<?=(isset($_GET['num']) ? 'true' : 'false')?>)" >
            <span class="validation-error" id="dateMsg">Date is required</span>
          </fieldset>
          <fieldset>
            Your Photo URL: 
            <input type="text" id="url" name="url" onkeyup="doEditGalleryValidation(<?=(isset($_GET['num']) ? 'true' : 'false')?>)" >
            <span class="validation-error" id="urlMsg">Image URL is required</span>
            <?=(isset($gallery) ? '<img src="'.$gallery->image.'" style="width:100px" />' : ""); ?>
          </fieldset>
          <fieldset>
            <button id="editGallerySubmit" type="submit" disabled>DONE</button>
          </fieldset>
        </form>  
    </div>
   

</div>