<?php include "db.php"; ?>

<?php include "user_header.php"; ?>

<?php 

 session_start();

	if($_SESSION['stud_login']!='true'){

		// header("Location: https://www.shahgre.com/studentsection/Student");
    header("http://localhost/student_section/Student");
	  
	} else if($_SESSION['stud_login']=='true'){

    $user_id = $_SESSION['id'];

    $now = time();
    $aj = 0;

        // checking the time now when home page starts

        if($now > $_SESSION['expire'])

        {

            session_destroy();
          

            // echo "<p align='center' style='font-size:25px;'>Your session has expired ! <a href='https://www.shahgre.com/studentsection/Student'>Login Here</a></p>";
             echo "<p align='center' style='font-size:25px;'>Your session has expired ! <a href='http://localhost/student_section/Student'>Login Here</a></p>";

        }

        else

        {    


 ?>



<?php // include "sidebar"; ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">

html {
  scroll-behavior: smooth;
}

body{
  scroll-behavior: smooth!important;
}

@media screen and (min-width: 650px){
	.direct-chat-messages{
		/*height:600px!important;*/
		height: 650px!important;
		max-height: 650px;

		overflow-y: scroll!important;
	}

	.margin_left{

	margin-left: 19%;
}

#goto{
  display: none;
  visibility: hidden;
}


}
	.direct-chat-text{
		    /*margin: 8px 0 0 50px!important;*/
		    padding: 8px 6px !important;
	}

@media screen and (max-width: 600px){
	.direct-chat-messages{
		/*height:600px!important;*/
		height: 400px!important;
		overflow-y: scroll!important;
    scroll-behavior: smooth!important;
	}

  #goto{
  display: all!important;
  visibility: visible!important;
}

}

.direct-chat-primary .right>.direct-chat-text {
    background: #2f3562;
    border-color: #2f3562;
    color: #fff;
}

.direct-chat-primary .right>.direct-chat-text:after, .direct-chat-primary .right>.direct-chat-text:before {
    border-left-color: #2f3562;
}

.btn-primary {
    background-color: #2f3562;
    border-color: #2f3562;
}

.box.box-primary {
    border-top-color: #2f3562;
}


/* Top Navigation*/


.w3-teal, .w3-hover-teal:hover {
    color: #fff !important;
background-color:#2f3562 !important;
line-height: 4;

}

.w3-sidebar {
   	color: white;
    background-color: #c4191f;
}


@media screen and (max-width: 600px) {
	

  .show_hide{
		display: none;
	}
  

.w3-container{
  	float: right;
  	padding-top: 5px;
  	padding-bottom: 5px;
  	line-height: 2;
  }

  .w3-teal, .w3-hover-teal:hover {
   
	line-height: 2;

}


  .input-boxx{
  	position: relative;
    margin-top: -13px;
  }

.content{
	padding: 0px!important;
	margin-top: 5px;
}

.margin_left{

	margin-left: 0px!important;
}


}

a.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  background-color: #c4191f;
  padding: 10px;
  font-size: 10px;
  float: right;
}

i {
  border: solid white;
  border-width: 0 4px 4px 0;
  display: inline-block;
  padding: 3px;
}.up {
  transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
}


</style>

<body class="skin-blue">

<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <div style="padding-left: 20px; margin-top: 50px;" >
	  <h2>Hi <?php echo ucfirst($_SESSION['name']); ?></h2>
    <a href="logout1"><button class="btn btn-sm btn-danger" style="background-color: #2f3562;" type="button"><i class="fa fa-trash-o" style="margin-right: 5px; font-size: 15px;"></i>Dashboard</button></a>
    <br/><br/><br/><br/><br/>
	  <a href="logout"><button class="btn btn-sm btn-danger" style="background-color: #2f3562;" type="button"><i class="fa fa-trash-o" style="margin-right: 5px; font-size: 15px;"></i>Log Out</button></a>
	  <br/><br/><br/><br/><br/>
	  <button class="btn btn-sm btn-danger" style="background-color: #2f3562;" type="button" onclick="deletes();"><i class="fa fa-trash-o" style="margin-right: 5px; font-size: 15px;"></i>Clear Chat</button>
  </div>
  <!-- <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a> -->
