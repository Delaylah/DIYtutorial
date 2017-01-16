<?php
include "config.php";

if (isset($_GET['num']))
{
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
  if (!$conn)
      die("Connection failed: " . mysqli_connect_error());

  $imageId = $conn->real_escape_string($_GET['num']);
  $imageQuery = $conn->query("SELECT * FROM images WHERE id=$imageId");
  $image = $imageQuery->fetch_assoc();
}
?>
<div class="row group">
<div class="col-4" style="margin-left:33%">

        <form  id="contact" autocomplete="true">
          <h3><?=(isset($image) ? "Edit" : "Add new")?> gallery</h3>
          <?php
          if (isset($image)) {
            echo '<input type="hidden" name="id" id="imageId" value="'.$image['id'].'"/>';
          }
          ?>
          <fieldset>
           Title:
           <input placeholder=" TITLE" type="text" id="title" name="title" value="<?=(isset($image) ? $image['title'] : ""); ?>" onkeyup="doEditGalleryValidation(<?=(isset($image) ? 'true' : 'false')?>)" >
           <span class="validation-error" id="titleMsg">Title is required</span>
          </fieldset>
          <fieldset> 
            Description:<textarea placeholder="WRITE DOWN TEXT HERE" id="message" name="message" onkeyup="doEditGalleryValidation(<?=(isset($image) ? 'true' : 'false')?>)" ><?=(isset($image) ? $image['description'] : ""); ?></textarea>
            <span class="validation-error" id="messageMsg">Description is required</span>
          </fieldset>
          <fieldset>
            Your Photo URL: 
            <input type="text" id="url" name="url" onkeyup="doEditGalleryValidation(<?=(isset($image) ? 'true' : 'false')?>)" >
            <span class="validation-error" id="urlMsg">Image URL is required</span>
            <?=(isset($image) ? '<img src="uploads/'.$image['file_name'].'" id="imagePreview" style="width:100px" />' : ""); ?>
          </fieldset>
          <fieldset>
            <button id="editGallerySubmit" type="button" disabled onclick="<?=(isset($image) ? 'editImage()' : 'saveNewImage()')?>">DONE</button>
          </fieldset>
        </form>  
    </div>
   

</div>