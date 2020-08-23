<?php
include"db.php";
  
// $server_time=date("Y-m-d H:i:s");
session_start();
	
	$user_id = $_SESSION['id'];
				
				
     $quer = mysqli_query($conn,"UPDATE chats SET del_msg = '0' WHERE user_id='$user_id'");
                
                // remove all session variables
                session_unset();

                // destroy the session
                session_destroy(); 

                // header("Location: https://www.shahgre.com/studentsection/stlogout/$user_id");
                header("Location: http://localhost/student_section/stlogout/$user_id");

?>



