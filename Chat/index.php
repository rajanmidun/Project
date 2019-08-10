<?php
   require('Chat/core.inc.php');
   if(isset($_POST['submit'])){
   	 if(send_message($_POST['sender'],$_POST['message'],$conn))
   	 	echo "Message sent";
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Interface</title>
	<style type="text/css">
		.main_div{
           width: 900px;
           height:600px;
           margin: 0 auto;
		}
		.form{
          text-align: center;
          background-color: green;
          color: white;
          width:30%;
          float: left;
          height: 580px;
          padding: 10px;
          margin-right:5px;
		}
		.display{
           height:600px;
           width:65%;
           overflow:scroll;
           font-size: 23px;
           font-family: serif;
           background-color: blue;
           color: white;
		}
		.message{
			margin-left: 81px;
            margin-top: 5px;
		}

	</style>
</head>
<body>
	<div class="main_div">
	 <div class="form">
		 <form method="post" action="index.php">
		 	<h2>Enter your Message</h2>
    	Sender Name<input type="text" name="sender" /></br>
    	<textarea class="message" name="message" rows="12" cols="23">Enter your message</textarea></br>
    	<input type="submit" value="Send" name="submit">
    </form>
	</div>
	
	<div class="display">
		<h2 style="text-align: center;">Displaying Message</h2>
		<?php
          $messages=get_message($conn);
          foreach ($messages as $message) {
          	foreach ($message as $key => $value) {
          		echo "<strong>".$key."</strong>";
          		echo $value."<br>";
          }
          echo "<br><br>";

          	}
	    ?>
	</div>
</div>
	
	
   
</body>
</html>