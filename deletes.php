

<?php

     include "db.php";

     session_start();
	
	$user_id = $_SESSION['id'];
				
				
     $quer = mysqli_query($conn,"UPDATE chats SET del_msg = '0' WHERE user_id = '$user_id'");

     // $quer = mysqli_query($conn,"UPDATE chats SET del_msg = '0'");

     echo "deleted";


?>