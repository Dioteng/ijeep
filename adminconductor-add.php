<?php
session_start();

include("jdatabase.php");
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Admin</title>

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet"/>
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="jcss/newnamo.css">
<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->

    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;

    }


    .btn{
        padding: 10px 10px;
        background: #fff;
        border: 0;
        outline: none;
        cursor: pointer;
        font-size: 15px;
        font-weight: 500;
        border-radius: 30px;
    }
    .popup{
        background: #fff;
        border-radius: 8px;
        position: absolute;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.1);
        padding: 0 20px 20px;
        color: #333; 
        visibility: hidden ;
        transition: transform 0.4s, top 0.4s;

    }
    .open-popup{
        visibility: visible;
        top: 50%;
        transform: translate(-50%, -50%) scale(1);

    }

    .popup h2{
        font-size: 38px;
        font-weight: 500px;
        margin: 30px 0 10px;
    }

    .popup button{
        width: 100%;
        margin-top: 50px;
        padding: 10px 0;
        background: #6fd649;
        color: #fff;
        border: 0;
        outline: none;
        font-size: 18px;
        border-radius: 4px;
        cursor: pointer;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);

    }

    input[type=button], input[type=submit], input[type=reset] {
    background-color: #04AA6D;
      border: none;
      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
    }

    .popup img{
        width: 30px;
        margin-top: -30px;
        margin-left: 353px;
        border-radius: 50%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    input {
      border: none;
      font-family: 'Open Sans', Arial, sans-serif;
      font-size: 16px;
      line-height: 1.5em;
      padding: 0;
    }

    p {
      line-height: 1.5em;
    }

    after { clear: both; }

    #login {
      margin: 50px auto;
      width: 350px;
    }

    #login form {
      margin: auto;
      padding: 22px 22px 22px 22px;
      width: 100%;
      border-radius: 10px;
      background: #282e33;
      border-top: 3px solid #434a52;
      border-bottom: 3px solid #434a52;
    }

    #login form input[type="text"] {
      background-color: #3b4148;
      border-radius: 0px 3px 3px 0px;
      color: #a9a9a9;
      margin-bottom: 1em;
      padding: 0 16px;
      width: 100%;
      height: 50px;
    }

    #login form input[type="password"] {
      background-color: #3b4148;
      border-radius: 0px 3px 3px 0px;
      color: #a9a9a9;
      margin-bottom: 1em;
      padding: 0 16px;
      width: 100%;
      height: 50px;
    }

    #login form input[type="submit"] {
    background: linear-gradient(to right, #34aaaa, #035097);
      width: 100%;
      height: 30px;
      border-radius: 3px;
      padding: 5px 15px;
      text-decoration: none;
      margin: 4px 2px;
      color: white;
      cursor: pointer;
      transition: background 0.3s ease-in-out;
    }

    #login form input[type="submit"]:hover {
      background: #34aaaa;;

    }
            .buttonb {
      background-color: #4CAF50;
      width: 100%;
      border: none;
      color: white;
      padding: 10px 8px;
      text-align: center;
      text-decoration: none;
    font-size: 14px;
      margin: 4px 2px;
      cursor: pointer;
    }

    .buttonb:hover {
      background: #34aaaa;

    }


    .buttonr {
      background-color: #6f0000;
      border: none;
      color: white;
      padding: 10px 8px;
      text-align: center;
      text-decoration: none;
    font-size: 14px;
      margin: 4px 2px;
      cursor: pointer;
    }

    mark { 
      background-color: yellow ;
      color: yellow;
    }
    </style>
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

   <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="newadminhome.php" class="logo">
                        <img src="images/logonamo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="newadminhome.php">Home</a></li>
                        <li><a href="emplog.php">Employee Log</a></li>
                        <li><a href="vehiclelog.php">Vehicle Log</a></li>
                        <li><a href="adminlogout.php" >Log Out</a></li>
                    </ul>   
                  
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Featured Games Start ***** -->
          <div class="row">
            <div class="col-lg-8">
              <div class="featured-games header-text">
                <div class="heading-section">
                  <h4><em>Hello!</em>       
 <?php
