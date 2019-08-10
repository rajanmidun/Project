<?php
  function get_message($conn){
  	$sql="select SENDER,MESSAGE from chat order by MESSAGE_ID desc";
  	$result=mysqli_query($conn,$sql);
  	if($result){
  		$messages=array();
  	    while($message=mysqli_fetch_assoc($result)){
  	    	$messages[]=array('Sender Name: '=>$message['SENDER'],'Message: '=>$message['MESSAGE']);
  	}
  	return $messages;
  	}
  	else
  		return false;
  	
    }
  function send_message($sender,$message,$conn){
  	 if(!empty($sender) &&!empty($message)){
  	      $sql="insert into chat values(null,'$sender','$message')";
  	      $result=mysqli_query($conn,$sql);
  	      if($result){
                return true;
  	      }
  	      else
  	      	return false;
          
  	  }
  	else{
       return false;
  	}
  }
?>