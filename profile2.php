<?php
session_start();
?>

<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="files/css/reset.css">
<link href="files/css/font-awesome.min.css" rel="stylesheet">
<link href="files/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="files/animate/animate.css" />
<link rel="stylesheet" href="files/animate/set.css" />
<link href='files/fonts/sans.css' rel='stylesheet' type='text/css'>
<link href="files/css/profile2.css" rel="stylesheet" type="test/css">
<style>
#backs{
background-image:url();
background-size: cover;
}
    
#lines{
    margin-top: 0px;
    width:100%;
}


#bank-name{
  width: 400px;
}

#bank-name img{
  width: 200px;
  margin-top:0px;
}

.nav-div{
  width:100%;
  height:70px;
  background:white;
}

.nav-div ul{
    position:absolute;
    list-style: none;
 }

 .nav-div li{
  float:left;
  display: inline-block;;

}

 .nav-div a{
  font: Roboto,Arial,Helvetica;
    margin-top:15px;
    text-decoration: none;
    width:150px;
    color: black;
    display: block;
    padding: 10px;
    text-align: center;
  
}

.nav-div a:hover{
 color: #12DAD1;
 text-decoration: none;
}

.nav-div a:active{
 color: #12DAD1;
}

    @font-face {
    font-family: myFirstFont;
    src: url(files/css/Redressed.ttf);
    font-weight: bold;
}

#area{
font-family: myFirstFont;
font-size: 70px; 
text-align: center;    
}
    
  
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    margin-left: -5%;
}

.button5 {
    background-color: transparent;
    color: black;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #555555;
    color: white;
} 
 #with_form{
font-size: 28px;
margin-top:80px;
text-align: center; 
}
#with_form b{  
color: black;
}

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
   

#zxc {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 15px;
	width:50%;
	margin-left:350px;
	margin-top:10px;
} 

</style>
</head>
<?php 
  $conn=mysqli_connect("localhost","root","");
  $sql=mysqli_select_db($conn,'bank');
  $accno=$_SESSION['accno'];
  $sql=mysqli_query($conn,"select * from account where accountno='$accno'");
  $row=mysqli_fetch_assoc($sql);
  
  $name=$row['name'];$add=$row['address'];$phone=$row['phone'];$age=$row['age'];$aadhar=$row['aadhar'];  

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $name=$_POST['name'];
    $add=$_POST['address'];
    $phone=(float)$_POST['phone'];
    $age=(int)$_POST['age'];
    $gender=$_POST['gender'];
    $aadhar=$_POST['aadhar']; 	
    
	$sql=mysqli_query($conn,"update account set name='$name',address='$add',phone=$phone,age=$age,
	gender='$gender',aadhar='$aadhar' where accountno='$accno';");
    
	$_SESSION['name']=$name;
	
	header('Location:profile.php');
   }
?>
<body id="backs">
<div id="lines-div">
<img id="lines" src="images/lines1.png">
</div>    
 <div class="nav-div">
    <ul>
         <li id="bank-name"><img src="images/logo2.png"> </li>
         <li><a href="2.php">Home</a></li>
         <li><a href="transfer.php">Transfer</a></li>
         <li><a href="cards.php">Cards</a></li>
         <li style="background:#66ccff;padding-bottom:15px;"><a href="profile.php">Profile</a></li>
         <li><a href="logout.php">Log Out</a></li>
		 <li style="margin-top:-10px;"><a href=""><b> <?php echo "WELCOME<br>".$_SESSION['name'];?> </b> </a> </li>
		 
     </ul>    
</div>

<div id="zxc">
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    <label for="fname">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name;?>">

	<label for="address">Address</label>
    <input type="text" id="address" name="address" value="<?php echo $add;?>" >
	
    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" value="<?php echo $phone;?>" >

	<label for="age">Age</label>
    <input type="text" id="age" name="age" value="<?php echo $age;?>">
	
    <label for="gender">Gender</label>
    <select id="gender" name="gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <label for="aadhar">Aadhar No.</label>
    <input type="text" id="aadhar" name="aadhar" value="<?php echo $aadhar;?>">
  
    <input type="submit" value="Submit">
  </form>
</div>


 

 
</body>

</html>  