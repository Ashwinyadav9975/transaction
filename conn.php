<?php 
$localhost="localhost";
$username="root";
$password="";
try{
$conn=new PDO("mysql:localhost=$localhost;dbname=test",$username="root",$password="");
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 //echo"conncted";
}catch(Exception){
    echo"not connected";
}
?>