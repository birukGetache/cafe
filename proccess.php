<?php
require "db.php";
$filter = $_POST['selectedOption'];
					if($filter == "FOODS"){
  	     
   				   $stmt= $conn->prepare("SELECT * FROM menu where foodor='food'");
                   $stmt->execute();
                   $result =$stmt->get_result();
                     while($row= $result->fetch_assoc()){
                     	?>

<div class="food" >
	 <a href="#"> <div class="fphoto"><img src="<?= $row['photo']?>"></div></a>

	  	 <div class="ftitle" style="margin-left:10px; margin-bottom: -20px; margin-top: 10px;">
	  	 	<b><p style="font-size:22px;"><?= $row['title']?></p></b>
	  	 </div>
	 
	  	 	 <div class="fprice" style="margin-left:10px;display: inline-flex;">
	  	 	 	<b><p style=" margin-top:3px; font-size:18px;"><?= $row['price']?> Birr</p></b>
	  	 	   <a href="#"><button class="addbutton" >ADD</button></a>
	  	 	 </div>
	  	 	 
	 
</div>
<?php }
}
elseif($filter == "DRINKS"){
  	
   				    $stmt= $conn->prepare("SELECT * FROM menu where foodor='drink'");
                   $stmt->execute();
                   $result =$stmt->get_result();
                     while($row= $result->fetch_assoc()){
                     	?>

<div class="food" >
	 <a href="#"> <div class="fphoto"><img src="<?= $row['photo']?>"></div></a>

	  	 <div class="ftitle" style="margin-left:10px; margin-bottom: -20px; margin-top: 10px;">
	  	 	<b><p style="font-size:22px;"><?= $row['title']?></p></b>
	  	 </div>
	 
	  	 	 <div class="fprice" style="margin-left:10px;display: inline-flex;">
	  	 	 	<b><p style=" margin-top:3px; font-size:18px;"><?= $row['price']?> Birr</p></b>
	  	 	   <a href="#"><button class="addbutton" >ADD</button></a>
	  	 	 </div>
	  	 	 
	 
</div>
<?php }
}
else{
	$stmt= $conn->prepare("SELECT * FROM menu");
                   $stmt->execute();
                   $result =$stmt->get_result();
                     while($row= $result->fetch_assoc()){
                     	?>

<div class="food" >
	 <a href="#"> <div class="fphoto"><img src="<?= $row['photo']?>"></div></a>

	  	 <div class="ftitle" style="margin-left:10px; margin-bottom: -20px; margin-top: 10px;">
	  	 	<b><p style="font-size:22px;"><?= $row['title']?></p></b>
	  	 </div>
	 
	  	 	 <div class="fprice" style="margin-left:10px;display: inline-flex;">
	  	 	 	<b><p style=" margin-top:3px; font-size:18px;"><?= $row['price']?> Birr</p></b>
	  	 	   <a href="#"><button class="addbutton" >ADD</button></a>
	  	 	 </div>
	  	 	 
	 
</div>
<?php }
}?>