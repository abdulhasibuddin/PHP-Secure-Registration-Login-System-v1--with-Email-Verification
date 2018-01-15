<?php
	//After submitting the form of 'loginPage.php', submitted 'name' properies are processed in this file::
	session_start(); //Start session
	require 'secureInput.php'; //This file checks for cross-site scripting(XSS) vulnerability
	
	//-----------------------------------------------------------------
	$userName = $password = "";
	$err = $captchaErr =  "";
	$errFlag = 0; //If any error occures, this flag would be valued 1


	//-----------------------------------------------------------------
	if($_SERVER["REQUEST_METHOD"]=="POST") { //Checking if the form was submitted as POST
		
		$userName = secureInput($_POST["userName"]); //XSS vulnerability checking of input username
		if(!preg_match("/^[a-zA-Z0-9_]*$/", $userName)) { //Regular expression comparison
			//If input username is invalid::
			$err = "Incorrect username or password!"; 
			$errFlag = 1;
		}
	//-----------------------------------------------------------------


		$password = secureInput($_POST["password"]); //XSS vulnerability checking of input password
		if(!preg_match("/^[a-zA-Z0-9_]*$/", $password)) { //Regular expression comparison
			//If input password is invalid::
			$err = "Incorrect username or password!"; 
			$errFlag = 1;
		}		
		//---------------------------------------------------------

		require 'checkLoginPassword.php'; //This file gets the password corresponding to the username.
		$verPass = ""; //Variable to hold the encrypted password selected from the database

		foreach($chkResult as $value){ //Traversing columns of the selected row
			if(count(array_filter($value)) > 0) { //If username/account exists...
				$verPass = $value["password"]; //get the encrypted password stored in the database corresponding to the username...
			}
			else{
				//If username/account does not exist::
				$err = "Incorrect username or password!"; 
				$errFlag = 1;
			}
		}

		//password_verify('Unencrypted password needs to be verified', 'Encrypted password to be verified with')::
		if (!password_verify($password, $verPass)) { //Verify the user input password with the stored password,
			//if they don't match::
			$err = "Incorrect username or password!";
			$errFlag = 1;
		}
	//-----------------------------------------------------------------

		
		//$_POST["vercode"]-> captcha code input by the user [here, 'vercode' is the name of the captcha input field; don't be 	confused with the session 'vercode'!]
		//$_SESSION["vercode"]-> session 'vercode' holding the actual captcha code

		if(isset($_SESSION["vercode"])){ //Check if session 'vercode' is set
			if($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"] == ""){
				//If the captcha input is not correct or if the session 'vercode' does not contain any captcha::
				$captchaErr =  "Incorrect captcha!";
				$errFlag = 1;
			}
			else{
				session_unset($_SESSION["vercode"]); //Unsetting session 'vercode' when captcha is confirmed
			}	
		}	
	}
	//-----------------------------------------------------------------


	require 'checkAccountStatus.php'; //This file gets the current status of the corresponding username
	if ($status == 0 AND $userName != "" AND $password != "") { //If the account is not activated yet...
			if($err == ""){//and if there is no other error...
				$err = "Your account is not activated yet!<br><a href='verificationPage.php'><strong>Activate</strong></a> your account now."; //alert user and give the link to activation page
			} 
			$errFlag = 1; //Set the error flag high
		}
	//-----------------------------------------------------------------


	if ($userName != "" AND $password != "" AND $errFlag == 0) { //If the username and password fields are not empty and if there is no other error...
		$_SESSION['user'] = $userName; //assign the username to the session 'user'...
		header("location: authenticatedUser.php"); //take the user to his/her own authenticated page
		//Note: The 'header()' function will function properly if this file is required at the first/top of the corresponding HTML file (loginPage.php).
	}
?>