</div>

<div class="w3-main" style="margin-left:200px">
	<div class="w3-teal">
	  <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>

    <a class="btn btn-primary" id="goto" style="background-color: #27ae60; border-color: #bdc3c7;" href="logout1">Go to Dashboard</a>
	  <div class="w3-container">
	    <img src="images/200x84.png"> 
	  </div>
	</div>
</div>
 

<span id="ref" onload> 

<!-- Content Wrapper. Contains page content -->

  <!-- <div class="content-wrapper"> -->

       
    <!-- Main content -->
    <section id="chat-scroll" class="content container-fluid margin_left">


      <div  class="col-md-8 col-sm-12 col-xs-12" >
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border" >
              <h4  style="text-align: center!important; line-height: 1px; color: #c4191f; font-weight: bold;" ><img class="direct-chat-img" src="images/veronica.png" alt="Veronica" style="float: none!important;"> Smart Student Assistant</h4>

              
            </div>
            
			<!-- <button class="btn btn-sm btn-danger" style="background-color: #c4191f;" type="button" onclick="deletes();"><i class="fa fa-trash-o" style="margin-right: 5px; font-size: 15px;"></i>Clear Chat</button> -->

            <!-- /.box-header -->
            <!-- <div class="box-body"> -->
              <!-- Conversations are loaded here -->
              
              <div  id="contents" class="direct-chat-messages" >
              	<div >

              		<div id='first_msg' class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right" style="color: #c4191f;">Veronica</span>
                        <span class="direct-chat-timestamp pull-left">1 Jan 5:00 AM </span>
                      </div>
                     
                      <img class="direct-chat-img" src="images/veronica.png" alt="Message User Image">
                      <div class="direct-chat-text" style="text-align: left;">
                        Hello <?php echo ucfirst($_SESSION['name']); ?>, I am Veronica. Welcome to SHAH Overseas!
                      </div>
                      <div class="direct-chat-text" style="text-align: left;">
                        I am here to help you with :-<br/>
                        1. GRE<br/>2. TOEFL<br/>3. IELTS<br/>4. University Application<br/>5. Visa<br/>

                        Please reply with the choice from above options

                      </div>
                      
                    </div>
                    <!-- /.direct-chat-msg -->
              	   <a href="#first_msg" class="sticky" style="border-radius: 10%;"><i class="arrow up"></i></a>

                     <?php

                     	

					    $query="select * from chats where del_msg='1' and user_id='$user_id' ORDER by date ASC";

					    $res=mysqli_query($conn,$query);
					    while($data=mysqli_fetch_array($res)){
					      $user=$data['user'];
					      $chatbot=$data['chatbot'];
					      $date=$data['date'];
					      $idd=$data['id'];
					      $timestamp =strtotime($date);

					      $action = $data['action'];

					      $child1 = date('n.j.Y', $timestamp); // d.m.YYYY
					      $child2 = date('g:i a', $timestamp); //HH:ss
					      $dt = date('d M g:i a', $timestamp); //HH:ss
					  ?>
            
					  <?php if($action=='text'){ ?>

              
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo ucfirst($_SESSION['name']); ?></span>
                        <span class="direct-chat-timestamp pull-right"><?php echo $dt;?> </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="images/avaatar.png" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text" >
                        <?php echo ucfirst($user); ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                   
                  

                     <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right" style="color: #c4191f;">Veronica</span>
                        <span class="direct-chat-timestamp pull-left"><?php echo $dt;?> </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="images/veronica.png" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div id="p<?php echo $idd; ?>" class="direct-chat-text">
                        <?php 
                        $aj = $idd;

                        echo $chatbot;?>

                        <?php //$chatbot = explode(";", $chatbot);
                        // 	foreach ($chatbot as $key => $value) {
                        // 		echo $value;
                        	//}
                         ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    

              
              <?php } else if($action=='query'){ ?>

              	<!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo ucfirst($_SESSION['name']); ?></span>
                        <span class="direct-chat-timestamp pull-right"><?php echo $dt;?> </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="images/avaatar.png" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text" >
                        <?php echo ucfirst($user); ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->


              	<!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right" style="color: #c4191f;">Veronica</span>
                        <span class="direct-chat-timestamp pull-left"><?php echo $dt;?> </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="images/veronica.png" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text" >
                        <?php  
                        	eval("\$chatbot = \"$chatbot\";");
                            echo $chatbot;
                        ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->


              	
                <?php } else if($action=='media'){ ?>


                	  <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo ucfirst($_SESSION['name']); ?></span>
                        <span class="direct-chat-timestamp pull-right"><?php echo $dt;?> </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="images/avaatar.png" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text" >
                        <?php echo ucfirst($user); ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->


                	<!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right" style="color: #c4191f;">Veronica</span>
                        <span class="direct-chat-timestamp pull-left"><?php echo $dt;?> </span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="images/veronica.png" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        <?php  
                        	echo $chatbot;
                        ?>
                      </div>

                      <div class="direct-chat-text" style="text-align: right;">
                      	<h6><?php echo $data['file']; ?></h6>
                        <a href="uploads/<?php echo $data['file'];?>" target="_blank" ><button class="btn-sm btn-warning">Open</button></a>  
                        <a href="uploads/<?php echo $data['file'];?>" download><button class="btn-sm btn-success">Download</button></a>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
              	

                <?php }  ?>

          <?php  } //while() ?>

           
            </div>	

            

          </div>
              <!--/.direct-chat-messages-->

             
            <!-- </div> -->
            <!-- /.box-body -->

            <div class="box-footer input-boxx">
             <!--  <form action="#" method="post"> -->
                <div class="input-group">
                  <input type="text" class="form-control message" id="msg" placeholder="Type Message ..." required="required">
                      <span class="input-group-btn">
                        <button class="btn btn-primary btn-flat" type="button" onclick="send()"> Send </button>
                      </span>
                </div>
              <!-- </form> -->
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>

         
    </section>
    <!-- /.content -->

 <!--  </div> -->

  <!-- /.content-wrapper -->


