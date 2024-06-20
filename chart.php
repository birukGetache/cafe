 <?php include "db.php";?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="chart1.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<header style="display:flex;">
<h1> CHART</h1>
<a href="#"><i class="fas fa-shopping-cart shopping-cart-icon"></i>
<span>
	
	<?php
    $sql = "SELECT COUNT(*) as count FROM chart";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Access the count value
    $rowCount = $row['count'];

    echo $rowCount;
  }else{
    echo 0;
  }
                      ?>
</span></a>
</header>

<div style="padding-top:80px;"></div>
<?php
					
  	$sql = "SELECT * from chart";

if ($result = mysqli_query($conn, $sql)) {

    $rowcount = mysqli_num_rows( $result );
 }
 if ($rowcount > 0) {


 $stmt= $conn->prepare("SELECT * FROM chart");
                   $stmt->execute();
                   $result =$stmt->get_result();
                     while($row= $result->fetch_assoc()){
                     	$title=$row['title'];
                     if($title=='Water'){
 	?>

<div style="display: inline-flex;  margin-top: 0px; width:100%; flex-wrap: wrap;">
<div class="food" style="display:inline-flex; margin-left: 10px;">
	<div class="photo"><img src="<?= $row['photo']?>"> </div>
	<div class="detail" style="margin-top:25px; margin-left:10px;">
		 <p style="font-weight: bold;"><?= $row['title']?></p>
		 <p style="font-weight: bold;"><?= $row['price']?> birr</p>
	</div>
	<div style="margin-top:10px; margin-left:50px;">
    <input type="number" id="quantity" name="quantity" min="1" value="<?= $row['quantity']?>">
    <br>
       <select>
    	<option style="color:black;" selected>2 L</option>
    	<option style="color:black;">1 L</option>
    	<option style="color:black;">0.5 L</option>
    </select>
  </div>


  <div class="bin" style="margin-top:45px; margin-left:60px;">
    <a href="#"><i class="fas fa-trash-alt delete-icon"></i></a>
  </div>
</div>

<div>




<?php }elseif ($title=='Shekila Tibs' || $title=='Kitfo') { ?>
	
	<div style="display: inline-flex;  margin-top: 10px; width:100%; flex-wrap: wrap;">
<div class="food" style="display:inline-flex; margin-left: 10px;">
	<div class="photo"><img src="<?= $row['photo']?>"></div>
	<div class="detail" style="margin-top:25px; margin-left:10px;">
		 <p style="font-weight: bold;"><?= $row['title']?></p>
		 <p style="font-weight: bold;"><?= $row['price']?> birr</p>
	</div>
	<div style="margin-top:10px; margin-left:50px;">
    <input type="number" onchange="q(<?= $row['price']?>)" id="quantity" id="quantity" name="quantity" min="1" value="<?= $row['quantity']?>">
    <br>
       <select>
    	<option style="color:black;" selected>Full</option>
    	<option style="color:black;">Half</option>
    	<option style="color:black;">Quarter</option>
    </select>
  </div>


  <div class="bin" style="margin-top:45px; margin-left:60px;">
    <a href="#"><i class="fas fa-trash-alt delete-icon"></i></a>
  </div>
</div>



<?php
}else{
?>
	<div style="display: inline-flex;  margin-top: 10px; width:100%; flex-wrap: wrap;">
<div class="food" style="display:inline-flex; margin-left: 10px;">
	<div class="photo"><img src="<?= $row['photo']?>"></div>
	<div class="detail" style="margin-top:25px; margin-left:10px;">
		 <p style="font-weight: bold;"><?= $row['title']?></p>
		 <p style="font-weight: bold;"><?= $row['price']?> birr</p>
	</div>
	<div style="margin-top:10px; margin-left:50px;">
    <input type="number" id="quantity" name="quantity" min="1" value="<?= $row['quantity']?>">
    <br>
      
  </div>


  <div class="bin" style="margin-top:45px; margin-left:60px;">
    <a href="#"><i class="fas fa-trash-alt delete-icon"></i></a>
  </div>
</div>




<?php }?>


<?php }}else{?>
    <div class="fphoto" ><img style="height: 200px; width: 250px; margin-left: 50px; margin-top:100px;" src="photos/emptycart.png"></div>
	<?php }?>

	<div class="totalp">
	   <p style="font-weight:bold; font-size: 20px; margin-top: 30px; margin-left:110px;">Orders with Amount</p>
<?php 
$stmt= $conn->prepare("SELECT * FROM chart");
                   $stmt->execute();
                   $result =$stmt->get_result();
                   $totalamount=0;
                     while($row= $result->fetch_assoc()){
                     	
                     	$totalamount = $totalamount + $row['totalprice']; 
?>

	   <div style="display: inline-flex;">
	   	<p style="font-weight:bold; margin-left:35px;">=> <?= $row['title']?></p>
	   <p style="font-weight:bold; margin-left:150px;"><?= $row['totalprice']?> Birr</p>
      </div>
     

<?php }?>
 <div>
      	<p style="font-weight:bold; font-size: 20px; margin-left:90px; color: #D9534F;">Total Payment = <?php echo $totalamount; ?> Birr</p>
      </div>
</div><br>
<div>
<a href="#" style="width:280px;"><button class="addbutton">Place Order</button></a>
<a href="index.php" style="width:280px;"><button class="addbutton">Back to Menu</button></a>
</div>
</div>
</body>
<script type="text/javascript">
	function q(price){
		var price1 = price;
		var qq= document.getElementById("quantity").value;

		      $.ajax({
        type: 'POST',
        url: 'quantitiy.php', // Replace with your PHP processing file
        data: {price1: price1, qq: qq},
        success: function(response) {
          
        alert(response);
        //location.reload();
        
        }
      });

      
    }
</script>
</html>