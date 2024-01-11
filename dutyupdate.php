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
    #login form select {
      background-color: #3b4148;
      border-radius: 0px 3px 3px 0px;
      color: #a9a9a9;
      margin-bottom: 1em;
      padding: 0 16px;
      width: 100%;
      height: 50px;
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
<?php 
if (isset($_POST['update'])) 
  { 
  
    $id=$_POST['id'];
    $query="SELECT * FROM trans_duty WHERE td_id='$id'";
    $query_run=pg_query($con,$query);
    $fetches=pg_fetch_array($query_run);
   

if($query_run)

 {
 }
?>

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
                </div>

          <h4><a href="">Update Driver</a></h4>
              <div id="login">
          <form id="login"  method="post"  enctype="multipart/form-data">
          <ul>

<?php
            $sql = "SELECT trans_duty.td_id,   
            jeep.vehicle_name AS v_id,
            CONCAT(drivers.firstname,' ',drivers.lastname) AS d_id, 
            CONCAT(conductors.firstname,' ',conductors.lastname) AS c_id, 
            route_loc, set_off
            FROM trans_duty
            JOIN jeep ON trans_duty.v_id=jeep.vehicle_id
            JOIN drivers ON trans_duty.d_id = drivers.driver_id
            JOIN conductors ON trans_duty.c_id = conductors.conductor_id
            ORDER BY set_off DESC";
            
            $query = pg_query($con, $sql);
            $rows = pg_fetch_array($query);
?>          
            <select name="vname" required>
            <option value="<?php echo $fetches['v_id']; ?>" hidden> 
              <?php echo $rows['v_id']; ?></option>
          <?php
            $sql = "SELECT * FROM jeep";
            $query = pg_query($con, $sql);
            while($fetchc = pg_fetch_array($query)) {
          ?>
          <option value="<?php echo $fetchc['vehicle_id']; ?>" >
            <?php echo $fetchc['vehicle_name']; ?> 
          </option>
          </input>
          <?php
            }
            ?>   
          </select>
          <br>
          <select name="driver" required>
            <option value="<?php echo $fetches['d_id']; ?>" hidden> 
              <?php echo $rows['d_id']; ?></option>
          <?php
            $sql = "SELECT * FROM drivers";
            $query = pg_query($con, $sql);
            while($fetchc = pg_fetch_array($query)) {
          ?>
          <option value="<?php echo $fetchc['driver_id']; ?>" >
          <?php echo  $fetchc['firstname'] . "  " .  $fetchc['lastname']; ?> 
          </option>
          </input>
          <?php
            }
            ?>   
          </select>
          <br>
          <select name="conductor" required>
            <option value="<?php echo $fetches['c_id']; ?>" hidden> 
              <?php echo $rows['c_id']; ?></option>
          <?php
            $sql = "SELECT * FROM conductors";
            $query = pg_query($con, $sql);
            while($fetchc = pg_fetch_array($query)) {
          ?>
          <option value="<?php echo $fetchc['conductor_id']; ?>" >
          <?php echo  $fetchc['firstname'] . "  " .  $fetchc['lastname']; ?> 
          </option>
          </input>
          <?php
            }
            ?>   
          </select>
            <br>
          <select name="route" id="route" required>
                  <option value="<?php echo $fetches['route_loc'] ?>" hidden ><?php echo $rows['route_loc']?></option>
                  <option value="Tambo - Bayanihan">Tambo - Bayanihan</option>
                  <option value="Dalipuga - City Proper">Dalipuga - City Proper</option>
                  <option value="Buruun - City Proper">Buruun - City Proper</option>
                  <option value="Suarez - City Proper">Suarez - City Proper</option>
            </select>
            <br>
            </ul>
          <input type="hidden" name="td_id" value="<?php echo $fetches['td_id']; ?>">   
          <input type="submit" name="update_btn" value="Update Session!"> 
       
<?php
}
if(isset($_POST['update_btn'])) {
    $tdid = trim($_POST['td_id']);
    $vname= trim($_POST['vname']);
    $driver = trim($_POST['driver']);
    $conductor = trim($_POST['conductor']);
    $route = trim($_POST['route']);
    $sql1 = "CALL up_duty('$tdid','$vname','$driver','$conductor','$route')";

if(pg_query($con,$sql1)) {
    
    echo "<script> alert('Successfully Updated'); window.location='adminduty.php'; </script>" ;

} else {
    echo "<script> alert('Failed to Update/Edit Profile (Missing components or fill ups)'); </script>";
    
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