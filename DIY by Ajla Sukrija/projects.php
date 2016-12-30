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
$xml=simplexml_load_file("dataForProjects.xml") or die("Error: Cannot create object");
foreach($xml->program as $key => $program) 
{
  ?>
    <div class="col-3">
      <div class="index-content-box">
        <img id="s1" src="<?=$program->image?>" class="title-image" onclick="showFullImage('<?=$program->image?>')" />
        <div class="description green">
          <?=$program->title?>
          <div>
            <small><?=$program->message?></small>
          </div>
        </div>
      </div>
    </div>
  <?php
}
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
