<?php 
session_start();

$message = "";

	include("jdatabase.php");
	include("functions.php");

	if ( isset($_GET['sucuname']) && $_GET['sucuname'] == 1 )
{
	 unset($_SESSION['sucuname']);
}

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//variables from html forms
		$username = $_POST['username'];
		$password = $_POST['password'];
		//check input
		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//db query
			$query = "select * from admin where username = '$username' AND password = '$password'";
			$result = pg_query($con, $query);

			if($result)
			{
				if($result && pg_num_rows($result) > 0)
				{

					$user_data = pg_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['username'] = $user_data['username'];
						$_SESSION['password'] = $user_data['password'];
						header("Location:newadminhome.php");
						die;
					}else{
						echo "Invalid Account Details!";
					}
				}
			}else{
				echo "Invalid Account Details!";
			}
	}
  }
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="jcss/newnamo.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>
    
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <!-- ***** Banner Start ***** -->
            <div class="mainbanner">
              <div class="row">
                <div class="col-lg-7">
                  <div class="header-text">
                    <h4><em style="color: #34aaaa;">WELCOME</em> to </h4>
                      <img src="images/logonamo.png">
                      <h1>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Admin</h1>
                      <br>
                      <h6>No More: <strong style="color: #34aaaa"> Revisions? Please.</strong></h6>
                  </div>
                </div>
                <div id="login">
                  <div class="column-">
                  <form method="post" enctype="multipart/form-data" action="">
                    <div class="message"><?php if($message!="") { echo $message; } ?></div>
                    <span><i class="fas fa-envelope"></i></i></span>
                    <input type="text" id="user" placeholder="Username" name="username" required>
                    <span class="fas fa-lock"></span>
                    <input type="password" id="pass" placeholder="Password" name="password" required>
                    <input type="submit" name="submit" value="Log In">
 
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- ***** Banner End ***** -->
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
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>

  </body>
    
  <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright © 2022 <a href="#">Team Muggles </a> Group. All rights reserved. 
          </div>
        </div>
      </div>
    </footer>

</html>
