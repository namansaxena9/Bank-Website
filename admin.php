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
  width: 500px;
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
 style="background:#66ccff;padding-bottom:15px;"
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

#qwer td {
    padding-top: 20px;
    padding-bottom: 20px;
	padding-left:135px;
	padding-right:135px;
    text-align: center;
    background-color:#ffffb3;
    
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
         <li style="background:#66ccff;padding-bottom:15px;"><a href="admin.php">Application</a></li>
         <li> <a href=" ">   </a>             </li>
         <li> <a href=" ">   </a> 	          </li>	 
		 <li><a href="logout.php">Log Out</a></li>
		 <li style="margin-top:-10px;"><a href=""><b> <?php echo "WELCOME<br>".$_SESSION['name'];?> </b> </a> </li>
     </ul>    
</div>

<br><br>

<center>

<div id="customers">
<?php

  $conn=mysqli_connect("localhost","root","");
  $sql=mysqli_select_db($conn,'bank');
  $name=$add=$phone=$age=$gender=$aadhar="";
  
  if($_SERVER['REQUEST_METHOD']=="GET")
  {
	 $sql=mysqli_query($conn,"select * from application where status='pending' ");
     
	 if(mysqli_num_rows($sql)==0)
	 {	        
	    echo "<br><br><br><br><br><br><br><br>";
		echo "<table id='qwer'>";		
		echo "<tr><td> <b>";
		echo "No record found";
        echo "</td> </tr> </b>";
        echo "</table>";		
 	 }
	 else
	 {	 
	 echo "<table style='width:700px;'>";
     echo "<tr>";
     echo "<th> Application Number </th>";
     echo "<th> Name of Applicant </th>";
     echo "<th> Select  </th>";
     echo "</tr>";
     
	 echo "<form action='admin2.php' method='post' >";
	   
     while($row=mysqli_fetch_assoc($sql))
	 {
     echo "<tr>";
     echo "<td>".$row['reference_id']."</td>";
     echo "<td>".$row['name']."</td>";
     echo "<td> <input type='radio' name='show' value='".$row['reference_id']."'> </td>";
     echo "</tr>";
	 }
	 echo "</table>";
	 
	 echo "<br> <button type='submit' value='submit' class='btn btn-primary'> VIEW </button> ";
	 
	 echo "</form>";
     }
  }	 
?>
</div>    
</center>

</body>
</html>