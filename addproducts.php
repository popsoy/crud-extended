<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM products order by pId DESC");
?>

<html>
<head>
	<title>Add Data</title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
		<div class="container mt-5">
				<a class="btn btn-primary" href="index.php">Home</a>
	<br/><br/>
			
	<div class="card card-login mx-auto mt-5 ">
        <div class="card-header">ADD Products</div>
        <div class="card-body">
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="1">
			<tr> 
				<td>ProductName</td>
				<td><input type="text" name="pName"></td>
			</tr>
			<tr> 
					<td>Product Description</td>
					<td><input type="text" name="pDesc"></td>
				</tr>
			<tr> 
				<td>Price</td>
				<td><input type="number" name="pPrice"></td>
			</tr>
			<tr> 
				<td>Stocks</td>
				<td><input type="number" name="pStock"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
    </form>
    <table width='80%' border=0>

<tr class="bg-secondary text-white" >
		<td>Product ID</td>
		<td>Product Name</td>
		<td>Price</td>
		<td>Pdesc</td>
		<td>Stocks</td>
		<td>Update</td>
</tr>

<?php 	
while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
    echo "<tr>";
    echo "<td>".$row['pId']."</td>";
    echo "<td>".$row['pName']."</td>";
    echo "<td>".$row['pPrice']."</td>";	
    echo "<td>".$row['pDesc']."</td>";
    echo "<td>".$row['pStock']."</td>";
    echo "<td><a href=\"editproducts.php?id=$row[pId]\">Edit</a> | <a href=\"deleteproducts.php?id=$row[pId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	
	
}

?>

</table>
</div>
</div>
</div>
	
			  </div>
	
	<!-- jquery bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

