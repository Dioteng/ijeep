<?php
$connect = mysqli_connect("localhost", "root", "", "jeepdb");

if ($connect == TRUE) { //echo"connect man";

} else {
    echo "Failed to Connect";

    include("jdatabase.php");
}
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Log IN</title>

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
  -webkit-appearance: none;
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

#login form span {
  background-color: #363b41;
  border-radius: 3px 0px 0px 3px;
  border-right: 3px solid #434a52;
  color: #606468;
  display: block;
  float: left;
  line-height: 50px;
  text-align: center;
  width: 27px;
  height: 50px;
}

#login form input[type="text"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #a9a9a9;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 235px;
  height: 50px;
}

#login form input[type="password"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #a9a9a9;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 235px;
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
                    <a href="newhome.php" class="logo">
                        <img src="images/logonamo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="newhome.php"><b style="color: whitesmoke; text-decoration: underline wavy cyan 1.5px;">Profile</b></a></li>
                        <li><a href="commuterbrowse2.php">Browse Vehicles</a></li>
                        <li><a href="commuterbrowse.php">Browse Routes</a></li>
                        <li><a href="jlogout.php">Log Out</a></li>
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

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                  <div class="col-lg-4">
                    <br> <br> <br>
<?php
$sql = "SELECT * FROM commuters WHERE email='" . $_SESSION["email"] . "'";
  
$query = mysqli_query($connect, $sql);

while($result = mysqli_fetch_array($query)) {
 
  echo "<img src={$result['img']} align='center' width='100%' style='border-radius: 23px;''>";

}
?>
              <!-- ****<img src="images/screenshot_46.png" alt="" style="border-radius: 23px;"> ***** -->
                
                 <!-- *****  <?php echo $fetch['f_name']; ?> ***** -->
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">
                      <span>Welcome !</span>
                      <h4> <?php
if($_SESSION["email"]) {
?>
                <?php
                        $sql = "SELECT * FROM commuters WHERE email='" . $_SESSION["email"] . "'";
                         $query = mysqli_query($connect, $sql);
                         $querycheck = mysqli_num_rows($query);

                    if ($querycheck > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo $row['f_name'];
                        }
                    }
} else echo "<script> alert('Session Already Log out, Please log in again!'); window.location='newindex.php'; </script>";
?></h4>
                      <p>You Can only Read, Update, Delete and Edit your own Profile</p>
                                      

<br>
        <!-- PHP PRE COMMAND (POPUP Profile EDIT Commuters)--->
                    
                <?php
$sql = "SELECT * FROM commuters WHERE email='" . $_SESSION["email"] . "'";
    $query = mysqli_query($connect, $sql);
    while($fetch = mysqli_fetch_array($query)) {

if(isset($_POST['edit'])) {
    $connect = mysqli_connect("localhost", "root", "", "jeepdb");
    $sql = "SELECT * FROM commuters WHERE email='" . $_SESSION["email"] . "'";
    $query = mysqli_query($connect, $sql);
    $fetch = mysqli_fetch_array($query);
}
?>

<button type = "submit" class = "btn" onclick="openPopup()" >Edit Profile </button>


 <div class="popup" id = "popup">         <!---- POP UP START HERE ----->
    <script>
function closePopup(){
    popup.classList.remove("open-popup");
     
}
        </script>
                   
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

    <input type="hidden" name="commuters" value="<?php echo $fetch['email']; ?>">     </div>
                  </div>
                </table>
              </form>
            </div>


            <?php 
        }

        ?>
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
                  <div class="col-lg-4 align-self-center">
                    <ul>
                      <li>First Name     <?php
$sql = "SELECT * FROM commuters WHERE email='" . $_SESSION["email"] . "'";
$query = mysqli_query($connect, $sql);

while($result = mysqli_fetch_array($query)) {
    echo "<span>" . $result['f_name'] . "</span>"; }

?></li>
                      <li>Last Name <?php
$sql = "SELECT * FROM commuters WHERE email='" . $_SESSION["email"] . "'";
$query = mysqli_query($connect, $sql);

while($result = mysqli_fetch_array($query)) {
    echo "<span>" . $result['l_name'] . "</span>"; }

