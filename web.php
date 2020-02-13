
<html>
<head> <title>Form</title></head>
<body>

<?php

$nameErr=$emailErr=$genderErr=$name=$email="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	//echo $nameErr;
  } else {
      $name = test_input($_POST["name"]);

	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
 
  }
  } 
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	//echo $emailErr;
  } 
  else {
   $email = test_input($_POST["email"]);
	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
	 }
	 
	 
		  
	 
  }
  if(empty($_POST["gender"])){
	  $genderErr="Gender is required";
  } 
  else{
	  $gender=test_input($_POST["gender"]);
  }
}
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2> Registration</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
<b>Name:<b> <input type="text" name="name" value="<?php echo $name;?>">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
<b>Email:<b> <input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
<b>Gender:<b><br>
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="female">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="male">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
value="other">Other
<span class="error">*<?php echo $genderErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php
if($name==""||$email==""||$gender=="")
{ 
echo "\nPlease check";}
else{

         echo "<h2>Your Given details are as :</h2>";
		 
         echo $_POST["name"];
         echo "<br>";
         
         echo $_POST["email"];
         echo "<br>";
		 
		 echo $_POST["gender"];
		 echo "<br>";

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt =  $_POST["name"];

fwrite($myfile, $txt);

$txt = $_POST["email"];

fwrite($myfile, $txt);

$txt= $_POST["gender"];
fwrite($myfile,$txt);

fclose($myfile);


	$dom = new DOMDocument();

		$dom->encoding = 'utf-8';

		$dom->xmlVersion = '1.0';

		$dom->formatOutput = true;

	$xml_file_name = 'form.xml';
$root = $dom->createElement('Form');
$form_node = $dom->createElement('form');


		$attr_form_id = new DOMAttr('form_id', '5467');

		$form_node->setAttributeNode($attr_form_id);

$child_node_name = $dom->createElement('Name',  $_POST["name"]);

		$form_node->appendChild($child_node_name);

		$child_node_email = $dom->createElement('Email',$_POST["email"]);

		$form_node->appendChild($child_node_email);

	$child_node_gender = $dom->createElement('Gender', $_POST["gender"]);

		$form_node->appendChild($child_node_gender);

		

		$root->appendChild($form_node);

		$dom->appendChild($root);

	$dom->save($xml_file_name);

	echo "$xml_file_name has been successfully created";
}
?>	
		 
</body>
</html>