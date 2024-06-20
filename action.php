 <?php
 require "db.php";
 $pid= $_POST['pid1'];
 $stmt= $conn->prepare("SELECT * FROM menu where id =".$pid);
                   $stmt->execute();
                   $result =$stmt->get_result();
                     while($row= $result->fetch_assoc()){
                     	$photo= $row['photo'];
                     	$title= $row['title'];
                     	$price= $row['price'];
                     	$quantity= 1;
        }             	
 $stmt1= $conn->prepare("INSERT INTO chart (photo,title,price,quantity,totalprice,totalamount) VALUES (?,?,?,?,?,?)");
                   $stmt1->bind_param("ssiiii",$photo,$title,$price,$quantity,$price,$price);
                        if($stmt1->execute()){
                        	echo 'Item Added';
                        }else{
                        	echo 'There was a problem, Please contact a waiter or waitres near you.';
                        }
               
?>