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
if(isset($_POST['Insert']))
    {
        if(empty($_POST['no']) || empty($_POST['name']) ||empty($_POST['id']) || empty($_POST['pet']) || empty($_POST['sta']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            
            $a = $_POST['no'];
            $b = $_POST['name'];
            $c = $_POST['id'];
            $d = $_POST['pet'];
            $e = $_POST['sta'];
            
            $query = " insert into models values('$a','$b','$c','$d','$e')";
            
            $result = mysqli_query($db,$query);
            if($result)
            {
               echo "Successfully Inserted";
            }
            else
            {   
                echo 'Data in this model ID alredy inserted, Please try to Update ';
            }
        }
    }


elseif(isset($_POST['Update']))
    {
       if(empty($_POST['no']) || empty($_POST['id']) || empty($_POST['sta']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            
            $a = $_POST['no'];
          
            $c = $_POST['id'];
         
            $e = $_POST['sta'];
            
            $query = " update  models set status='$e' where model_no='$a' and compony_id='$c'";
            
            $result = mysqli_query($db,$query);

             if($result)
            {
               echo " Successfully Updated";
            }
            else
            {
                echo 'Something Went Wrong';
            }
        }
    }
   

     elseif(isset($_POST['Delete']))
    {
        if(empty($_POST['no']) || empty($_POST['a'])  )
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $fid = $_POST['no'];
            $a=$_POST['a'];
            $query = " delete from models where model_no='$fid' and compony_id='$a'";
            $result = mysqli_query($db,$query);

            if($result)
            {
               echo "Successfully Deleted";
            }
            else
            {
                echo 'Something Went Wrong';
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
  background-image: url('images/car1.webp');
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
                    <body>
                    <div class="header">
                      <center><img src="images/car.png" alt="logo" /></center>
                    </div>
                      <style>
                        ul {
                          list-style-type: none;
                          margin:0px;
                          padding: 0px;
                          overflow: hidden;
                          background-color: #333;
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
                          text-decoration: none;
                        }
                        
                        li a:hover {
                          background-color: #111;
                        }
                        </style>
                        </head>
                        <body>
                        
            <ul>
              <li><a class="tablinks" onclick="openCity(event, 'view')" id="defaultOpen">$</a></li>
              <li><a class="tablinks" onclick="openCity(event, 'Insert')">Insert </a></li>
              <li><a class="tablinks" onclick="openCity(event, 'Update')">Update </a></li>
              <li><a class="tablinks" onclick="openCity(event, 'Delete')">Remove </a></li>
                
              <li style="float:right"><a class="active" href="index.php">Logout</a></li>
            </ul>
        <div id="view" class="tabcontent">
           
         
          
       </div>
        <div id="Insert" class="tabcontent">
          <h3 style="color:green; font-size:45px; ">Insert New Model</h3>
          <form method="POST">
            <p>
              <label  style="font-size:30px">Model Number &nbsp &nbsp &nbsp:</label>
                <input type="text" name="no" placeholder="Enter model number(XX000)" class="form-control mb-2" required>
              </p>
             <p>
              <label  style="font-size:30px">Model  Name &nbsp &nbsp &nbsp &nbsp :</label>
              <input type="text" name="name" placeholder="Enter Model Name" class="form-control mb-2" required>
            </p>
              <p>
                <label  style="font-size:30px">Company Id &nbsp &nbsp &nbsp &nbsp:</label>
                <input type="text" name="id" placeholder="Enter company_id" class="form-control mb-2" required>
              </p>
              <p>
                  <label  style="font-size:30px">Dieseal or Petrol :</label>
                  <input type="text" name="pet" placeholder="Enter fuel type" class="form-control mb-2" required>
                </p>
                <p>
                  <label  style="font-size:30px">Status &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:</label>
                  <input type="text" name="sta" placeholder="Enter fuel type" class="form-control mb-2" required>
                </p>
                 <input type="submit" value="Insert" name="Insert">
          </form>
          
          
        </div>


    <div id="Update" class="tabcontent">
         <h3 style="color:green; font-size:45px; ">Update Model Status</h3>
           <form method="POST">
 <p>
              <label  style="font-size:30px">Model Number &nbsp &nbsp &nbsp:</label>
                <input type="text" name="no" placeholder="Enter model number(XX000)" class="form-control mb-2" required>
              </p>
             
              <p>
                <label  style="font-size:30px">Company Id &nbsp &nbsp &nbsp &nbsp:</label>
                <input type="text" name="id" placeholder="Enter company_id" class="form-control mb-2" required>
              </p>
              
                <p>
                  <label  style="font-size:30px">Status &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:</label>
                  <input type="text" name="sta" placeholder="Enter fuel type" class="form-control mb-2" required>
                </p>
             
                <input type="submit" value="Update" name="Update">
          </form>
          
        </div>

      <div id="Delete" class="tabcontent">
          <h3 style="color:green; font-size:45px; ">Remove Model</h3>
          <form method="POST">
          <p>
           <label style="font-size:30px">Model number &nbsp &nbsp:</label>
           <input type="text" name="no" placeholder="Enter model no" class="form-control mb-2" required>
            </p>
            <p>
                <label  style="font-size:30px">Company Id &nbsp &nbsp &nbsp &nbsp:</label>
                <input type="text" name="a" placeholder="Enter company_id" class="form-control mb-2" required>
              </p>  
            <input type="submit" value="Delete" name="Delete">
            </form> 
            
      </div>


      
       
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