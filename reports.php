<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #DFD3C3;
  color: white;
}
</style>
</head>
<body>

<h2 align="center">Database Reports</h2>
<h3><u>Prodect Table</u></h3>

<table>
<?php
      require("config.php");
      $sql = "select * from product";
    $result = $conn->query($sql);
	

if ($result->num_rows > 0) {
  echo "<th>Prodoct ID</th>
    <th>Prodoct Name</th>
    <th>Prodoct Price</th>
	<th>Prodoct Qty</th>
	<th>Prodoct image</th>
	<th>Prodoct Code</th>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["product_name"]."</td><td>".$row["product_price"]."</td><td>".$row["product_qty"]."</td><td>".$row["product_image"]."</td><td>".$row["product_code"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
   echo "<br><br>";

?>
<h3><u>Orders Table</u></h3>
<table>
<?php
      require("config.php");
      $sql = "select * from orders";
    $result = $conn->query($sql);
	

if ($result->num_rows > 0) {
  echo "<th>Order ID</th>
    <th>Order Name</th>
    <th>Email</th>
	<th>Phone</th>
	<th>Adders</th>
	<th>Pmode</th>
	<th>Prodects</th>
	<th>Amount Paid</th>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["address"]."</td><td>".$row["pmode"]."</td><td>".$row["products"]."</td><td>".$row["amount_paid"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
   echo "<br><br>";

?>
<?php
    require("config.php");
    $sql = "SELECT COUNT(*) FROM product";
    $results = $conn->query($sql);
	while($row = mysqli_fetch_array($results)) {
    echo "<b style=color:black>Total Product Number is:&nbsp&nbsp<b>". $row['COUNT(*)'];
    echo "<br><br>";
 
}

$conn->close();
?>
<?php
    require("config.php");
    $sql = "SELECT COUNT(*) FROM login";
    $results = $conn->query($sql);
	while($row = mysqli_fetch_array($results)) {
    echo "<b style=color:black>Total Number of Customers:&nbsp&nbsp<b>". $row['COUNT(*)'];
    echo "<br><br>";
 
}

$conn->close();
?>
<?php
    require("config.php");
    $sql = "SELECT max(product_price) as maxminim FROM product";
    $results = $conn->query($sql);
	while($row = mysqli_fetch_array($results)) {
    echo "<b style=color:black>Most Expinsive Product:&nbsp&nbsp<b>". $row['maxminim'];
    echo "<br><br>";
 
}

$conn->close();
?>

</body>
</html>



