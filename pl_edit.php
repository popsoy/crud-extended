<?php
// including the database connection file
include_once("config.php");




if(isset($_POST['Submit']))
{	
	$pId = $_POST['pId'];
	$pName = $_POST['pName'];
	$pDesc = $_POST['pDesc'];
	$pPrice = $_POST['pPrice'];
	$pStock = $_POST['pStock'];	
	
	// checking empty fields
	if(empty($pName) || empty($pDesc) || empty($pPrice)  || empty($pStock)) {	
			
		if(empty($pName)) {
			echo "<h4 class=\"text-danger\">Customer Name field is empty.</h4><br/>";
		}
		if(empty($pDesc)) {
			echo "<h4 class=\"text-danger\">pDesc field is empty.</h4><br/>";
		}
		if(empty($pPrice)) {
			echo "<h4 class=\"text-danger\">pPrice field is empty.</h4><br/>";
		}

		if(empty($pStock)) {
			echo "<h4 class=\"text-danger\">Stock Name field is empty.</h4><br/>";
		}

	} else {	
		//updating the table
		$sql = "UPDATE products SET pName=:pName, pDesc=:pDesc, pPrice=:pPrice, pStock=:pStock WHERE pId=:pId";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':pId', $pId);
		$query->bindparam(':pName', $pName);
		$query->bindparam(':pDesc', $pDesc);
		$query->bindparam(':pPrice', $pPrice);
		$query->bindparam(':pStock', $pStock);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':pId' => $pId, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		// header("Location: index.php");
	}
}
?>


<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	<?php
//getting pId from url
// $pId = $_GET['pId'];

//selecting data associated with this particular pId
$result = $dbConn->query("SELECT * FROM products order by pId DESC");
// $sql = "SELECT * FROM products WHERE pId=:pId";

// $query = $dbConn->prepare($sql);
// $query->execute(array(':pId' => $pId));

// while($row = $query->fetch(PDO::FETCH_ASSOC))
// {
// 	echo "<tr>";
// 	echo "<td>".$row['pId']."</td>";
//     echo "<td>".$row['pName']."</td>";
//     echo "<td>".$row['pPrice']."</td>";	
//     echo "<td>".$row['pDesc']."</td>";
//     echo "<td>".$row['pStock']."</td>";
// }
// 
?>

	<form name="form1" method="post" action="edit.php">
	<table border="0">
			<tr> 
				<td>Product Name</td>
				<td><input type="text" name="pName" value="<?php echo $row['pName'];?>"></td>
			</tr>
			<tr> 
				<td>Descriptions</td>
				<td><input type="text" name="pDesc" value="$row['pDesc']"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="number" name="pPrice" value="$row['pPrice']"></td>
			</tr>
			<tr> 
				<td>Stocks</td>
				<td><input type="number" name="pStock" value="$row[pStock]"></td>
			</tr>
			<tr>
				<!-- <td><input type="hidden" name="pId" value=<?php echo $_GET['pId'];?>></td> -->
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
			
		</table>
	</form>
	
</body>
</html>
