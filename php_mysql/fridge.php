
<style>
	table{
		margin: auto;
		width: 80%;
		min-height: 50%;
		text-align: center;
		border: 1px solid black;
		border-collapse: collapse;
	}

	td,th{
		border: 1px solid black;
		border-collapse: collapse;
	}
</style>


<table>
	<thead>
		<tr>
			<th>Sr. no</th>
			<th>Item Name</tdh>
			<th>Quantity</th>
			<th>Total Cost</th>
		</tr>
	</thead>
	<tbody>

<?php


	$cn = new mysqli("localhost:3307", "root", "", "resume");

	if($cn->connect_error){
		echo "Error". $cn->connect_errorno;
	}
	else{
		echo " Connection Establised!<br>";
	}

	$query = "SELECT * FROM groceries;";
	$result = $cn->query($query);

	while($row = $result->fetch_assoc()){
		$s = $row['sr_no'];
		echo"<tr>
				<td>".$row['sr_no']."</td>
				<td>".$row['item_name']."</td>
				<td class=\"item_qty\" id=\"$s\">".$row['item_qty']."</td>
				<td>".$row['total_cost']."</td>
			</tr>";

	}




?>
	</tbody>
</table>

<form id="form" action="updateItem.php" method="post" style="display: none;">
	<input type="number" name="update-no" id="update-no">
	<input type="number" name="update-qty" id="update-qty">
</form>

<script src="../jquery/jquery.js"></script>
<script>
	$(document).ready(function(){
		$(".item_qty").on("click", function(){
			var qty = window.prompt("Enter Quantity to consume");
			if(parseInt(qty) > parseInt($(this).text())){
				alert("Not enough Quantity!");
			}else{
				$("#update-qty").val(parseInt(qty));
				$("#update-no").val(parseInt($(this).attr("id")));

				console.log($("#update-qty").val());
				console.log($("#update-no").val());

				$("#form").submit();
			}
		});
	})
</script>