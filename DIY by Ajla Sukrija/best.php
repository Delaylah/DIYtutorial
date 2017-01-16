<?php
include "config.php";
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$images = $conn->query("SELECT *, (SELECT COUNT(*) FROM votes v WHERE v.image_id=i.id) AS votes FROM images i ORDER BY votes DESC LIMIT 3")
?>

<div class="row group">

  <?php
  $place = 1;
  $classes = array(1 => "gold", 2 => "bronze", 3 => "silver");
  while ($image = $images->fetch_assoc())
  { ?>
  <div class="col-4">
    <div class="index-content-box">
      <img src="uploads/<?=$image['file_name']?>" class="title-image" />
      <div class="description <?=$classes[$place]?>">
        <?=($place++)?>st. PLACE
      </div>

    </div>
  </div>
  <?php
  }
  ?>
</div>
