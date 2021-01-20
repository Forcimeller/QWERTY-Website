<?php

function outputHeader($title){
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>' . $title . '</title>';
    echo '<link rel="stylesheet" href="CSS/style.css">';
    echo '<script src="https://kit.fontawesome.com/24be5bda03.js" crossorigin="anonymous"></script>';
    echo '<script src="Javascript.js"></script>';
    echo '</head>';
    echo '<body>';




}


function outputSearchnavigation(){
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
      <a href="Basket.php"><i class="fas fa-shopping-basket fa-2x"></a></i>
    </div>



  </div>

  </div>
  
  <nav>
  <ul>
    <li><a href="index.php">Spotlight</a></li>
    <li><a href="ProductPage.php">Sales</a></li>
    <li><a href="Contact.php">Contact</a></li>
    <li><a href="Account.php">Account</a></li>
  </ul>
</nav>





</div>';





}




function outputfooter(){
        
  echo '<footer class="footer">
  <div class="footer-top">
  <img src ="Images/logo.png">
  </div>
  <div class="footer-content">
  <div class="column1">
  <p class="info"> QWERTY believes in providing customers the best quality service along <br> 
     with the best quality apparal. From buying from us you are  guarenteed to <br>
     recieve the best service out there with prices that can not be beaten! </p>
  </div>
  <div class="column2">
  
    <h2>Quick Links</h6>
  
    <ul class="footer-links">
      <li><a href="index.php">Spotlight</a></li>
      <li><a href="Account.php">Account</a></li>
      <li><a href="Productpage.php">Sales</a></li>
      <li><a href="Contact.php">Contact</a></li>
      <li><a href="Basket.php">Basket</a></li>
    </ul>
  </div>
  
  <div class="column3">
  
    <h2>Socials</h2>
  
    <ul class="socials">
  
      <li><a href="">Twitter <i class="fab fa-twitter"></i></a></li>
      <li><a href="">Email <i class="far fa-envelope"></i></a></li>
      <li><a href="">Instagram <i class="fab fa-instagram"></i></a></li>
    </ul>  
  
  
  
  </div>
  
  </div>
  
  </div>
  
  
  
  </footer>
  
  
  
  
  </body>
  
  
  
  
  
  </html>';

}

?>

