<?php

#including the common.php file

    include('Common.php'); 
	
 #Calling  the functions required for the page + the unique HTML code for the game's placeholder 

    outputheader("QWERTY STORE |Contact");

    outputSearchnavigation();

    ?>

  
<div class="Contact-form">
    <div class ="contact-content">
      <h1>Contact us!</h1>
      <p>For any queries concerning your order, our products or any thing else, <br> 
        fill out this form and we will get back to you in a tick!</p>
        <br>
          
          <p>Email Address</p>
          <input type="qemail" id= "EmailInput" name="email" placeholder="Email Address">
          <p> Your query</p>
          <input type="question" id="QuestionInput" name="question" placeholder="What would you like to ask about?">
          <br></br>
          <button class="ask" type="button" >Submit</button>  
          
      </form>

</div>
</div>
<?php
    outputfooter();
?>
