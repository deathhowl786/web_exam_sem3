
<?php


$cn = new mysqli("localhost:3307", "root", "", "resume");

if($cn->connect_error){
	echo "Error". $cn->connect_errorno;
}
else{
	echo " Connection Establised!<br>";
}

$sr_no = $_POST['update-no'];
$qty = $_POST['update-qty'];





$query = "SELECT * FROM groceries WHERE sr_no = '".$sr_no."';";
$result = $cn->query($query);

if($result->num_rows > 0){

	$row = $result->fetch_assoc();

	$qty = $row['item_qty'] - $qty;

	$query = "UPDATE groceries SET item_qty = $qty WHERE sr_no = $sr_no";
	$cn->query($query);	

	echo "Item has been consumed";
}else{
	echo "There was an error!";
}



$cn->close();







?>

<a href="./fridge.php">Back to Panel</a>