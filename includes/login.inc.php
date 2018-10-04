<?php

session_start();

if (isset($_POST['submit'])) {

    include 'dbh.inc.php';

    $zid = mysqli_real_escape_string($conn, $_POST['zid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    // Error Handlers
    // Check if inputs are empty

    if (empty($zid) || empty($pwd)) {
        header("Location: ../index.php?login=empty");
        exit();
    
    } else {
     $sql = "SELECT * FROM users WHERE z_id ='$zid'";
     $result = mysqli_query($conn, $sql);
     $resultCheck = mysqli_num_rows($result);
     if ($resultCheck < 1){
        header("Location: ../index.php?login=error3");
        exit();
     }
     else {
         if ($row = mysqli_fetch_assoc($result)){
             //De-hashing the password
             $hashedPwdCheck = password_verify($pwd, $row['student_pwd']);
             if ($hashedPwdCheck == false){
                header("Location: ../index.php?login=error2");
                exit();
             }
             elseif ($hashedPwdCheck == true){
                 // Log in the user here
                 $_SESSION['z_id'] = $row['z_id'];
                 $_SESSION['student_first'] = $row['student_first'];
                 $_SESSION['student_last'] = $row['student_last'];
                 $_SESSION['student_dpt'] = $row['student_dpt'];
                 $_SESSION['student_email'] = $row['student_email'];
                 $_SESSION['advisor_id'] = $row['advisor_id'];
                 header("Location: ../index.php?login=success");
                 exit();

             }
             echo $row['z_id'];
         }
     }
    }

    }
    else
    {
        header("Location: ../index.php?login=error1");
        exit();
    }
