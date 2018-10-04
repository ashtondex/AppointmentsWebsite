<?php

if (isset($_POST['submit'])){

    include_once 'dbh.inc.php';
    $zid = mysqli_real_escape_string($conn, $_POST['zid']);
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $dpt = mysqli_real_escape_string($conn, $_POST['dpt']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);  
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    // Error Handlers

    // Check for empty fields

    if (empty($first) || empty($last) || empty($email) || empty($zid) || empty($pwd) || empty($dpt))
    {
    header("Location: ../signup.php?signup=empty");
    exit();
    } else {
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))
        {
            header("Location: ../signup.php?signup=invalid");
            exit();
        }
        else{
            // check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                header("Location: ../signup.php?signup=email");
                exit();
            }
            else{
                $sql = "SELECT * FROM users WHERE z_id ='$zid'";
                $result = mysqli_query($conn, $sql);
 
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                    header("Location: ../signup.php?User has already made an account");
                    exit();
                }
                else {
                    //Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    
                    //Insert the user into the database

                    $sql = "INSERT INTO users (z_id,student_first, student_last, student_dpt,student_email,student_pwd) VALUES ('$zid','$first','$last','$dpt','$email','$hashedPwd')";


                    if (mysqli_query($conn, $sql)) {
                        echo '<h2> Successful addition </h2>';
                        echo "New record created successfully";
                    }
                header("Location: ../signup.php?signup=success");
                exit();
            
                }
              }
            }
        }

} else {
    header("Location: ../signup.php");
    exit();
}