<html>
<head>
<style>
#backs{
background-image:url("images/cr1.jpg");
background-size: cover;
}
input[type=text] 
{
    width: 30%;
    height:10%
    padding: 10px 18px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    transition: 0.5s;
    outline: none;
}
#ca{
margin-top: 50px;
    margin-left: 40px;
}
  #logo{
        width:350px;
        margin-top: 50px;
        margin-left: 150px
       }
.error {color: #8A2BE2;}	

#same { background-color:#FFD700; } 
</style>    
</head>
<?php
  $name=$phone=$add=$age=$aadhar=$gender=$print="";
 
  
 if($_SERVER['REQUEST_METHOD']=="POST")
{ 
 $conn=mysqli_connect('localhost','root','');
 $sql=mysqli_select_db($conn,'bank');
 $arr=array(trim($_POST["name"]),trim($_POST["address"]),$_POST["gender"]);
 $print=""; 
 
 $var=(float)$_POST["phone"];
 $var2=(int)$_POST["age"];
 $var3=$_POST["aadhar"];

 if(!empty($arr[0]) && !empty($arr[1]) && !empty($var) && !empty($var2) && !empty($var3))
 {
 $flag=1;
 $ref=mt_rand(1000000000,mt_getrandmax());
 while($flag==1)
 {
   $sql=mysqli_query($conn,"select * from application where reference_id=$ref");  	   
 
  if(mysqli_num_rows($sql)==0)
   {
	  $flag=0;
      break;
   } 	  
  $ref=mt_rand(1000000000,mt_getrandmax());
 } 
 
 $sql=mysqli_query($conn,"insert into application values('$arr[0]','$arr[1]',$var,$var2,'$arr[2]','$var3',$ref,'pending')");
 mysqli_close($conn);
 $print="Your request for a new account is submitted sucessfully.<br>Your reference id is :";
 $print.=$ref;
 $print.="<br>Please go to services section to check status.click here to get redirected to the home page.";
 }
 else
{
   if(empty($arr[0]))
   {   
      $name="name is required";
   }
   
   if(empty($arr[1]))
   {
      $add="address is required";
   }	 
	
    if(empty($var))
     {
	  $phone="phone no is required";
     }
   
     if(empty($var2))
     {
	 $age="age is required";
     }
	
     if(empty($var3))
     { 
 	   $aadhar="aadhar is required";
     }	
   
   $print="Enter the missing information";
  
  } 
}

?>
<body id="backs">
<img src="images/logo4.png" id="logo">
<div id="ca"><b>  
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">  

<pre>
<font size="4">NAME:  </font>          <input type="text" name="name" id="same" > <span class="error" ><?php echo "*".$name;?></span><br><br>
<font size="4">ADDRESS:</font>         <textarea cols=52 rows=5 name="address" id="same"> </textarea> <span class="error"><?php echo "*".$add;?></span> <br><br>
<font size="4">PHONE:</font>           <input type="text" name="phone" id="same"><span class="error"> <?php echo "*".$phone;?> </span><br><br>
<font size="4">AGE:</font>             <input type="text" name="age" id="same" > <span class="error"> <?php echo "*".$age;?> </span><br><br>
<font size="4">GENDER:</font>          <select name="gender" style="background-color:#FFD700;" > 
                <option value="male">Male</option>
                <option value="female">Female</option>
                </select> <?php echo $gender; ?> <br><br><br>
<font size="4">AADHAR CARD NO:</font> <input type="text" name="aadhar" style="background-color:#FFD700;"><span class="error"> <?php echo "*".$aadhar;?> </span> <br><br>

                   <input type="submit" value="submit" id="same">                   <button type="button" onclick="location.href='bank.html'" id="same"> Back to Bank </button>
</pre>
</b>
 <?php echo "<center><b><font face='verdana' size='10'>".$print."</font></b> </center>";?>
</form>
</div>    
</body>
</html>