<?php

session_start();

?>
<!DOCTYPE html>

 <html>
    <head>
            <title>CEET Appointments System</title>
            <link rel ="stylesheet" type ="text/css" href="styles.css">
    </head>

 <body>
 
 
 
 <header>
    <nav>
        <div class ="main_wrapper">
            <ul>
                <li><a href="index.php" > Home </a> </li>
            </ul>

            <div class = "nav-login">
                    <?php
                    if (isset($_SESSION['z_id'])){
                        echo '<form action="includes/logout.inc.php" method="POST">
                        <button type = "submit" name = "submit"> Logout </button>
                    </form>';
                    
                    } else {
                        echo '<form action = "includes/login.inc.php" method ="POST">
                        <input type ="text" name ="zid" placeholder="Username/e-mail">
                        <input type ="password" name ="pwd" placeholder="Password">
                        <button type ="submit" name ="submit"> Login </button>
                    </form>
                    <a href="signup.php"> Sign Up </a>';

                    }
                    
                    ?>
                    
               
            </div>
        </div>
    </nav>
 </header>
 
