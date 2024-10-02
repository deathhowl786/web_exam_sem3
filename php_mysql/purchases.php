<?php


$cn = new mysqli("localhost:3307", "root", "", "resume");

if($cn->connect_error){
	echo "Error". $cn->connect_errorno;
}
else{
	echo " Connection Establised!<br>";
}

$name = $_POST['item-name'];
$qty = $_POST['item-qty'];
$amt = $_POST['item-qty']*$_POST['item-price'];




$query = "SELECT * FROM groceries WHERE item_name = '".$_POST['item-name']."';       ";
$result = $cn->query($query);

if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	$sr_no = $row['sr_no'];
	$qty += $row['item_qty'];
	$amt += $row['total_cost'];

	$query = "UPDATE groceries SET item_qty = $qty WHERE sr_no = $sr_no";
	$query1 = "UPDATE groceries SET total_cost = $amt WHERE sr_no = $sr_no";

	$cn -> query($query);
	$cn ->query($query1);

	echo "Item Updated in Grocery List";
}else{

	$query = "INSERT INTO groceries VALUES('$name', $qty, $amt, NULL);";

	$cn->query($query);

	echo "Item Add in Groceries!";
}



$cn->close();







?>