<html>
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
 
  <br><br> <button type="button" onclick="location.href='verify.html'"> GO BACK </button>
  
 </html>
