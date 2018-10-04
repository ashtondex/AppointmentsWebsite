<?php
    include_once 'header.php'
?>
 <section class ="main-container">
        <div class ="main-wrapper">
            
            <?php
            if (isset($_SESSION['z_id'])) {
                echo $_SESSION['student_first'];
                echo " You are logged in";
                echo '<br>';
                include_once 'includes/dbh.inc.php';
                
  
                $id = $_SESSION['advisor_id'];
                echo $id;
                echo " Your Advisor is : ";
                $sql= "SELECT advisor_first FROM advisors  Where advisor_id ='2'";
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) {
                    echo $row['advisor_first']."<br>";
                }
                echo ' <table>
                <tr>
                  <th>Appointment Time</th>
                  <th>Student Name</th>
                  <th>Advisor Name</th>
                </tr>
                <tr>
                  <td>7pm-8pm  10/10/2018</td>
                  <td>Ashton</td>
                  <td>Dr.Raymond</td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>';        
              
            }
         ?>

        
        </div>
 </section>
 
 <?php
    include_once 'footer.php'
?>

