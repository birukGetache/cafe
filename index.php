 <?php require 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="index1.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<header style="display:flex;">
<h1 > MENU</h1>
<a href="chart.php"><i class="fas fa-shopping-cart shopping-cart-icon"></i>
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
<form>
<select id="selectOption" class="filter1">
	 
	<option style="color: black;" selected>ALL</option>
	<option style="color: black;">FOODS</option>
	<option style="color: black;">DRINKS</option>
</select>
</form>
<div id="result1"></div>
<div id="result" style="display: inline-flex; margin-top: 110px; width:100%; flex-wrap: wrap;">
<?php
					
  	
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
	  	 	   <a onclick="addbutton(<?= $row['id']?>)"><button class="addbutton" >ADD</button></a>
	  	 	 
	  	 	 </div>
	  	 	 
	 
</div>
<?php }?>
</div>

<script>

  $(document).ready(function() {
    $('#selectOption').change(function() {
    
       var selectedValue = $(this).val();
       
      // Send selected value to the server using AJAX
      $.ajax({
        type: 'POST',
        url: 'proccess.php', // Replace with your PHP processing file
        data: { selectedOption: selectedValue },
        success: function(response) {
          // Update the result div with the server response
          $('#result').html(response);
        }
      });
    });

  });


     function addbutton(pid){
     
       var pid = pid;
      $.ajax({
        type: 'POST',
        url: 'action.php', // Replace with your PHP processing file
        data: { pid1: pid },
        success: function(response) {
          // Update the result div with the server response
         alert(response);
        // $('#result1').html(response);
        }
      });
    }

function updateRowCount() {
        $.ajax({
            url: 'getRowCount.php', // PHP script to get row count
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#rowCount').text('Number of rows in the table: ' + response.count);
            },
            error: function(error) {
                console.error('Error fetching row count: ' + error.responseText);
            }
        });
    }
    updateRowCount();

    setInterval(updateRowCount, 1000);
   
</script>

</body>
</html>