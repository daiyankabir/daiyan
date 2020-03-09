  
<?php
session_start();
?>
<html>
	<head>
		<title>Login Page</title>
	</head>
	<body>
		<fieldset align="center">
			<legend>Login Form</legend>
			<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<table align="center">
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" placeholder="Give your name"/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" placeholder="Give your password"/></td>
					</tr>
					
					<tr>
						<td></td>
						<td><input type="submit" name="login" value="Login"/></td>
					</tr>
				</table>
			</form>
		</fieldset>

	</body>
</html>
<?php
if(isset($_POST['login']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";	
$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
	//Retrieve Data

	$password=$_POST['password'];
	$name=$_POST['name'];
	$sql="SELECT * FROM `student` WHERE username='$name' AND password='$password'";
	$result=$conn->query($sql);	
	 if ($result->num_rows > 0)
	{
		 while($row = $result->fetch_assoc()){
		//$_SESSION['name']=$row['name'];
		header("Location:product.php");
		    echo "0 results";
		 }
	}
	else
	{
		echo "No data found.<br/>";
	}

	
mysqli_close($conn);		
}


?>