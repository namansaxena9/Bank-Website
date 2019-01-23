<?php 
session_start();
?>

<html>
<head>
<title> </title>    
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="files/css/reset.css">
<link href="files/css/font-awesome.min.css" rel="stylesheet">
<link href="files/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="files/animate/animate.css" />
<link rel="stylesheet" href="files/animate/set.css" />
<link href='files/fonts/sans.css' rel='stylesheet' type='text/css'>  
<link href="files/css/qwer.css" rel="stylesheet" /> 
<style>

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
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

#qwe td {
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
<div id="customers">
 <?php
  echo "<br>";
  $conn=mysqli_connect("localhost","root","");
  $sql=mysqli_select_db($conn,'bank');
 
     $accno=$_SESSION['accno'];    
	$sql=mysqli_query($conn,"select * from card where accountno='$accno'");
    
	if(mysqli_num_rows($sql)==0)
	{
	  echo "<table id='qwe'>";
      echo "<tr> <td> <b>";	  
	  echo "NO CARD IS AVAILABLE";
	  echo "</b> </td> </tr>";
	  echo "</table>";
   	}
	else
    {
       echo "<table style='width:700px;'>";
       echo "<tr>";
       echo "<th> CARD NUMBER </th>";
       echo "<th> TYPE  </th>";
       echo "<th> CVV </th>";
       echo "</tr>";
	  while($row=mysqli_fetch_assoc($sql))
	  {
	      echo "<tr>";
          echo "<td>".$row['cardno']."</td>";
          echo "<td>".$row['cardtype']."</td>";
          echo "<td>".$row['cvv']."</th>";
          echo "</tr>";
	  }
       echo "</table>";
        
   }
 ?>
 </div>
 
  <br><br>

   <form action="cards2.php" method="post">
   <button type="submit" class="btn btn-info">APPLY FOR CARD </button>
   </form>    
  </center>
    
</body>
</html>
