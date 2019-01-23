<?php
session_start();
?>

<html>
<head>
<title> </title>    
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="files/css/reset.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="files/animate/animate.css" />
<link rel="stylesheet" href="files/animate/set.css" />
<link href='files/fonts/sans.css' rel='stylesheet' type='text/css'>
<link href='files/css/profile.css' rel='stylesheet' type='text/css'>  
 
<style>
#backs{
background-image:url();
background-size: cover;
}
    
#lines{
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
    
 input[type=text] {
    width: 30%;
    height:10%
    padding: 10px 18px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    transition: 0.5s;
    outline: none;
}
input[type=text]:focus {
    border: 3px solid #555;
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

table {
    border-collapse: separate;


}
</style>    
</head>
<?php
 
  $conn=mysqli_connect("localhost","root","");
  $sql=mysqli_select_db($conn,'bank');
  $accno=$_SESSION['accno'];
  $sql=mysqli_query($conn,"select * from account where accountno='$accno'");
  $row=mysqli_fetch_assoc($sql);
  
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
	header("Location:profile2.php");  
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
         <li style="background:#66ccff;padding-bottom:15px;" ><a href="#customer">Profile</a></li>
         <li><a href="logout.php">Log Out</a></li>
		 <li style="margin-top:-10px;"><a href=""><b> <?php echo "WELCOME<br>".$_SESSION['name'];?> </b> </a> </li>
     </ul>    
</div>
<br>
<br>
<br>
<br>
<br>
 <div id="cont">
 <table id="customers">
    <tr>
    <td> <b>ACCOUNT NO </b></td>  
	<td> <?php echo $row['accountno'];?> </td>
    </tr>

    <tr>
        <td><b> NAME </b></td>
		<td> <?php echo $row['name'];?> </td>
    </tr>


    <tr>
        <td><b> ADDRESS </b></td> 
		<td> <?php echo $row['address'];?> </td>
    </tr>
    <tr>
        <td> <b> PHONE </b> </td>
		<td> <?php echo $row['phone'];?> </td>
    </tr>
    <tr>
        <td><b> AGE </b></td> 
		<td> <?php echo $row['age'];?></td>
    </tr>
    <tr>
        <td><b> GENDER </b></td>
		<td> <?php echo $row['gender'];?>
		</td>
    </tr>

    <tr>
        <td> <b> ADHAAR NO. </b> </td>
		<td> <?php echo $row['aadhar']; ?>
		</td>
    </tr>
</table>
 </div>

<div>
<form action="profile2.php" method="get">
<button class="btn btn-success" style="margin-left:400px;margin-top:30px" type="submit" >EDIT PROFILE</button>
<button class="btn btn-primary" style="margin-left:250px;margin-top:30px" type="submit" formaction="profile3.php">CHANGE USERNAME/PASSWORD</button>
</form>
</div>
</body>
</html>