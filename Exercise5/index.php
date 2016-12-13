<!DOCTYPE html>
<html>
<head>
<title>Musouka</title>

<center>
<img src="logo1.png" width="1500" height="75" align="center">



<center>
<table width="1500" align="center" cellpadding="0" celspacing="0">
<tr>
<td>
<td align="center">
<font face="Eras Medium ITC" size="4" color="#ffffff">
<body a link="black" vlink="black">
<a href="index.html"><b>HOME</b></a>  ||  <a href="Favorites.html"><b>HOBBIES</b></a>  ||  <a href="Gallery.html"><b>GALLERY</b></a>  ||  <a href="Friends.html"><b>FRIENDS</b></a>
</font>
</td>
</tr>
</table>




</head>




<body>




<div class="background">
  <div class="transbox">
    <DIV STYLE="position:absolute; top:420px; left:20px; width:1500px; height:30px">
  <font face="Eras Medium ITC" size="56" color="#db5ee8">
    <h1><b>I AM JOSHUA SPARK CRUZ</b></h1>
	</font>
	</div>
  </div>
</div>



<body background="pink1.jpg">





<img src="iu1.jpg" width="1500" height="500" onmouseover="this.src='iu2.jpg'" onmouseout="this.src='iu1.jpg'"/>

<?php
include_once 'dbconfig.php';
// delete condition
if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
 mysqli_query($con,$sql_query);
 header("Location: $_SERVER[PHP_SELF]");
}
// delete condition
?>

<?php

// define variables and set to empty values
$nameErr = $emailErr = $nicknameErr = $genderErr = $numberErr = "";
$name = $email = $nickname = $address = $number = $gender = $comment = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["number"])) {
    $number = "number is required";
  } else {
    $number = test_input($_POST["number"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[0-9]*$/",$number)) {
      $numberErr = "Invalid Number"; 
    }
  }

  if (empty($_POST["nickname"])) {
    $nickname = "nickname is required";
  } else {
    $nickname = test_input($_POST["nickname"]);
  
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  
    if (empty($_POST["address"])) {
    $address = "";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}


}
?>

<h2>FILL THIS UP</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  
  Nickname: <input type="text" name="nickname" value="<?php echo $nickname;?>">
  <span class="error">* <?php echo $nicknameErr;?></span>
  <br><br>
  
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  
  Number: <input type="text" name="number" value="<?php echo $number;?>">
  <span class="error">* <?php echo $numberErr;?></span>
  <br><br>
  
  Home Address: <input type="text" name="address" value="<?php echo $address;?>">

  <br><br>
  
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $nickname;
echo "<br>";
echo $email;
echo "<br>";
echo $number;
echo "<br>";
echo $address;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

<br>
<br>
<br>

 <?php
 $sql_query="SELECT * FROM users";
 $result_set=mysqli_query($con,$sql_query);
 while($row=mysqli_fetch_row($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
  <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="b_edit.png" align="EDIT" /></a></td>
        <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="b_drop.png" align="DELETE" /></a></td>
        </tr>
        <?php
 }
 ?>

<style>
body {
    background-color: lightblue;
}
p {
    font-family: verdana;
    font-size: 20px;
}

.error {color: #FF0000;}
</style>




<img align="center" src="fb.png" width="60" height="60">
<img align="center" src="9gag.png" width="60" height="60">
<img align="center" src="insta.png" width="60" height="60">
<img align="center" src="qwe.jpg" width="900" height="75">
<img align="center" src="yt.png" width="60" height="60">
<img align="center" src="ka.png" width="60" height="60">
<img align="center" src="ka1.jpg" width="60" height="60">

<p>MY FAVORITE WEBSITES</p>



<p id="demo">My Full Name</p>

<button type="button" onclick="document.getElementById('demo').innerHTML = 'Joshua Spark Rabena Cruz'">Click Me!</button>

<p id="demo1">My Birthday</p>

<button type="button" onclick="document.getElementById('demo1').innerHTML = 'December 5 1998'">Click Me!</button>

<p id="demo2">My Favorite Color</p>

<button type="button" onclick="document.getElementById('demo2').innerHTML = 'Pink'">Click Me!</button>

<p id="demo3">My favorite couple that never happened</p>

<button type="button" onclick="document.getElementById('demo3').innerHTML = 'Joey and Phoebe from friends'">Click Me!</button>

<p id="demo4">My type of girls</p>

<button type="button" onclick="document.getElementById('demo4').innerHTML = '2D'">Click Me!</button>

<br>

<p id="demo">CHANGE HTML TSTYLE</p>

<button type="button" onclick="document.getElementById('demo').style.fontSize='35px'">CLICK HERE</button>

</body>
</html>