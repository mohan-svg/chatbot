<?php

include "db.php";
  
// $server_time=date("Y-m-d H:i:s");
session_start();

if(($_SESSION['id']!='') && ($_SESSION['stud_login']=='true')){

    $email = $_SESSION['email'];
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM student WHERE username='$email' AND stud_id='$id'";

    $query=mysqli_query($conn,$sql);

$count = mysqli_num_rows($query);

    if($count=="0"){

        $_SESSION["error"]="PLease Enter Valid Username or Password";
      
        header("http://localhost/stud-univ-status/Student");
      
    }else{
        while($row = mysqli_fetch_array($query)){
              
                $id= $row['stud_id'];
                $name=$row['firstname'];
                $username = $row['username'];
              
                $_SESSION["id"] = $id;
                $_SESSION["name"] = $name;
                $_SESSION["username"] = $username;

                $_SESSION["stud_login"] = 'true';

                $_SESSION['start'] = time();

                 // taking now logged in time
                $_SESSION['expire'] = $_SESSION['start'] + (1 * 60 * 60) ; //1 HR
              
                $conn->close();

                header("Location: chatbot");

            }
        }

   

}

else{

    header("http://localhost/stud-univ-status/Student");

}

?>



