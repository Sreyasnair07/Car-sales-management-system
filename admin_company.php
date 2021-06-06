
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
        if(empty($_POST['id']) || empty($_POST['name']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $compony_id = $_POST['id'];
            $name = $_POST['name'];
            
            $query = " insert into compony (compony_id, compony_name) values('$compony_id','$name')";
            $result = mysqli_query($db,$query);

            if($result)
            {
               echo "Successfully Inserted";
            }
            else
            {   
                echo 'Data in this Company ID alredy inserted, Please try to Update ';
            }
        }
    }

    elseif(isset($_POST['Update']))
    {
       if(empty($_POST['id']) || empty($_POST['name']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $compony_id = $_POST['id'];
            $name = $_POST['name'];
            
            $query = " update  compony set compony_name='$name' where compony_id='$compony_id'";
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
        if(empty($_POST['id'])  )
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $fid = $_POST['id'];
            $query = " delete from compony where compony_id='$fid'";
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

    elseif(isset($_POST['Search']))
    {
        if(!empty($_POST['id'])  )
        {   
           
           $sql="SELECT * FROM compony  WHERE compony_id like '%$_POST[id]%'";
           $result=mysqli_query($db,$sql);
           if($result->num_rows > 0)
           {  
             echo "<table border='1'>
              <tr>
        <th>Company Id</th>
        <th>Company Name</th>
        
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr><td>" . $row['compony_id'] . "</td>";
        echo "<td>" . $row['compony_name'] . "</td>";
       
        }

        echo "</table>";
       }
       else{echo 'Data not Found.';}
        }
        elseif(!empty($_POST['name']))
        {
           
           $sql="SELECT * FROM compony WHERE compony_name like '%$_POST[name]%'";
           $result=mysqli_query($db,$sql);
           if($result->num_rows > 0)
           {
           echo "<table border='1'>
            <tr>
      <th>Company Id</th>
        <th>Company Name</th>
      </tr>";

      while($row = mysqli_fetch_array($result))
      {
      echo "<tr><td>" . $row['compony_id'] . "</td>";
        echo "<td>" . $row['compony_name'] . "</td>";
      }
      echo "</table>";
       }
        else{echo 'Data not Found.';}
        }
         
    }



   
?>


<!DOCTYPE html>
<html>
    <body >
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
                        <style>
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
                        <body>
                        
           <ul>
              <li><a class="tablinks" onclick="openCity(event, 'view')" id="defaultOpen">$</a></li>
              <li><a class="tablinks" onclick="openCity(event, 'Insert')">Insert </a></li>
              <li><a class="tablinks" onclick="openCity(event, 'Update')">Update </a></li>
              <li><a class="tablinks" onclick="openCity(event, 'Delete')">Remove </a></li>
                <li><a class="tablinks" onclick="openCity(event, 'Search')">Search </a></li>
              <li style="float:right"><a class="active" href="index.php">Logout</a></li>
            </ul>
        <div id="view" class="tabcontent">
           
          
       </div>

        <div id="Insert" class="tabcontent">
          <h3 style="color:green; font-size:45px; ">Insert Company</h3>
          <form method="POST">
            <p>
              <label  style="font-size:30px">company ID &nbsp &nbsp &nbsp &nbsp :</label>
                <input type="text" name="id" placeholder="Enter Company_id" class="form-control mb-2" required>
              </p>
             <p>
              <label  style="font-size:30px">Company Name &nbsp&nbsp :</label>
              <input type="text" name="name" placeholder="Enter Company Name" class="form-control mb-2" required>
            </p>
              
                 <input type="submit" value="Insert" name="Insert">
          </form>
          
          
        </div>


        <div id="Update" class="tabcontent">
         <h3 style="color:green; font-size:45px; ">Update Company</h3>
           <form method="POST">
              <p>
              <label  style="font-size:30px">company ID &nbsp &nbsp &nbsp &nbsp :</label>
                <input type="text" name="id" placeholder="Enter Company_id(XX000)" class="form-control mb-2" required>
              </p>
             <p>
              <label  style="font-size:30px">Company Name &nbsp&nbsp :</label>
              <input type="text" name="name" placeholder="Enter Company Name" class="form-control mb-2" required>
            </p>
                <input type="submit" value="Update" name="Update">
          </form>
           
     
        </div>



       <div id="Delete" class="tabcontent">
          <h3 style="color:green; font-size:45px; ">Remove Company</h3>
          <form method="POST">
          <p>
           <label style="font-size:30px">Company Id &nbsp &nbsp:</label>
           <input type="text" name="id" placeholder="Enter Company id" class="form-control mb-2" required>
            </p>  
            <input type="submit" value="Delete" name="Delete">
            </form> 
           
      </div>


        <div id="Search" class="tabcontent">
          <h3 style="color:green; font-size:45px; ">Search for Staff</h3>
          <form method="POST">
            <p>
              <label  style="font-size:30px">Search by Company Id &nbsp &nbsp &nbsp &nbsp:</label>
                <input type="text" name="id" placeholder="Enter Company_id " class="form-control mb-2" required>
                 <input type="submit" value="Search" name="Search">
              </p>
            </form>
            <form method="POST">
             <p>
              <label  style="font-size:30px"> Search by Company name &nbsp:</label>
              <input type="text" name="name" placeholder="Enter company Name" class="form-control mb-2" required>
               <input type="submit" value="Search" name="Search">
            </p>
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
