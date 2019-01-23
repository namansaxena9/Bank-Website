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
<link rel="stylesheet" type="text/css" href="files/css/secondPage.css" />  
<style>
#qwer td {
    padding-top: 20px;
    padding-bottom: 20px;
	padding-left:135px;
	padding-right:135px;
    text-align: center;
    background-color: #ffffb3;
    
}

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
	overflow-y:auto;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding-top:20px;
    padding-right:30px;
    padding-bottom:20px;
    padding-left:30px;
    text-align:center;
	
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color:#4BFB51;
    color: white;
}   


</style>    
</head>
<body>
<div id="lines-div">
<img id="lines" src="images/lines1.png">
</div>    
 <div class="nav-div" >
    <ul>
         <li id="bank-name"><img src="images/logo2.png"> </li>
         <li style="background:#66ccff;padding-bottom:15px;"><a href="2.php">Home</a></li>
         <li><a href="transfer.php">Transfer</a></li>
         <li><a href="cards.php">Cards</a></li>
         <li><a href="profile.php">Profile</a></li>
         <li><a href="logout.php">Log Out</a></li>     
         <li style="margin-top:-10px;"><a href=""><b> <?php echo "WELCOME<br>".$_SESSION['name'];?> </b> </a> </li>
	 </ul>    
</div>
<?php
 echo "<br>";
 $conn=mysqli_connect("localhost","root","");
 $sql=mysqli_select_db($conn,'bank');
 
 $accno=$_SESSION['accno'];
 
 $sql=mysqli_query($conn,"select balance from account where accountno='$accno'");
 $row=mysqli_fetch_assoc($sql);
 $balance=$row['balance'];
 
 ?>

<center>
 <br> <br>
 
<table id="qwer">
 <tr>
 <td> <b> CURRENT BALANCE </b> </td> 
 <td> <?php echo $balance; ?> </td> 
 </tr> 
 </table>
 
<br> <br>
 
 <div id="customers">
 <?php 
 $sql=mysqli_query($conn,"select * from transaction where toaccount='$accno' or fromaccount='$accno' ");
 
 echo "<table style='width:700px;'>";
 echo "<tr>";
 echo "<th> DATE </th>";
 echo "<th> TRANSACTION </th>";
 echo "<th> AMOUNT </th>";
 echo "</tr>";
 
 while($row=mysqli_fetch_assoc($sql))
 {
   echo "<tr>";
   echo "<td>".$row['date']."</td>";
   
   if($accno==$row['toaccount'])
   echo "<td> RECEIVED FROM A/C ".$row['fromaccount']."</td>";
   
   else
	echo "<td> SENT TO A/C ". $row['toaccount']."</td>";   
   
   echo "<td>".$row['amount']."</td>";
   echo "</tr>";	 
 }
 
   echo "</table>";
 ?>
 </div>
</center>

 </body>
</html>