<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="files/css/reset.css">
<link href="files/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="./deposit_files/animate.css">
<link rel="stylesheet" href="./deposit_files/set.css">
<title>Deposit</title>    
<style>
#backs{
background-image:url("images/dep.jpg");
background-size: cover;
}
#mar{
color:black;
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
margin-top:50px;
margin-left:400px; 
}
#with_form b{
        color: black;
    }

#enter{
font-size: 18px;
color:black;
margin-left: 1163px;
text-decoration: none;
border: none;
background-color: transparent;
}
    #heading{
        font-size:75px;
    }    
    
</style></head>
<?php $name="";$accno="";$amount=""; 
  $print="";
 if($_SERVER['REQUEST_METHOD']=="POST")
 {
	if(empty($_POST['name']))
	{
      $name="name required";
	}
   if(empty($_POST['accno']))
	{
      $accno="account number required";
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
 
 $conn=mysqli_connect('localhost','root','');
 $sql=mysqli_select_db($conn,'bank');
 $var=$_POST["name"];
 $var2=$_POST["accno"];
 $var3=(int)$_POST["amount"];
 
 $sql=mysqli_query($conn,"select * from account where name='$var' and accountno='$var2'");
 
 if(mysqli_num_rows($sql)==0)
 {
    $print="NO SUCH ACCOUNT EXISTS";
	$name="";
    $accno="";
    $amount=""; 	
 }
 else
 {
	$date=date('Y-m-d');
	$txn=rtxn();
	$sql=mysqli_query($conn,"update account set balance=balance+$var3 where accountno='$var2'");
	$print="FORM SUBMITTED SUCESSFULLY";
    
	$sql=mysqli_query($conn,"insert into transaction values('$date',$var3,'CASH DEPOSIT','$var2','$txn')");
   
 }
}
?> 

    
<body id="backs">
<div id="mar"><marquee>Be careful while typing your details to avoid any incovinience.</marquee></div>
    <center>
        <img src="images/logo4.png" width="400"></center><br><br>
    <div id="heading"><center><b>CASH DEPOSIT</b></center></div>
<form name="form1" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div id="with_form">   
<b>NAME:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="name" placeholder="Name" value="<?php echo $name;?>" ><br>
<b>AMOUNT:</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="amount" placeholder="Amount" value="<?php echo $amount; ?>" ><br>
<b>ACCOUNT NO:</b>&nbsp;&nbsp;   <input type="text" name="accno" placeholder="Account number" value="<?php echo $accno;?>" ><br><br>
</div>

<div style="margin-left:600px">
<input type="submit" value="SUBMIT">     <button type="button" onclick="location.href='bank.html'"> Back To Bank </button>
</div >
</form>
     
 <br><br><br><br>
 <?php echo '<center> <font face="verdana" size="10" color="red" >'.$print.'</font></center>'; ?>
</body>
</html>