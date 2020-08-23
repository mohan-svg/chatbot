
<?php 

include "db.php";

ob_start();

$id=$_GET['ssf'];

// echo $id;

 session_start();

if(($id!='')){

  $sql = "SELECT * FROM student WHERE stud_id='$id' AND stud_login='true'";

  $query = mysqli_query($conn,$sql);

  $count = mysqli_num_rows($query);

    // header("signin.php");

    if($count=="0"){

        $_SESSION["error"]="You are not Authorized User";
      
        // header("https://www.shahgre.com/studentsection/Student");
        header("http://localhost/student_section/Student");
      
    } else{
        while($row = mysqli_fetch_array($query)){
              
                $id= $row['stud_id'];
                $name=$row['firstname'];
                $username = $row['username'];
              
                $_SESSION["id"] = $id;
                $_SESSION["name"] = $name;
                $_SESSION["username"] = $username;

                $_SESSION["stud_login"] = 'true';
                
                echo $_SESSION["id"]." ".$_SESSION["name"]." ".$_SESSION["username"]." ".$_SESSION["stud_login"];

                $_SESSION['start_time'] = time();
        
                echo $_SESSION['start_time']; 
                 // taking now logged in time
                 $_SESSION['expire'] = $_SESSION['start_time'] + (1 * 60 * 60) ; //1 HR
                 
                               
                // $conn->close();

                header("Location:chatbot");
                
                ob_end_flush();
            }
        }
 
 }  else{
          // header("https://www.shahgre.com/studentsection/Student");
          header("http://localhost/student_section/Student");
    }

 ?>
