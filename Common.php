<?php

function outputHeader($title){
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>' . $title . '</title>';
    echo '<link rel="stylesheet" href="CSS/style.css">';
    echo '<script src="https://kit.fontawesome.com/24be5bda03.js" crossorigin="anonymous"></script>'
    echo '<script src="Javascript.js"></script>';
    echo '</head>';
    echo '<body>';




}


function outputSearch(){
    echo 
    '<div class="navigationbar">
    <div class="sitelogo">
      <img src="Images/logo.png">
    </div>


    <div class="search">
      <input type="text" class="searchTerm" placeholder="Search away!">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
      </button>
    </div>

    <div class="basket">
      <i class="fas fa-shopping-basket fa-2x"></i>
    </div>



  </div>

  </div>';

}

//Arrays

$linkNames = array("Spotlight", "Register", "Login", "Ranking", "Gallery","FAQ");
$linkAddresses = array("index.php", "Register.php","login.php", "ranking.php", "gallery.php","FAQ.php");


