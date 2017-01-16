<?php
include "config.php";
?>
<div onload="showSlides(1)">
    <div class="search-form">
        <input type="search" name "pretraga" id="Search" class="search-field" />
        <button class="search-button" id="submit" onclick="doSearchValidation()">Button</button>
        <span class="validation-error" id="mssgSearch" style="display:none">Content is required, write something if u want to search!</span>

    </div>

    <div class="slideshow-background">
        <div class="slideshow-container">

            <div class="Slajd">
                <img src="images/gif2.gif" style="width:100%">
            </div>

            <div class="Slajd">
                <img src="images/gif1.gif" style="width:100%">
            </div>

            <div class="Slajd">
                <img src="images/slika11.jpg" style="width:100%">
            </div>
            <div class="Slajd">
                <img src="images/gif2.gif" style="width:100%">
            </div>

            <a class="prev" onclick="plusSlides(-1)">PREVOUS</a>
            <a class="next" onclick="plusSlides(1)">NEXT</a>

        </div>

        <div class="slideshow-pagination">
            <span class="tacka" onclick="currentSlide(1)"></span>
            <span class="tacka" onclick="currentSlide(2)"></span>
            <span class="tacka" onclick="currentSlide(3)"></span>
            <span class="tacka" onclick="currentSlide(4)"></span>
        </div>
    </div>

    <div class="row group">
        <?php
        $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
        if (!$conn)
            die("Connection failed: " . mysqli_connect_error());

        $images = $conn->query("SELECT * FROM images ORDER BY created_at DESC");
        ?>
        <div class="col-4">
        <?php
        $perColumn = ceil($images->num_rows / 3);
        $displayedImages = 0;
        while($image = $images->fetch_assoc())
        {
            if ($displayedImages > 0 && $displayedImages % 2 == 0) {
                echo '</div><div class="col-4">';
            }
        ?>
            <div class="index-content-box">
                <a href="vote.php?imageId=<?=$image['id']?>" class="like"><img src="images/like.png" /></a>
                <img id="s1" src="uploads/<?=$image['file_name']?>" class="title-image" />
                <div class="description green">
                <?=$image['title']?>
                <div>
                    <small><?=$image['description']?></small>
                </div>
                </div>
            </div>
        <?php
            $displayedImages++;
        }
        $conn->close();
        ?>
        </div>
    </div>
</div>