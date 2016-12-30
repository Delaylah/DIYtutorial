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
        $xml=simplexml_load_file("dataForProjects.xml") or die("Error: Cannot create object");
        foreach($xml->program as $key => $program) 
        {
        ?>
            <div class="col-4">
            <div class="index-content-box">
                <img id="s1" src="<?=$program->image?>" class="title-image" />
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
</div>