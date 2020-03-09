<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	Product ID:<input type="text" name="pid"><br>
	Product Name:<input type="text" name="name"><br>
	<textarea name="message" rows="4" cols="10">Description:
	</textarea><br>
	Quantity:<input type="text" name="quantity"><br>
	<input type="submit" name="insert" value="insert">
	
	<br>
		<h1>Want to DELETE something:</h1>

ID:<input type="text" name="ID"><br>
<br>
<input type="submit" name="DELETE" value="DELETE"><br>
<br>
	<h1>Your Result:</h1>
	</form>
	
	
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$id= $_POST['pid'];
$name = $_POST['name'];
$description = $_POST['message'];
$quantity = $_POST['quantity'];

if($id !=''||$name !=''||$quantity !=''){


$sql = "INSERT INTO Product (ID, Name, Description,Quantity)
VALUES ('$id','$name','$description','quantity')";
}
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "SELECT * FROM Product";
$result = $conn->query($sql);


 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "ID: " . $row["ID"]." ". " Name: " . $row["Name"]. " " ."Description:". $row["Description"]." "."Quantity:".$row["Quantity"]."<br>";
        
    echo "0 results";
}




$sql = "DELETE FROM MyGuests WHERE ID='$id'";

if ($conn->query($sql) == TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
 }


mysqli_close($conn);
?>	
</form>
</body>
</html>