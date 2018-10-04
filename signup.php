<?php
    include_once 'header.php'
?>
 <section c;ass ="main-container">
        <div class ="main-wrapper">
            
            <form class ="signup-form" action="includes/signup.inc.php" method="POST">
                <input type="text" name="zid" placeholder="ZID">
                <input type="text" name="first" placeholder="Firstname">
                <input type="text" name="last" placeholder="Lastname">
                <input type="text" name="dpt" placeholder="Department">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="submit"> Sign up </button>
            </form>


        </div>
 </section>
 
 <?php
    include_once 'footer.php'
?>

