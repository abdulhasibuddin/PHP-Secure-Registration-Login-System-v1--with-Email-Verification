<?php
	//This file executes if the session 'user' is set i.e. an autheticated user exists::
	//This file is required in 'resetAccount2.php'
	session_start(); //Starting session
	$user = ""; //Username of the current session will be assigned in this variable

	//If session 'user' is set (i.e. an autheticated user exists), print it; else go to the login page::
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user']; //Getting username from the current session
		echo "<div style='float: right; color: indigo;'>" . $user . "</div>"; //print the username on the top-right corner of the page
		echo "<h1 style='color:green'>Welcome " . $user ."</h1><h2 style='color:green;'>You're now Logged In!</h2>"; //Welcome mssage for the authenticated user
	}
	else{
		header("location: loginPage.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!--'POST' method prevents data from exposing on the url bar-->
	<!--Don't use $_SERVER['PHP_SELF'] as it is vulnerable to Cross-Site Scripting(XSS)-->
	<!--If you have to use $_SERVER['PHP_SELF'], then use it as htmlspecialchars($_SERVER['PHP_SELF'])-->
	<form action="" method="post">
		<footer id="footerId"><a href="logOut.php"><strong>Logout</strong></a></footer> <!--Log-out link-->
	</form>
</body>
</html>
