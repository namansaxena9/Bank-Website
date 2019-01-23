<html>
<head>
<title>UNITY BANK</title>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="files/css/reset.css" />
<link href="files/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="files/css/first.css" />
<link href="files/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="files/animate/animate.css" />
<link rel="stylesheet" href="files/animate/set.css" />
<link href='files/fonts/sans.css' rel='stylesheet' type='text/css' />  
<link href="files/js/login.js" />
<link href="files/css/login3.css" rel="stylesheet" />
</head>
<body onload="myFunction()" >
    
  
    
<div id="video"  class="animate-bottom">
  <video preload="auto" autoplay="true" loop="loop" muted="muted">
     	<source src="images/banner.mp4" type="video/mp4">
  </video>
     <div class="overlay">
        <center>
         <h1 style="font-size:100px;">
              UNITY BANK
            </h1>
         <br>
         <a href="#lines-div" id="arrow"><img src="images/arrow.svg"></a>
         </center>
     </div>  
</div>
    

    
    
<div id="lines-div">
<img id="lines" src="images/lines1.png">
</div>
<div class="nav-div">
    <ul>
         <li id="bank-name" ><img src="images/logo2.png"> </li>
         <li><a href="#">Home</a></li>
         <li><a href="bank1.html">Bank</a></li>
         <li><a href="#about">Services</a></li>
         <li><a href="#customer">Customer Care</a></li>
         <li><a href="#map">Locate Us</a></li>
        <li><a onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="login">Log In</a></li>
     </ul>    
</div>

<div class="slideshow-container">

<div class="mySlides fade">
 
  <img src="images/1.png" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">

  <img src="images/2.png" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">

  <img src="images/3.png" style="width:100%">
  <div class="text"></div>
</div>
    
<div class="mySlides fade">
 
  <img src="images/4.png" style="width:100%">
  <div class="text"></div>
</div>    

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
     <span class="dot"></span>
</div>
    
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>
    
    
    
    
<section class="color-white " id="about"  >
        <br><br>
<h1><center>SERVICES</center></h1><br><br>
   <div class="container" >      
            <div class="row text-center" >
                <div class="col-md-3">
                     <a href="bank.html" style="text-decoration: none; color: black;">
					<button class="btn buttons" id="buthis" onclick="tap('his')" ><img src="images/bank.gif" id="icoimg"></button><br><br><br>In Person Banking</a>
                </div>
				<div class="col-md-3">
                    <a href="cheakStatus.html" style="text-decoration: none; color: black;">
                    <button class="btn buttons" id="butcul" onclick="tap('cul')"><img src="images/sample.jpg" id="icoimg" ></button><br><br><br>Check Status</a>
                </div>
				<div class="col-md-3">
                     <a href="" style="text-decoration: none; color: black;">
					<button class="btn buttons" id="buteco"onclick="tap('eco')"><img src="images/fundtranfer.png" id="icoimg"></button><br><br><br>Fund Transfer</a>
                </div>
				<div class="col-md-3">
                     <a href="" style="text-decoration: none; color: black;">
					<button class="btn buttons" id="butdemo" onclick="tap('demo')"><img src="images/icon-credit-cards.png" id="icoimg"></button><br><br><br>Cards</a>
                </div>
       </div>
   </div>
</section> <br><br>   
<section class="color-white " id="about"  >
   <div class="container" >      
            <div class="row text-center" >
                <div class="col-md-3">
					<button class="btn buttons" id="buthis" onclick="tap('his')" ><img src="images\icon-life.png" id="icoimg"></button><br><br><br>Insurance
                </div>
				<div class="col-md-3">
					<button class="btn buttons" id="butcul" onclick="tap('cul')"><img src="images/icon-pl.png" id="icoimg"></button><br><br><br>Loan
                </div>
				<div class="col-md-3">
					<button class="btn buttons" id="buteco"onclick="tap('eco')"><img src="images/icon-car-loan.png" id="icoimg"></button><br><br><br>Car Loan
                </div>
				<div class="col-md-3">
					<button class="btn buttons" id="butdemo" onclick="tap('demo')"><img src="images/product-services.png" id="icoimg"></button><br><br><br>Product/services
                </div>
				
             
            </div>
      </div>
</section> <br><br>
<div class="color-light" id="customer">  <br>  
<h1><center>CUSTOMER CARE</center></h1><br><br>
  <center>
    <div class="row">
    <div class="col-sm-4" ><img src="images/faq.jpg"><br><br>FAQ</div>
    <div class="col-sm-4" ><img src="images/complaint.jpg"><br><br>COMPLAINTS</div>
    <div class="col-sm-4" ><img src="images/call.jpg"><br><br>CONTACT US</div>
    </div>
  </center>
  <br><br><br>
</div> 
    
    
    
    



<div id="id01" class="modal">
  
  <form class="modal-content animate" action="temp.php" method="post">
     <div class="container">
      <label><b>Username</b></label><br>
      <input type="text" placeholder="Enter Username" name="user" required><br>

      <label><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="pass" required><br><br>
       <input type="checkbox" name="admin" value="admin"> Administrator Login<br><br>    
      <button type="submit"  id="login">Login</button><br>
    
    </div>

    <div class="container" style="background-color:#f1f1f1" id="cancel">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

    
    
    
    
    
<div class="container-float" id="map" style="width:100%;height:510px"></div>

<footer id="footer" style="background-color: black"><br>
          <center>
			    <ul>
					<a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-google"></a>
                    <a href="#" class="fa fa-linkedin"></a>
				</ul>
               <span class="copyright" style="color: white">&copy;<a href="http://facebook.com/" target="_blank">NOT WORRIED ABOUT CGPA</a> All rights reserved.</span>
          </center>
</footer>    
    
    
    <script>
	function myMap() {	
		var myCenter = new google.maps.LatLng(28.6304529,77.3699043);
		var mapCanvas = document.getElementById("map");
		var mapOptions = { center: myCenter , zoom: 12 };
		var map = new google.maps.Map(mapCanvas, mapOptions);
		var marker = new google.maps.Marker({position:myCenter,animation:google.maps.Animation.BOUNCE});
		marker.setMap(map);
		var marker1 = new google.maps.Marker({position:myhome,animation:google.maps.Animation.BOUNCE});
		marker1.setMap(map);
		google.maps.event.addListener(marker,'click',function() {map.setZoom(20); map.setCenter(marker.getPosition());} );
		google.maps.event.addListener(marker1,'click',function() {map.setZoom(20); map.setCenter(marker1.getPosition());} );
		}
	function tap(p) {
	var ele = document.getElementById(p);
	if (ele.style.display == "none")
		{
		ele.style.display = "block";
		}
	else if ( ele.style.display != "none")
		{
		ele.style.display = "none";
		}
	}
     
	 
   
  </script>
     
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMexuv0Gtzc9-tRsULK2MKvi0fTHUeltE&callback=myMap"></script>
     <script src="assets/plugins/jquery-1.10.2.js"></script>
     <script src="assets/plugins/bootstrap.js"></script>
     <script src="assets/js/custom.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>;
  
    
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>    
    
</body>
</html>