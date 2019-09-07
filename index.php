<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT oId, o.pId, cld, pName, pDesc, pPrice, cName, cAddress, cContact FROM orders o INNER JOIN products p ON o.oId = p.pld INNER JOIN customers c ON o.cld = c.cId
");
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Purchase Info</title>
  </head>
  <body>
  
    <div class="container">
    <h1>Purchase Info</h1>
    
    <a class="btn btn-primary" href="add.html">Add New Order</a><br/><br/>
    


<table width='80%' border=0>

<tr class="bg-secondary text-white">
	<td>Order ID</td>
  <td>Customer Name</td>
  <td>Address</td>
  <td>Contact</td>
  <td>Product Name</td>
  <td>Product Price</td>
  <td>Product Description</td>
</tr>
<?php 	
while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
  echo "<tr>";
  echo "<td>".$row['oId']."</td>";
	echo "<td>".$row['cName']."</td>";
  echo "<td>".$row['cAddress']."</td>";
  echo "<td>".$row['cContact']."</td>";
  echo "<td>".$row['pName']."</td>";
  echo "<td>".$row['pPrice']."</td>";
  echo "<td>".$row['pDesc']."</td>";
	echo "<td><a class=\"btn btn-secondary\" href=\"edit.php?id=$row[oId]\">Edit</a> | <a class=\"btn btn-danger\" href=\"delete.php?id=$row[oId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
}
?>
</table>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>