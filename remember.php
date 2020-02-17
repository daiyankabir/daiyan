<html>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Current password: <input type="password" name="cp" ><br>
New password: <input type="password" name="np"><br>
Retype password:<input type="password" name="rtp"><br>
<input type="button" name="submit" value="submit">

</body>
<?php
$current = $new= $retype=$cpErr=$newErr=$rtpErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
    $cpErr = "Name is required";
  } else {
  $current = test_input($_POST["cp"]);
  }
  if (empty($_POST["name"])) {
    $newErr = "Name is required";
  } else {
  $new = test_input($_POST["np"]);
  }
  if (empty($_POST["name"])) {
    $rtpErr = "Name is required";
  } else {
  $retype = test_input($_POST["rtp"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<?php
$_SESSION["cp"] = $current;
$_SESSION["np"] = $new;
$_SESSION["rtp"] = $retype;
echo "Session variables are set.";

?>
</html>