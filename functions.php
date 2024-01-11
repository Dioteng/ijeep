<?php
function check_login($con)
{

	if(isset($_SESSION['username'],$_SESSION['password']))
	{
	

		
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$query = "select * from admin_accounts WHERE username = '$username' AND password = '$password'";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	
	}

	//redirect to login
	header("Location: newadminhome.php");
	die;

}
?>