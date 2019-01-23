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
         <li><a href="cards.html">Cards</a></li>
         <li><a href="profile.php">Profile</a></li>
         <li><a href="logout.php">Log Out</a></li>
		 <li style="margin-top:-10px;"><a href=""><b> <?php echo "WELCOME<br>".$_SESSION['name'];?> </b> </a> </li>
     </ul>    
</div>
<div id="area"><br>
 <?php
 
  function rtxn()
  {
	  $sample="0123456789";
      $result="";
	 for( $i=1;$i<=16;$i++)
	{		
      $result.=$sample[rand(0,strlen($sample)-1)];     
    }
	return $result;
  } 
  
  $conn=mysqli_connect("localhost","root","");
  $sql=mysqli_select_db($conn,'bank');
  
  $accno=$_SESSION['accno'];
  $sql=mysqli_query($conn,"select balance from account where accountno='$accno'");
  $row=mysqli_fetch_assoc($sql);
  $bal=$row['balance'];
  $amt=$_POST['amount'];
  $accno2=$_POST['accno'];
  

  if($amt>$bal)
	{
       echo "insufficent amount in the bank balance";
    }
  else
   { 
      if($_POST['benef']=="inter")
      {
        $sql=mysqli_query($conn,"update account set balance=balance-$amt where accountno='$accno' ");
		
		$date=date("Y-m-d");
		$txn=rtxn();
		$sql=mysqli_query($conn,"insert into transaction values('$date',$amt,'$accno','$accno2','$txn')");
		echo "transaction sucessful";
	  }	
       
	  else if($_POST['benef']=="intra")
	  {
          $sql=mysqli_query($conn,"update account set balance=balance-$amt where accountno='$accno' ");
		  $sql=mysqli_query($conn,"update account set balance=balance+$amt where accountno='$accno2' ");
		  
          $date=date("Y-m-d");
		  $txn=rtxn();
		  $sql=mysqli_query($conn,"insert into transaction values('$date',$amt,'$accno','$accno2','$txn')");
		  echo "transaction sucessful";		  
       } 	
   
   
   } 		
?>

 </div>    
</body>

</html>
 