</span>
</body>		
</html> 


<?php include "user_footer.php"; ?>

<script type="text/javascript">

// function myFunction() {
//   var elmnt = document.getElementById("p<?php echo $aj; ?>");

//   elmnt.scrollIntoView();
// }

// function scrollDown(){
// 			var elmnt = document.getElementById("contents");
// 		    var h = elmnt.scrollHeight;
// 		   $('#contents').animate({scrollTop: h}, 100);
// 		}
	
// function scrollDown(){

// 	$(document).ready(function() {
//     $('#chat-scroll').animate({
//         scrollTop: $('#chat-scroll').get(0).scrollHeight
//     }, 2000);
// });

// }
var msgList = document.getElementById("p<?php echo $aj; ?>");




  function send(){
    var text=$('#msg').val().toLowerCase();
    		// alert(<?php echo $_SESSION['id'];?>);
if(text!=''){
   
     $.ajax({
                type:"post",
                url:"mysearch",
                data:{text:text},
                success:function(data){
                    //alert(data);
                    $('#ref').load(' #ref');
                    
                     
                }
      });

    
	}else{
		$('.message').focus();
	}


  }

// 	

  function deletes(){

  	// alert('hello');

	$.ajax({
				type:"post",
				url:"deletes",
				success:function(){
					$('#ref').load(' #ref');
			}
		});
	}


	

</script>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}


</script>



<?php

    } // else of if($now > $_SESSION['expire'])

 }//else

?>