if($_SESSION["username"]) {
?>
                <?php
                        $sql = "SELECT * FROM admin WHERE username='" . $_SESSION["username"] . "'";
                         $query = pg_query($con, $sql);
                         $querycheck = pg_num_rows($query);

                    if ($querycheck > 0) {
                        while ($row = pg_fetch_assoc($query)) {
                            echo $row['username'];
                        }
                    }
} else echo "<script> alert('Session Already Log out, Please log in again as Admin!'); window.location='newadmin.php'; </script>";
?>
                  </h4>
                </div>

              <!-- Insert Form -->
              <h4><a href="">Add Conductor</a></h4>
              <div id="login">
          <form id="login"  method="post"  enctype="multipart/form-data">
          <div class="form-outline mb-4">
            <input type="text" id="typefname" class="form-control" name="fname" required><label class="form-label text-light" for="typefname">First Name</label>            
          </div>
          <div class="form-outline mb-4">
            <input type="text" id="typelname" class="form-control" name="lname" required><label class="form-label text-light" for="typelname">Last Name</label>            
          </div>
          <div class="form-outline mb-4">
            <input type="text" id="typeemail" class="form-control" name="email" required><label class="form-label text-light" for="typeemail">Email</label>            
          </div>
          <div class="form-outline mb-4">
            <input type="text" id="address" class="form-control" name="address" required><label class="form-label text-light" for="address">Address</label>            
          </div>
          <div class="form-outline mb-4">
            <input type="password" id="typefname" class="form-control" name="password" required><label class="form-label text-light" for="typefname">Password</label>            
          </div>
          <input type="submit" name="register_btn" value="JOIN THE GANG !" value="Upload Image">
<?php
if(isset($_POST['register_btn'])) {
  $lname = trim($_POST['lname']);
  $fname = trim($_POST['fname']);
  $email = trim($_POST['email']);
  $address = trim($_POST['address']);
  $password = trim($_POST['password']);
  $sql1 = "SELECT * FROM conductors WHERE email = '$email'";
  $query1 = pg_query($con, $sql1);

if(empty($lname)) {
  echo "<p> Please enter Last Name</p>";
} elseif(empty($fname)) {
  echo "<p> Please enter Last Name </p>";
} elseif(pg_num_rows($query1)> 0) {
  echo " <br> <br><strong><center><mark>  
            Email Already Used !
        </mark></center></strong><br>";
} elseif(empty($password)) {
  echo "<p> Please enter Password </p>";
} elseif (empty($email)) {
  echo "<p> Please enter Email </p>";
} elseif (empty($address)) {
  echo "<p> Please enter Address </p>";
} else {
  $sql = "CALL insert_conductor('$fname', '$lname', '$email', '$address', '$password')"; 
  $query = pg_query($con, $sql);
                    $result = pg_fetch_array($query1);                
                    echo "<script> alert('Account Successfuly Registered'); window.location='adminconductor.php'; </script>";
  }
}
?>

    </form></div>
              </div>
            </div>

            <!-- ***** Side Nav ***** -->
            <div class="col-lg-4">
              <div class="top-downloaded">
                <div class="heading-section">
                  <h4 style="font-size: 25px"><em>Admin</em> Cours</h4>
                </div>
                <ul>
                  <li>
                    <img src="images/Conductor.png" alt="" class="templatemo-item">
                    

                    <h4>Conductors</h4>
                    <h6>Total: <b style="color: whitesmoke;"><?php include("numbers.php"); ?></b></h6>
                   
                       <h4><button onClick="location.href='adminconductor.php'" class="btn"><i class="fa fa-book"></i>  Manage</button> </h4>



                    <div class="download">
                    </div>
                  </li>
                  <li>
                    <img src="images/Drivers.png" alt="" class="templatemo-item">
                    <h4>Drivers</h4>
                    <h6>Total: <b style="color: whitesmoke;"><?php include("drivernumber.php"); ?></b></h6>
                   
                       <h4><button type = "submit" class = "btn" onClick="location.href='admindriver.php'" ><i class="fa fa-book"></i>  Manage</button> </h4>
                       


                    <div class="download">
                    </div>
                  </li>
                  <li>
                    <img src="images/Jeeps.png" alt="" class="templatemo-item">
                    <h4>Vehicles</h4>
                    <h6>Total: <b style="color: whitesmoke;"><?php include("vehiclenumber.php"); ?></b></h6>
                   
                       <h4><button onClick="location.href='adminvehicle.php'" class="btn"><i class="fa fa-book"></i>  Manage</button> </h4>
                    <div class="download">
                    </div>
                  </li>
                                    <li>              
                  <br>  <div class="main-button">
                <a href="adminduty.php" style="width:100%; text-align: center;"><i class="fa fa-road">  &nbsp; &nbsp; </i>Route Tours</a>
              </div>

                  </li>

<script>
let popup = document.getElementById("popup");
function openPopup(){
    popup.classList.add("open-popup");
     
}
function closePopup(){
    popup.classList.remove("open-popup");
     
}
        </script>
                </ul>

              </div>
            </div>
            <!-- ***** Side Nav End ***** -->
          </div>
          <!-- ***** Featured Games End ***** -->

          <!-- ***** Start Stream Start ***** -->
          <div class="start-stream">
            <div class="col-lg-12">
              <div class="heading-section">
               
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Start Stream End ***** -->

          <!-- ***** Live Stream Start ***** -->
          <div class="live-stream">
            <div class="col-lg-12">
              <div class="heading-section">
                
              </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/custom.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

  </body>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 <a href="#">Team Muggles</a> Group. All rights reserved. 
        </div>
      </div>
    </div>
  </footer>
  
</html>
