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
   height: 20px;width: 20px;position: relative; left:5px;
}
  div.gender span {
   position: relative; top:3px; left: 7px
}
div.gender input{
  position: relative; top: 5px; 
}
#spanComment {
  position: relative; top: -20px
}
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
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
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
  <input type="radio" name="gender" value="other"><span>Hyper</span>
  <span class="error">* <?php echo $genderErr;?></span></div>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
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

<br/><span> Back to Previous: <a href="myForm.htm">Form1</a></span>

</body>
</html>