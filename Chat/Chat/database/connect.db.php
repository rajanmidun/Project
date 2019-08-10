<?php
   $host= "localhost";
   $username="root";
   $password="";
   $dbname="chat";
   $conn=mysqli_connect($host,$username,$password,$dbname);
   if(mysqli_connect_errno()){
   	echo "Errro has occured";
   }
  

?>