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
background-image:url("images/cheakStatus.jpg");
background-size: cover;
}
#lines{
    margin-top: 0px;
    width:100%;
}


#bank-name{
  width: 550px;
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

</style>    
</head>
<body id="backs">
<div id="lines-div">
<img id="lines" src="images/lines1.png">
</div>    
<div class="nav-div">
    <ul>
         <li id="bank-name"><img src="images/logo2.png"> </li>
         <li><a href="1.php">Home</a></li>
         <li><a href="bank.html">Bank</a></li>
         <li><a href="1.php#about">Services</a></li>
         <li><a href="1.php#customer">Customer Care</a></li>
         <li><a href="1.php#map">Locate Us</a></li>
     </ul>    
</div>
<div id="area">
<?php 
 
  $conn=mysqli_connect("localhost","root","");
  $sql=mysqli_select_db($conn,'bank');
  
  $ref=$_POST["reg"];
  
   $sql=mysqli_query($conn,"select * from application where reference_id=$ref");
  
    if(mysqli_num_rows($sql)==0)
	{
	   echo "no record found try again";
    }
    
	else
    {
       $row=mysqli_fetch_assoc($sql);
	   
	   if($row['status']=="pending")
	   {
		   echo "your application is still in process";
       }		   
       
	   else if($row['status']=='rejected')
	   {
		   echo "oops your application is rejected";
	   }
        
       else
	   {
          echo  "your application is accepted "."<br>";
       
	      $accno="UBI";
		  $accno.=$ref;
	   
	      echo "your account number is ".$accno."<br> <br>";
	   
          $sql=mysqli_query($conn,"select b.username,b.password from account a,user b where a.accountno=b.accountno and b.accountno='$accno' ");
		  
          $row=mysqli_fetch_assoc($sql);

          echo "your user name is :: ".$row['username']."<br><br>";
		  
		  echo "your password is  :: ".$row['password']."<br> <br>";
             	      
		}
	}	   
		   
 ?>
</div> 
<form action="cheakStatus.html">
<input type="submit" value="BACK">
</form>   
</body>
</html>