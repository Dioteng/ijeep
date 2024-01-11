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


  <title>Vehicle Log</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet"  href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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

    after { 
      clear: both; 
    }

    #login {
      margin: 50px auto;
      width: 350px;
    }

    .buttonb {
      background-color: #e63946;
      border-radius: 50px;
      border: 1px solid #FF4742;
      box-sizing: border-box;
      color: white;
      padding: 10px 8px;
      text-align: center;
      text-decoration: none;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer;
    }

    .buttonb:hover, .buttonr:hover {
      background: #34aaaa;
    }

    .buttonr {
      background-color: #e63946;
      border-radius: 50px;
      border: 1px solid #FF4742;
      box-sizing: border-box;
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
    /* insert */

    .active{
      color: #035097;
    }

    .main a{
      padding-left: 30px;
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
                        <li><a href="vehiclelog.php" class="active">Vehicle Log</a></li>
                        <li><a href="adminlogout.php">Log Out</a></li>
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

     
<br>
              <div class="featured-games header-text">
                <div class="heading-section">
                  <h4><em>Vehicle</em> Log</h4>
                  <div class="main-button1">
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href="newadminhome.php" style="width:100%; text-align: center;"><i class="fas fa-long-arrow-alt-left ">  &nbsp; </i>Go Home</a>
              </div>
                  <div class="gaming-library">
            <div class="col-lg-12">
              <div class="heading-section">
<table id="myTable" class="table row-bordered">
          <thead>
            <th>ID</th>
            <th>Jeepney Name</th>
            <th>Type</th>
            <th>Plate No.</th>
            <th>Capacity</th>
            <th>Transaction</th>
            <th>User</th>
            <th>Date</th>

          </thead>
          <tbody>
            <?php
            $sql = "SELECT v_id, jeep_name, vtype, plate_num, capacity, trans_type, trans_user, to_char(trans_date, 'MON-DD-YYYY HH24:MI:SS') AS trans_date
            FROM jeep_logs";
            
            $query = pg_query($con, $sql);
            
            while($row = pg_fetch_array($query)) {
              echo "<tr>";
              echo "<td>".$row['v_id'] . "</td>";
              echo "<td>".$row['jeep_name'] . "</td>";
              echo "<td>".$row['vtype'] . "</td>";
              echo "<td>".$row['plate_num'] . "</td>";
              echo "<td>".$row['capacity'] . "</td>";
              echo "<td>".$row['trans_type'] . "</td>";
              echo "<td>".$row['trans_user'] . "</td>";
              echo "<td>".$row['trans_date'] . "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
              </div>

            </div>

 <?php
if($_SESSION["username"]) {
?>
                <?php
                        $sql = "SELECT * FROM admin WHERE username='" . $_SESSION["username"] . "'";
                         $query = pg_query($con, $sql);
                         $querycheck = pg_num_rows($query);

                    if ($querycheck = 0) {
                        while ($row = pg_fetch_assoc($query)) {
                            echo $row['username'];
                        }
                    }
} else echo "<script> alert('Session Already Log out, Please log in again as Admin!'); window.location='newindex.php'; </script>";
?>

                </div>
            
 <div class="popup" id = "popup"> 
  <img src = "images/close.png" onclick="closePopup()" style="cursor: pointer;">
              <form method="post" enctype="multipart/form-data" action="" id="login">
    <table >
        <a id="manageprofile"> <a>
 <ul style="background-color: white !important;">
   <li>First Name: <input type="text" id="user" value="<?php echo $fetch['f_name']; ?>" name="fname" required></li>
   <li>Last Name: <input type="text" id="user" value="<?php echo $fetch['l_name']; ?>" name="lname" required></li>
   <li style="font-size: 12px;">New Password: <input type="password" value="<?php echo $fetch['password']; ?>" name="password" required></li>
      <li style="font-size: 10px;">Reenter Password: <input type="password" value="<?php echo $fetch['password']; ?>" name="password" required></li>
    <li style="font-size: 10px;">Select Image:  <input type="file" name="p_image" accept="image/*"></li>
<button class="buttonb"type="submit" name="update" style="width: 100%;"> Update </button>
</ul></a></ul>

    <input type="hidden" name="commuters" value="<?php echo $fetch['email']; ?>">     
    </div>
                  </div>
            </div>
                 
              </div>
            </div>
            
              </div>

<script>
let popup = document.getElementById("popup");
function openPopup(){
    popup.classList.add("open-popup");
     
}
function closePopup(){
    popup.classList.remove("open-popup");
     
}
        </script>



              </div>
            </div>
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

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="datatable/jquery.dataTables.min.js"></script>
  <script src="datatable/dataTable.bootstrap.min.js"></script>
  <!-- generate datatable on our table -->
  
<script>
$(document).ready( function () {
    $('#myTable').DataTable({
      order: [[7, 'desc']],
    });
} );
</script>


  </body>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2023 <a href="#">Team ABC</a> All rights reserved. 
          
        </div>
      </div>
    </div>
  </footer>

</html>
