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
background-image:url("");
background-size: cover;
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
         <li><a href="2.php">Home</a></li>
         <li><a href="transfer.php">Transfer</a></li>
         <li><a href="cards.php">Cards</a></li>
         <li><a href="profile.php">Profile</a></li>
         <li><a href="logout.php">Log Out</a></li>
		 <li> <?php echo $_SESSION['name'];?> </li>
     </ul>    
</div>
<div id="area">    
<b>APPLY FOR CARD</b>
<div class="col-sm-12" style="font-size: 27px;">
UNITY Bank’s cards are an ideal choice for safe, affordable and smart form of transactions. These cards are a hassle-free way of paying bills quickly, shopping safely and making money-savvy decisions. Do you want to earn miles and get discounts or cash back? Apply for UNITY’s credit cards online. Do you want smart money on international travel? Use our pre-paid Forex cards.  
</div>

<div class="col-sm-12" style="height:25px"></div>    

<div class="col-sm-6" style="font-size:20px;  text-align:justify;">
<center><b>CREDIT CARD</b></center>    
<ul style="margin-left: 100px;">
<li>Customised credit cards to match your needs</li>
<li>State-of-the-art security for online transactions</li>

</ul>
<form action="cards3.php" method="post">
<center> <input type="radio" name="card" class="button button5" value="credit" checked >&nbsp;Apply for Credit Card<br><br>
</center>    
</div>
        
<div class="col-sm-6" style="font-size:20px;  text-align:justify;">
<center><b>DEBIT CARD</b></center>    
<ul style="margin-left: 100px;">
<li>Multi-layered online and offline protection </li>
<li>Card security for misplaced or stolen cards</li>
</ul>
<center> <input type="radio" name="card" class="button button5" value="debit">&nbsp;Apply for Debit Card<br><br>

</center>    
</div>
<br>
<center style="font-size:20px;">        
    ENTER FOUR DIGIT PIN&nbsp;&nbsp;&nbsp;<input type="password" name="pin" maxlength="4" style="width:60px"; oninput="this.value=this.value.replace(/[^0-9]/g,'');" required></center>   
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" class="button button5" value="APPLY">
</form>
</div>    
</body>
</html>