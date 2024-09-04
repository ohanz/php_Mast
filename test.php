<!-- a prpject to re-master php-->

<?php
  $name = 'Ohanzo';
  $ageMax = 34;
 $ageLim = 25;
 $myAge= 20;
echo "<h1> My Name is $name</h2>". "<h2> and I am " .$myAge. " years old. </h2>" ;

  if($ageMax > $myAge && $myAge < $ageLim) {
    echo "<i>Jahda's Reply: </i>"."<br /><h3>You're not Eligible.</h3>";
}
elseif($ageMax < $myAge && $myAge > $ageLim ){
  echo "<i>Jahda's Reply: </i>"."<br /><h3>You're not Eligible.</h3>";
}
elseif($ageMax > $myAge && $myAge < $ageLim){
  echo "<i>Jahda's Reply: </i>"."<br /><h3>You're Eligible.</h3>";
}


?>