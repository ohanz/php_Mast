<!DOCTYPE HTML>  
<html>
<head>
  <title>Form 2 | FORMA</title>
<style>
.error {color: #FF0000; font-weight: bold}
input[type='text']{
   height: 35px;
}
input[type='radio']{
   height: 20px;width: 20px;position: relative; left:5px;font-weight: bold
}
  div.gender span {
   position: relative; top:3px; left: 7px
}
div.gender input{
  position: relative; top: 5px; 
}
#spanComment {
  position: relative; top: -20px;
}
span{font-weight: bold}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    // $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
    // elseif(!)
    else {
      // $modified = str_replace('$','',$name);
      // $name = "";
      // $name = $modified = test_input($_POST["name"]);
      $name = preg_replace('/[^a-zA-Z0-9\s]/', '',strip_tags(html_entity_decode($_POST["name"]))) ;
      // echo 'the user'. $name;
      test_input($name);

      // test_input($_POST["name"]);
      // $name = test_input($_POST["name"]);

  }
}
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    // $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
     }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    // $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    // if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
    //   $websiteErr = "Invalid URL";
    // } else $website = test_input($_POST["website"]);
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Test</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<span> Name: </span><input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <span>E-mail: </span><input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <span>Website: </span><input type="text" name="website">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
 <span id="spanComment">Comment:</span> <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  <div class="gender">Gender:
  <input type="radio" name="gender" value="female"><span>Female</span>
  <input type="radio" name="gender" value="male"><span>Male</span>
  <input type="radio" name="gender" value="Hyper" <?php if (isset($gender) && $gender=="Hyper") echo "checked";?>><span>Hyper</span>
  <span class="error">* <?php echo $genderErr;?></span></div>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
// echo 'Username: '.$name;
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

<br/><span style="margin-right: 30px"> Back to Previous: <a href="myForm.htm">Form1</a></span>
<a href="downloadImg2.php?file=sm.png">Download Image</a><br/>
<a href="downloadImg2.php?file=pp.png">Download Image 2</a><br/><br/>
<a href="downloadVid.php?file=soft-beat-sound.mp3">Download Hyper File</a><br/><br/>
<a href="downloadFiles.php?file=hyper.php">Download Doc</a><br/><br/>
<h2>Upload Files Here</h2><br/>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="document">
    <button type="submit">Upload Now</button>
</form>
<br/><br/>

<h2>Upload Allowed/Strict Files</h2><br/>
<form action="uploadAdv.php" method="post" enctype="multipart/form-data">
		<input type="file" name="document">
		<button type="submit">Upload</button>
	</form>

<br/><br/>

</body>
</html>