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
<link href='files/fonts/sans.css' rel='stylesheet' type='text/css'>  
<link href='files/css/cards3.css' rel='stylesheet' type='text/css'>  
 
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



#qwer td {
    padding-top: 20px;
    padding-bottom: 20px;
	padding-left:135px;
	padding-right:135px;
    text-align: center;
    background-color: #ffffb3;
    
}


</style>    
</head>
<body id="backs">
<div id="lines-div">
<img id="lines" src="images/lines1.png">
</div>    
 <div class="nav-div">
    <ul>
         <li id="bank-name"><img src="images/logo2.png"> </li>
         <li><a href="2.php">Home</a></li>
         <li><a href="transfer.php">Transfer</a></li>
         <li style="background:#66ccff;padding-bottom:15px;"><a href="cards.php">Cards</a></li>
         <li><a href="profile.php">Profile</a></li>
         <li><a href="logout.php">Log Out</a></li>
         <li style="margin-top:-10px;"><a href=""><b> <?php echo "WELCOME<br>".$_SESSION['name'];?> </b> </a> </li>
	 </ul>    
</div>
<br>   
<center> 
 <?php 
  
   function rcard()
  {
	  $sample="0123456789";
      $result="";
	 for( $i=1;$i<=16;$i++)
	{		
      $result.=$sample[rand(0,strlen($sample)-1)];     
    }
	return $result;
  } 
  
  function rcvv()
  {
	  $sample="0123456789";
      $result="";
	 for( $i=1;$i<=3;$i++)
	{		
      $result.=$sample[rand(0,strlen($sample)-1)];     
    }
	return $result;
  }
  
  $conn=mysqli_connect("localhost","root","");
  $sql=mysqli_select_db($conn,'bank');
   
  $accno=$_SESSION['accno'];
  $cname=$_SESSION['name'];
  $type=$_POST['card'];
  $pin=(int)$_POST['pin'];
  $cardno=rcard();
  $cvv=rcvv();
 if($_SERVER['REQUEST_METHOD']=="POST")
 {	 
  $sql=mysqli_query($conn,"insert into card values('$cardno','$accno','2024-12-01',$cvv,'$cname','$type',$pin)");
  
  if($sql)
  {

	 echo "<br><br><br><br><br><br><br><br><br>";
	 echo "<table id='qwer'> <tr> <td> <b>";
	 echo "APPLICATION PROCESSED SUCESSFULLY " ;
	 echo "</b> </td> </tr> </table>";
	 
	 echo "<br><br>";
	 echo "<table id='customers'> <tr> <td> <b>";
	 echo "ATM CARD NUMBER ";
	 echo "</b> </td> ";
	 echo "<td>".$cardno."</td> </tr> </table>";
	 
  }	 
  else
  {
     echo "<br><br><br><br><br><br><br><br><br>";
	 echo "<table id='qwer'> <tr> <td> <b>";	
	 echo " process failed"; 
	 echo "</b> </td> </tr> </table>";
  }
 }
 ?>
 </center>   
</body>
</html>
