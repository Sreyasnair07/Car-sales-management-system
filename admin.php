<!DOCTYPE html>
<html>
<head>
<style>
  .header img {
  float: center;
  width: 1000px;
  height: 80px;
  background: #555;
}

.header h1 {
  position: relative;
  top: 18px;
  left: 10px;
}
.button1 {
  position: fixed;
  left: 10px;
  bottom: 150px;
}
.button2 {
  position: fixed;
  left: 200px;
  bottom: 150px;
}
.button3 {
  position: fixed;
  left: 400px;
  bottom: 150px;
/}



.button {
  padding: 8px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 10px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

</style>
</head>
<style>
  body {
    background-image: url('images/car1.webp');
    background-repeat: no-repeat;
    background-attachment: fixed;  
    background-size: cover;
  }
  </style>
<body>
  <div class="header">
  <center><img src="images/car.png" alt="logo"></center>


  
  <center><h1 style="color:white; font-size:50px;">  CAR SHOWROOM </h1></center>
<center><h2 style="font-size:50px;">Welcome </h2></center>
<h2 style="color:green; font-size:50px;"> </h2>


<button class="button button1"><a href=admin_company.php>COMPANY</button>
<button class="button button2"><a href=admin_model.php>MODEL</button>
<button class="button button3"><a href=emp.php>EMPLOYEE</button>

</body>
</html>

