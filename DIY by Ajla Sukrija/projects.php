<?php
include "config.php";
?>
<div class="search-form">
  <input type="search" name "pretraga" id="Search" class="search-field" />
  <button class="search-button" id="submit" onclick="doSearchValidation()">Button</button>
  <span class="validation-error" id="mssgSearch" style="display:none">Content is required, write something if u want to search!</span>
</div>

<style>

</style>

<div id="gallery-modal" onclick="closeFullImage()">
  <img id="gallery-image" src="" />
</div>

<div class="row group">
<?php
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$images = $conn->query("SELECT * FROM images ORDER BY created_at DESC");

while($image = $images->fetch_assoc())
{
  ?>
    <div class="col-3">
      <div class="index-content-box">
        <img id="s1" src="uploads/<?=$image['file_name']?>" class="title-image" onclick="showFullImage('uploads/<?=$image['file_name']?>')" />
        <div class="description green">
          <?=$image['file_name']?>
          <div>
            <small><?=$image['description']?></small>
          </div>
        </div>
      </div>
    </div>
  <?php
}
$conn->close();
?>
</div>

<!--<div class="row group">
  <div class="col-3">
    <div class="index-content-box">
      <img id="s1" src="images/slika10.jpg" class="title-image" onclick="showFullImage('images/slika10.jpg')" />
      <div class="description green">
        bla bl abla blabla b
      </div>

    </div>
    <div class="index-content-box">
      <img src="images/slika7.jpg" class="title-image" id="s1" onclick="showFullImage('images/slika7.jpg')" />
      <div class="description green">
        <h>Ime slike</h>
      </div>

    </div>
  </div>

  <div class="col-3">
    <div class="index-content-box">
      <img src="images/slika6.jpg" class="title-image" id="s1" onclick="showFullImage('images/slika6.jpg')" />
      <div class="description yellow">
        bla bla bla taa blalorem ipsum bl a
      </div>
    </div>
  </div>
  <div class="col-3">
    <div class="index-content-box">
      <img src="images/slika4.jpg" class="title-image" id="s1" onclick="showFullImage('images/slika4.jpg')" />
      <div class="description green">
        <h>Ime slike</h>
      </div>

    </div>
  </div>
  <div class="col-3">
    <div class="index-content-box">
      <img src="images/slika6.jpg" class="title-image" id="s1" onclick="showFullImage('images/slika6.jpg')" />
      <div class="description yellow">
        bla bla bla tannambl a
      </div>
    </div>
  </div>



  <div class="col-3">
    <div class="index-content-box">
      <img src="images/slika4.jpg" class="title-image" id="s1" onclick="showFullImage('images/slika4.jpg')" />
      <div class="description green">
        <h>Ime slike</h>
      </div>
    </div>
  </div>
  <div class="col-3">
    <div class="index-content-box">
      <img src="images/slika8.jpg" class="title-image" id="s1" onclick="showFullImage('images/slika8.jpg')" />
      <div class="description yellow">
        <h>Ime slike</h>
      </div>

    </div>
  </div>
</div>-->
