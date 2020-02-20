<!DOCTYPE html>
<html>
<head>
	<title>MyGuests</title>
</head>
<body>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
	First Name: <input type="text" name="firstname"><br>
	Last Name: <input type="text" name="lastname"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit">
	</form>
	
</body>
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
?>
<?php

 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

if($firstname !=''||$lastname !=''||$email !=''){


$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$firstname','$lastname','$email')";
}
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);


 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
    echo "0 results";
}

$sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
	
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
mysqli_close($conn);
?>
</html>