?></li>
                      <li>Email <?php
$sql = "SELECT * FROM commuters WHERE email='" . $_SESSION["email"] . "'";
$query = mysqli_query($connect, $sql);

while($result = mysqli_fetch_array($query)) {
    echo "<span>" . $result['email'] . "</span>"; }

?></li>
                      <li>Location <?php
$sql = "SELECT * FROM commuters WHERE email='" . $_SESSION["email"] . "'";
$query = mysqli_query($connect, $sql);

while($result = mysqli_fetch_array($query)) {
    echo "<span>" . $result['location'] . "</span>"; }

?></li>
                                            <div class="main-border-button">
                                  <form method="post" enctype="multipart/form-data">
           
            <button type="submit" class="buttonr" name="delete" style="font-size: 13px; width: 100%;"> Terminate My Account </a>
            </div> 
<spacer>
            </spacer>
            </form> 
              <?php
$sql = "SELECT * FROM commuters WHERE email='" . $_SESSION["email"] . "'";
    $query = mysqli_query($connect, $sql);
    while($fetch = mysqli_fetch_array($query)) {

if(isset($_POST['edit'])) {
    $connect = mysqli_connect("localhost", "root", "", "jeepdb");
    $sql = "SELECT * FROM commuters WHERE email='" . $_SESSION["email"] . "'";
    $query = mysqli_query($connect, $sql);
    $fetch = mysqli_fetch_array($query);
?>

                      </div>
                    </ul>

                  </div>
                </div>
  <div class="container">
    <div class="row">
        <div class="page-content">
                <div class="row">
                    <div class="clips">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="heading-section">
                          </div>
                        </div>           
   <div class="col-lg-4 align-self-center">
<form method="post" enctype="multipart/form-data" action="" id="login">
    <table >
        <a id="manageprofile"> <a>
 <ul>
   <li>First Name: <span><input type="text" id="user" value="<?php echo $fetch['f_name']; ?>" name="fname" required></span></li>

  <li>Last Name: <span><input type="text" id="user" value="<?php echo $fetch['l_name']; ?>" name="lname" required></span></li>
<button class="buttonb"type="submit" name="update" style="width: 100%;"> Update </button>

  </button></ul>
<tr bgcolor="white">
    <input type="hidden" name="commuters" value="<?php echo $fetch['email']; ?>">
    <th bgcolor="#c4bfbe" style="border-color: #c4bfbe" colspan="2">
            </th>
</tr>      </div>
                  </div>
                </table>
              </form>
            </div>
                  </div>
<?php
}
?>

<?php
if(isset($_POST['delete'])) {
    $fname = trim($_POST['fname']);

$sql="DELETE FROM `commuters` WHERE email='" . $_SESSION["email"] . "'";
$result=mysqli_query($connect,$sql);
if(mysqli_query($connect,$sql)){
  echo "<script> alert('ACCOUNT TERMINATED'); window.location='jlogout.php'; </script>" ;
}else{  
    echo "<script> alert('Owshee System's busy); window.location='jhome.php'; </script>";

}
}

?>

<?php
if(isset($_POST['update'])) {
    $fname = trim($_POST['fname']);
    $connect = mysqli_connect("localhost", "root", "", "jeepdb");
    $lname = trim($_POST['lname']);
    $password = trim($_POST['password']);

if(empty($fname)) {
    echo "<script> alert('Please Enter Your First Name'); </script>";
} elseif(empty($lname)) {
    echo "<script> alert('Please Enter Your Lastname Name'); </script>";
} elseif(empty($password)) {
    echo "<script> alert('Please Enter Your New Password'); </script>";
} else {
 $sql1 = "UPDATE `commuters` SET `f_name`= '$fname',`l_name`='$lname', `password`='$password' ";
 $sql1 .= " WHERE `email` = '{$_POST['commuters']}'";


if(mysqli_query($connect,$sql1)) {
    
    echo "<script> alert('Successfully Updated'); window.location='newhome.php'; </script>" ;

} else {
    echo "<script> alert('Failed to Update/Edit Profile (Missing components or fill ups)'); </script>";
    
}
}
}
}
?>

    </div>
    </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/custom.js"></script>


  </body>

</html>
