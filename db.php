<?php

      // $servername="162.241.148.10";
      $servername="localhost";
      $username="root";
      $password="";
      $dbname="shahojun_university_status2";

      date_default_timezone_set('Asia/Calcutta');

      $server_time=date("Y-m-d H:i:s");

      $conn=new mysqli($servername,$username,$password,$dbname);

      if($conn->connect_error){

          
        die("Connection Failed" . $conn->connect_error);
          

      }else{

         // echo "Connected";
    }

?>