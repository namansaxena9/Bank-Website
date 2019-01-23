<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="files/css/reset.css">
<link href="files/css/font-awesome.min.css" rel="stylesheet">
<link href="files/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="files/animate/animate.css" />
<link rel="stylesheet" href="files/animate/set.css" />
<title>Withdraw</title>    
</head>
<style>
#backs{
background-image:url("images/withdrawl.jpg");
background-size: cover;
}
#mar{
color:yellow;
}
input[type=text] {
    width: 40%;
    height:10%
    padding: 10px 18px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    transition: 0.5s;
    outline: none;
}

input[type=password] {
    width: 40%;
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
#with_form{
    
font-size: 20px;
margin-top:440px;
margin-left:400px; 
}
#with_form b{
        color: yellow;
    }

#enter{
font-size: 18px;
color:yellow;
margin-left: 1160px;
text-decoration: none;
border: none;
background-color: transparent;
}

#new {
	color:yellow;
	background-color:transparent;
	border:none;
	margin-left:50px;
	}
</style>
<?php $num="";$pass="";$amount=""; 
  $status=array("AUTHENTICATION FAILED","TRANSACTION SUCESSFUL","INSUFFICIENT BALANCE");
  $stdnum=0;

 if($_SERVER['REQUEST_METHOD']=="POST")
 {
	if(empty($_POST['num']))
	{
      $num="card number required";
	}
   if(empty($_POST['pin']))
	{
      $pass="password required";
    }   
   if(empty($_POST['amount']))
	{
	  $amount="amount required";
    }	  
 }	

?>

<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{	
 $conn=mysqli_connect('localhost','root','');
 $sql=mysqli_select_db($conn,'bank');
 $var=(int)$_POST["num"];
 $var2=(int)$_POST["pin"];
 $var3=(int)$_POST["amount"];
 $sql=mysqli_query($conn,"select * from card where cardno=$var and pin=$var2");
 
 
 if(mysqli_num_rows($sql)==0)
 {
    $stdnum=0;
	$num="";
    $pass="";
    $amount=""; 	
 }
 else
 {
	$sql=mysqli_query($conn,"select balance,accountno from account where accountno=(select a.accountno from account a,card b where a.accountno=b.accountno and b.cardno=$var
       and b.pin=$var2)");

     $row=mysqli_fetch_assoc($sql);

    if($row['balance']>=$var3)
    {
      $temp=$row['accountno'];		
	  $sql=mysqli_query($conn,"update account set balance=balance-$var3 where accountno=$temp ");
      $stdnum=1;
	}
	else
	{
	  $num="";
      $pass="";
      $amount="";	
	  $stdnum=2;	
	} 	
 }
}
 ?> 

    
<body id="backs">
<div id="mar"><marquee>Be careful while typing your details to avoid any incovinience.</marquee></div>
<div id="with_form">   
<form  method="post" name="form1" action="<?php echo $_SERVER['PHP_SELF'];?>" >
<b>CARD NO:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="num" placeholder="CARD NUMBER" value="<?php echo $num; ?>" > <button name="back" id="new" type="button" onclick="location.href='bank.html'">BACK</button><br>
<b>AMOUNT:</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="amount" placeholder="AMOUNT" value="<?php echo $amount; ?>" ><br>
<b>ATM PIN:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pin" placeholder="PIN" value="<?php echo $pass; ?>"><br>
</div>
<div id=" "> 
<button id="enter" name="enter" type="submit" value="Enter">ENTER</button>
</div>

<?php if($_SERVER['REQUEST_METHOD']=="POST") {echo '<center> <b> <font face="verdana" color="yellow" size="5" >'.$status[$stdnum].'</font></b> </center>';} ?>



</form>  
</body>    
</html>