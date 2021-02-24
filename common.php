<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->Qwerty;


function outputHTMLHeader($pageTitle){//Function to print the HTML headder for all webpages
    echo'
    <!DOCTYPE html>
    <html lang = "en">
        <head>
            <meta charset = "UTF-8">
            <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
            <link rel = "stylesheet" type = "text/css" href = "CSS\grids.CSS">
            <link rel = "stylesheet" type = "text/css" href = "CSS\slideShow.CSS">
            <link rel = "stylesheet" type = "text/css" href = "CSS\mainStyles.CSS">
            <link rel = "stylesheet" type = "text/css" href = "CSS\productUnit.CSS">
            <title>' . $pageTitle . '</title>
        </head>

        <body>
            <div class = "pageGrid">
    ';
}

function pageHeader($page, $user){//function for page header & navigation bar
    echo'
                <div class = "headerGrid" id = "header">
                <div class = "logoSpace">
                    <img src = "Assets\logo-white.png" class = "logo">                  
                </div>
                <div class = searchBarGrid>
                    <form action = "">
                        <input type = "text" name = "searchTerm" placeholder = "SEARCH...">
                    </form>
                    <img src = "Assets\Search.png" height = 30px style = "padding: 10px;">
                    <div id = "basketStatus">
                        <img src = "Assets\Basket.png" height = 30px style = "padding: 10px;">
                    </div>
                    
                </div>
                <div class = "navBarGrid">
    ';

    if ($user == "guest"){
        $user = "SIGN_IN_";
    } else {
        $user = "MY_QWERTY_ACCOUNT_";
    }

    $displayedLinkNames = array("SPOTLIGHT_", "ALL_SHIRTS_", "SEARCH_", $user);
    $linkDestinations = array("index.php", "all-shirts.php", "search-results.php", "account.php");

    
    for($i = 0; $i < count($displayedLinkNames); $i++){
        echo '          <button class = ';
        if ($displayedLinkNames[$i] == $page)
            echo '"deadNavButton" id = "' . $displayedLinkNames[$i] . '">' . $displayedLinkNames[$i] . '</button>';
        else {
            echo '"navButton"';
            echo ' id = "' . $displayedLinkNames[$i] . '" onclick = location.href="' .  $linkDestinations[$i] . '">' . $displayedLinkNames[$i] . '</button>';
        }
        echo'   
            <h2>|</h2>
        ';
    }

    echo'
                    </div> 
                </div>
    ';
}

function pageFooter(){
    echo'
                    <div class = "footerGrid">

                    <div class = "descriptionColumn">
                        <p class = "info"> QWE®TY is an elite competitive programmer’s club with exclusive perks and privileges. 
                            Here we sell exclusive, luxury apparel made for supporters of the club to wear. <br> 
                            QWE®TY. Our code <i>does</i>.</p>
                    </div>

                    <div class = "quickLinkColumn">                
                        <h2>Quick Links</h2>                    
                        <ul class = "footer-links">
                            <li><a href = "">Spotlight</a></li>
                            <li><a href = "">Account</a></li>
                            <li><a href = "">Contact</a></li>
                            <li><a href = "">Basket</a></li>
                        </ul>
                    </div>

                    <div class = "socialColumn">                
                        <h2>Socials</h2>                
                        <ul class = "socials">                    
                            <li><a href = "">Twitter <i class = "fab fa-twitter" aria-hidden = "true"></i></a></li>
                            <li><a href = "">Email <i class = "far fa-envelope" aria-hidden = "true"></i></a></li>
                            <li><a href = "">Instagram <i class = "fab fa-instagram" aria-hidden = "true"></i></a></li>
                        </ul>  
                    </div>
                </div>
            </div>
        </body>
    </html>
    ';

}
?>