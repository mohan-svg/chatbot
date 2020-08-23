<?php
include"db.php";
  
$server_time=date("Y-m-d H:i:s");
session_start();

$user_id = $_SESSION['id'];

if(isset($_POST['text'])){

$msg=mysqli_real_escape_string($conn,$_POST["text"]);

// $query=mysqli_query($conn,"SELECT * FROM question WHERE question RLIKE '[[:<:]]".$msg."[[:>:]]'");  // matches only part of question ex. gre on what is gre? 
$query=mysqli_query($conn,"SELECT * FROM question WHERE question LIKE '".$msg."'");



$count = mysqli_num_rows($query);

    if($count=="0"){
      
        $data = "I am Sorry but I am not exactly clear how to help you <br/>Please choose questions from the given list";
        // $query4=mysqli_query($conn,"insert into chats(user_id,user,chatbot,date,action)values('$_SESSION["id"]','$msg','$data','$server_time','text')");
        // $query4=mysqli_query($conn,"insert into chats(user,chatbot,date,action)values('$msg','$data','$server_time','text')");
        $query4=mysqli_query($conn,"insert into chats(user_id,user,chatbot,file,date,action)values('$user_id','$msg','$data','','$server_time','text')");
      
    }else{

        while($row = mysqli_fetch_array($query)){
              
                $data= $row['answer'];
                $action=$row['action'];
                $file = $row['file'];
              
                // $query4=mysqli_query($conn,"insert into chats(user_id,user,chatbot,date,action)values('$_SESSION["id"]','$msg','$data','$server_time','$action')");
                //$query4=mysqli_query($conn,"insert into chats(user,chatbot,date,action)values('$msg','$data','$server_time','$action')");
                $query4=mysqli_query($conn,"insert into chats(user_id,user,chatbot,file,date,action)values('$user_id','$msg','$data','$file','$server_time','$action')");
            }
        } //else
}  
?>



