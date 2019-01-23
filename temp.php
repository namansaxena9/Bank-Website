<?php 
session_start();
?>

<html>
<head>
<title> </title>    
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="files/css/reset.css">
<link href="files/css/font-awesome.min.css" rel="stylesheet">
<link href="files/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="files/animate/animate.css" />
<link rel="stylesheet" href="files/animate/set.css" />
<link href="files/fonts/sans.css" rel="stylesheet" type='text/css'>  
<link href="files/css/login.css" rel="stylesheet">
<link rel="stylesheet" href="files/css/style1.css" media="screen" type="text/css" />

<style>
#backs{
background-color: #D3D3D3;
background-size: cover;
}
#lines{
    margin-top: 0px;
    width:100%;
}


#bank-name{
  width: 450px;
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
 #with_form{
font-size: 28px;
margin-top:150px;
margin-left:400px; 
}
#with_form b{  
color: black;
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
    margin-left: 50px;
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
input[type=text] {
    width: 40%;
    height:5%
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
</style>
  

</head>
<body id="backs">
<?php
  $msg="";
  $conn=mysqli_connect("localhost","root","");
  $sql=mysqli_select_db($conn,'bank');
  
  if($_SERVER['REQUEST_METHOD']=="POST" && empty($_POST['admin']) )
  {
		 	 
	   $xuser=$_POST['user'];
	   $xpass=$_POST['pass'];
	  
	  $sql=mysqli_query($conn,"select * from user where username='$xuser' and password='$xpass'");
	  
	  $row=mysqli_fetch_assoc($sql);
	  
        if(mysqli_num_rows($sql)==0)
		{
		  $msg="* Username or Password is incorrect";
		}
        
        else
		{
          $_SESSION['accno']=$row['accountno'];
          
		  $temp=$row['accountno'];
		  $sql=mysqli_query($conn,"select name from account where accountno='$temp'");
		  $row=mysqli_fetch_assoc($sql);
		  $_SESSION['name']=$row['name']; 
             
	    mysqli_close($conn);
	  
          header('Location: 2.php');       
	   }
   } 
   else if ( $_SERVER['REQUEST_METHOD']=="POST" && !empty($_POST['admin']))
   {
     $xuser=$_POST['user'];
	   $xpass=$_POST['pass'];
	  
	  $sql=mysqli_query($conn,"select * from admin where username='$xuser' and password='$xpass'");
	  
	  $row=mysqli_fetch_assoc($sql);
	  
        if(mysqli_num_rows($sql)==0)
		{
		  $msg="* Username or Password is incorrect";
		}
        
        else
		{
		  $_SESSION['name']=$row['name']; 
          mysqli_close($conn);
	      header('Location: admin.php');       
	   }	   
   } 
?>

<div id="lines-div">
<img id="lines" src="images/lines1.png">
</div>    
<div class="nav-div">
    <ul>
         <li id="bank-name"><img src="images/logo2.png"> </li>
         <li><a href="1.php">Home</a></li>
         <li><a href="bank1.html">Bank</a></li>
         <li><a href="1.php#about">Services</a></li>
         <li><a href="1.php#customer">Customer Care</a></li>
         <li><a href="1.php#map">Locate Us</a></li>
		 <li style="background:#66ccff;padding-bottom:15px;"><a href="temp.php">Log In</a></li>
     </ul>    
</div>

<div class="login-card">
    <h1>Log-in</h1><br>
	
	
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <input type="text" name="user" placeholder="Username" required>
    <input type="password" name="pass" placeholder="Password" required>
	<input type="submit" name="login" class="login login-submit" value="login"> <br>
    <input type="checkbox" name="admin"> Adminstrator Login
	
  </form>

  <div class="login-help">
    <?php echo $msg;?>
  </div>
</div>

   
</body>
</html>