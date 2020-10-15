<?php
session_start();
if(!empty($_POST["USERNAME"])) {
	$conn = mysqli_connect ("localhost", "root", "", "mis_login") or die ("could not connect to Database" $conn->connect_error);
	$sql =  @mysql_query "Select * from members where member_name = 'Username1". $_POST["Username"] . "' and member_password = 'Password1" .($_POST["Password"]) . "'";
	$result = mysqli_query($conn,$sql);
	$user = mysqli_fetch_array($result);
	if($user) {
					$_SESSION["member_id"]		   = $user["member_id"];
					
					if(!empty($_POST["remember"]]) {
							setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
							setcookie ("member_password",$_POST["member_password"],time()+ (10 * 365 * 24 * 60 * 60));
					} else {
							if(isset($_COOKIE["member_login"])) {
								setcookie ("member_login","");
							}
							if(isset($_COOKIE["member_password"])) {
								setcookie ("member_password","");
							}
					}
	} else {
			$message = "Invalid Login";

	}
header('Location: loggedIn.html');
die();
}
?>

