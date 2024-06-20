 <?php
 $conn=new mysqli("localhost","root","","qrmenu");
if($conn->connect_error){
  die("connection Failed!".$conn->connect_error);
}
?>