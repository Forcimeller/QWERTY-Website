<?php
    
#including the Common.php file

    include('Common.php'); 

    outputheader("QWERTY STORE | Account");
    outputSearchnavigation();

    #Calling  the functions required for the page + the unique HTML code for the register + login forms and order history

    ?>

<div class="login">
   <div class ="login-content">
    <h1>Login</h1>
    <form>
        <p>Username</p>
        <input type="text" name="" placeholder="Username">
        <p> Password</p>
        <input type="Password" name="" placeholder="Password">
        <input type ="submit" name="" value="Login"><br>
    </form>


</div>
</div>

<div class="Register">
  <div class ="login-content">
    <h1>Register</h1>
        
        <p>Email Address</p>
        <input type="email" id= "EmailInput" name="email" placeholder="Email Address">
        <p> Password</p>
        <input type="password" id="PasswordInput" name="password" placeholder="Password">
        <br></br>
        <button class="submit" type="button" >Register</button>  
        
    </form>
</div>
</div>


<div class="order-history">
    <h1>Order History</h1>
    <ul>
        <li><img src="Images/Shirtmodel2.jpg"></li>
        <h3>Order ID</h3>
        <h3>Price</h3>
        <h3>Date</h3>
    </ul>
</div>

<!-- Function to output the footer -->
<?php
    outputfooter();
?>

	