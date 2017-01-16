<?php
session_start(); 

$isLoggedIn = false;
if(isset($_SESSION['valid']) && $_SESSION['valid']==true)
{
  $isLoggedIn = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> DIY </title>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link href="css/main.css" rel="stylesheet" />
  <link href="css/corusel.css" rel="stylesheet" />
  <link href="css/mobile.css" rel="stylesheet" />
  <link href="css/projects-galery.css" rel="stylesheet" />
  <script type="text/javascript" src="Skripta.js"></script>

</head>

<body onload="loadPage('home.php', initSlideshow)">
  <div class="container">
    <div class="header group">
      <div class="logo">
        DIY
      </div>
      <ul class="nav">
        <li>
          <a href="#" onclick="loadPage('home.php', initSlideshow)">Home</a>
        </li>
        <li>
          <a href="#" onclick="loadPage('projects.php')">Projects</a>
        </li>
        <li>
          <a href="#" onclick="loadPage('vote.html')">Vote</a>
        </li>
        <li>
          <a href="#" onclick="loadPage('best.php')">Best</a>
        </li>
        <li>
          <a href="#" onclick="loadPage('about.html')">About</a>
        </li>
        <li>
          <a href="#" onclick="loadPage('contact.html')">Contact</a>
        </li>
        <?php
         if (!$isLoggedIn)
         {
        ?>
        <li>
          <a href="#" onclick="loadPage('login.php', doLoginValidation)">Login</a>
        </li>
        <?php
        }
        ?>
      </ul>    
    </div>

<!-- UNUTAR PHP KADA NAM PREPOZNA DA NAM JE LOGOVAN KORISNIK ONDA SAMO OTVARA ONAJ DIO HTML KOJI ZELIMO STO JE KOD NASIZMEDJU OVIH DOLE PHP NOVIH-->
  <?php
  if ($isLoggedIn)
  {
    ?>
    <div class="admin-meni group">
Dobro došli
<b><?php 
echo $_SESSION['username']; 
?></b> (<a href="logout.php">Logout</a>)

    <div class="meni" style="float:right">
          <a href="#" onclick="loadPage('table.php')">EDIT GALLERY</a> | 
          <a href="#" onclick="loadPage('edit_gallery_form.php')">ADD NEW</a> | 
          <a href="#" onclick="loadPage('import_xml.php')">IMPORT XML</a>
      </div>
      </div>
    <?php
  }
  ?>

<div id="page-content">
    
</div>
    <div class="footer">
      Cretated by Ajla Sukrija

    </div>
  </div>
</body>

</html>
