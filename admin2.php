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
<link href='files/css/admin2.css' rel='stylesheet' type='text/css'>  

 
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
		 <li><a href=" "> <?php echo $_SESSION['name'];?> </a> </li>
     </ul>    
</div>

<br><br>

<center>

<?php

  $conn=mysqli_connect("localhost","root","");
  $sql=mysqli_select_db($conn,'bank');
  $name=$add=$phone=$age=$gender=$aadhar="";
  
  if($_SERVER['REQUEST_METHOD']=="POST" and empty($_POST['action']) )
   {
	   $temp=$_POST['show'];
       $sql=mysqli_query($conn,"select * from application where reference_id=$temp ");
       $row=mysqli_fetch_assoc($sql);
	   $name=$row['name'];
	   $add=$row['address'];
	   $phone=(float)$row['phone'];
       $age=(int)$row['age'];
       $gender=$row['gender'];
	   $aadhar=$row['aadhar'];   
   
    echo "<table id='customers'>";
    
   echo "<tr>
        <td><b> NAME </b></td>
		<td>".$name."</td>
    </tr>


    <tr>
        <td><b> ADDRESS </b></td> 
		<td>".$add."</td>
    </tr>
    <tr>
        <td> <b> PHONE </b> </td>
		<td>".$phone."</td>
    </tr>
    <tr>
        <td><b> AGE </b></td> 
		<td>".$age."</td>
    </tr>
    <tr>
        <td><b> GENDER </b></td>
		<td>".$gender."
		</td>
    </tr>

    <tr>
        <td> <b> ADHAAR NO. </b> </td>
		<td>".$aadhar."		</td>
    </tr>
</table> ";  
  
   echo "<br> <br>";
   echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
   echo "<input type='hidden' name='action' value='approve'> <input type='hidden' name='id' value='".$row['reference_id']."'> <button type='submit' class='btn btn-success' value='APPROVE'> APPROVE</button> </form>";
   echo "<br> <br>";
   echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
   echo "<input type='hidden' name='action' value='reject'> <input type='hidden'  name='id' value='".$row['reference_id']."'> <button type='submit' class='btn btn-danger' value='REJECT'> REJECTED</button> </form>";
   
  }
   
   if($_SERVER['REQUEST_METHOD']=="POST" and !empty($_POST['action']))
   {
	   
	   
	   $temp2=$_POST['id'];
	   
	   if($_POST['action']=="reject")
	   {
		  $sql=mysqli_query($conn,"update application set status='rejected' where reference_id=$temp2");
         
		 echo "<br><br><br><br><br><br><br><br>";
	     echo "<table id='qwer'>";
		 echo "<tr> <td> <b>";
		 echo " APPLICATION   REJECTED";
		 echo "</td> </tr> </b>";
		 echo "</table>";
	   }    		   
	   
       else if($_POST['action']=="approve")
	   {
         
		 function rstring()
         {
           $len=rand(8,17);
		   $characters = '@!#$%_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $randstring = '';
           for ($i = 0; $i < $len; $i++) {
           $randstring.= $characters[rand(0, strlen($characters)-1)];
          }
          return $randstring;
         }
		 
		 $sql=mysqli_query($conn,"select * from application where reference_id=$temp2 ");
         $row=mysqli_fetch_assoc($sql);
	     $name=$row['name'];
	     $add=$row['address'];
	     $phone=(float)$row['phone'];
         $age=(int)$row['age'];
         $gender=$row['gender'];
	     $aadhar=$row['aadhar'];
         
         $accno="UBI";
         $accno.=$row['reference_id'];

          $flag=1;
         while($flag==1)
          {
           $sql=mysqli_query($conn,"select * from account where accountno='$accno'");  	   
 
            if(mysqli_num_rows($sql)==0)
            {
	         $flag=0;
             break;
            } 	  
           $accno="UBI";
		   $ref=mt_rand(1000000000,mt_getrandmax());		 
           $accno.=$ref;
		  }              
		  
		  $sql=mysqli_query($conn,"insert into account values('$accno','$name','$add',$phone,$age,'$gender',$aadhar,0)");
		  $sql=mysqli_query($conn,"update application set status='accepted' where reference_id=$temp2");
	       
          $user=rstring();
          $pass=rstring();

          $sql=mysqli_query($conn,"insert into user values('$accno','$user','$pass')"); 		  
 		  
		 echo "<br><br><br><br><br><br><br><br>";
	     echo "<table id='qwer'>";
		 echo "<tr> <td> <b>";
		 echo "APPLICATION   APPROVED";
		 echo "</td> </tr> </b>";
		 echo "</table>";
	       
	   }
   }	   
 ?>
    
</center>

</body>
</html>