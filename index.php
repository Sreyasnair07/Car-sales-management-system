<?php
 // define database related variables
   $db_name = 'car_sales';
   $host = 'localhost';
   $user = 'root';
   $password = '';


    $db = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

session_start();
$error="";
if(isset($_POST['Search']))
    {
        if(!empty($_POST['company'])  )
        {   
            $fid = $_POST['company'];
           $sql="SELECT * FROM models WHERE compony_id = (select compony_id from compony where compony_name='$fid')";
           $result=mysqli_query($db,$sql);
           if($result->num_rows > 0)
           {  
             echo "<table border='1'>
              <tr>
        <th>MODEL NO</th>
        <th>MODEL NAME</th>
        <th>COMPANY ID</th>
        <th>Fule Type</th>
        <th>status</th>

        </tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr><td>" . $row['model_no'] . "</td>";
        echo "<td>" . $row['model_name'] . "</td>";
        echo "<td>" . $row['compony_id'] . "</td>";
        echo "<td>" . $row['diesel/petrol'] . "</td>";
        echo "<td>" . $row['status'] . "</td>
        </tr>";
        }

        echo "</table>";
   }
     else{ echo 'Invalid Company name <br> or Company not available.';}
 }
}
elseif(isset($_POST['sss']))
    {
        if(!empty($_POST['model'])  )
        {   
            $fid = $_POST['model'];
           $sql="SELECT * FROM models WHERE model_name='$fid'";
           $result=mysqli_query($db,$sql);
           if($result->num_rows > 0)
           {  
             echo "<table border='1'>
              <tr>
        <th>MODEL NO</th>
        <th>MODEL NAME</th>
        <th>COMPANY ID</th>
        <th>Fule Type</th>
        <th>status</th>

        </tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr><td>" . $row['model_no'] . "</td>";
        echo "<td>" . $row['model_name'] . "</td>";
        echo "<td>" . $row['compony_id'] . "</td>";
        echo "<td>" . $row['diesel/petrol'] . "</td>";
        echo "<td>" . $row['status'] . "</td>
        </tr>";
        }

        echo "</table>";
   }
     else{ echo 'Invalid Model name <br> or Model not available.';}
 }
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
   


   if(isset($_POST['action']) && $_POST['action'] == "admin"){
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['psw']); 
        if($myusername=='admin' && $mypassword=='password'){
        
           header("location: admin.php");
        }else {
           $error = "Invalid Username or Password";
        }
      }
}

?>
<!DOCTYPE html>
<html>
    <body bgcolor="white">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>

          body {
  background-image: url('images/loginbackground.png');
  background-attachment: fixed;
  background-size: cover;
}
        	<style>
        
              .button:active {
              background-color: #3e8e41;
              box-shadow: 0 5px #666;
              transform: translateY(4px);
            }
                    .header img {
                      float: center;
                      width: 1200px;
                      height: 100px;
                      background: #555;
                    }
                    
                    .header h1 {
                      position: relative;
                      top: 18px;
                      left: 10px;
                    }
                    </style>
                    </head>
                    <body bgcolor="blue">
                    <div class="header">
                      <center><img src="images/car.png" alt="logo" /></center>
                    </div>
                      <style>
                        ul {
                          list-style-type: none;
                          margin:10px;
                          padding: 5px;
                          overflow: hidden;
                          background-color: rgb(2, 2, 2);
                          bottom: 0;
                          width: 100%;
                        }
                        
                        li {
                          float: left;
                        }
                        li {
                            float: left;
            }



                        
                        li a {
                          display: block;
                          color: white;
                          text-align: center;
                          padding: 14px 16px;
                          text-decoration: navajowhite;
                        }
                        
                        li a:hover {
                          background-color: #111;
                        }


                        body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 1% auto 5% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%;/* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

                        </style>
                        </head>
                        <body>
                        
            <ul>
              <li><a class="tablinks" onclick="openCity(event, 'view')" id="defaultOpen">$</a></li>
              <li><a class="tablinks" onclick="openCity(event, 'company')">Company</a></li>
              <li><a class="tablinks" onclick="openCity(event, 'model')">Model</a></li>
              <li style="float:right"><a class="tablinks" onclick="openCity(event, 'login')" >Manager</a></li>
            </ul>
        

        <div id="company" class="tabcontent">
  				<h3 style="color:blue; font-size:45px; ">COMPANY</h3>
          <form method="POST">
            <p>
                <label  style="font-size:30px">Search by Company:</label>
                  <input type="Search" name="company" placeholder="Enter company name" class="form-control mb-2" required>
                  <input type="submit" value="Search" name="Search">
                </p>
                
          </form>
           
		   	</div>


			  <div id="model" class="tabcontent">
  				<h3 style="color:blue; font-size:45px; ">Model</h3>
          <form method="POST">
            <p>
                <label  style="font-size:30px">Search by Model:</label>
                  <input type="Search" name="model" placeholder="Enter model " class="form-control mb-2" required>
                  <input type="submit" value="Search" name="sss">
                </p>
          </form>  				
			</div>

      <div id="login" class="tabcontent">
          <div class="login-block">
  <center><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;"> Login</button></center>

  <div id="id01" class="modal">
    
    <form class="modal-content animate" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
      <input type="hidden" name="action" value="admin">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/logo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Your username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" value="adminLogin" name="adminLogin">Login</button>
      
    </div>
        <div style = "font-size:20px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
    </form>
  </div>
</div>
           
        </div>
      <!DOCTYPE html>
      <html>
      <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
      * {box-sizing: border-box}
      body {font-family: Verdana, sans-serif; margin:0}
      .mySlides {display: none}
      img {vertical-align: middle;}
      
      /* Slideshow container */
      .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
      }
      
      /* Next & previous buttons */
      .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }
      
      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }
      
      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
      }
      
      /* Caption text */
      .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }
      
      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }
      
      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }
      
      .active, .dot:hover {
        background-color: #717171;
      }
      
      /* Fading animation */
      .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
      }
      
      @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }
      
      @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }
      
      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
      }
      </style>
      </head>
      <body bgcolor="blue">
      
      <div class="slideshow-container">
      
      <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="images/A.jpg" style="width:100%">
        <div class="text"></div>
      </div>
      
      <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="images/B.jpg" style="width:100%">
        <div class="text"></div>
      </div>
      
      <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="images/C.jpg" style="width:100%">
        <div class="text"></div>
      </div>
      
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
      
      </div>
      <br>
      
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
      </div>
      
      <script>
      var slideIndex = 0;
      showSlides(slideIndex);
      
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
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
      </script>
      
      </body>
      </html> 
      
   <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    
}
</script>
   
			

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
            
            
            
            
</html>