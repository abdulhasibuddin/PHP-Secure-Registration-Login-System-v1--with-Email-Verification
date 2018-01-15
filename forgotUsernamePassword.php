<?php require 'forgotUsernamePassword2.php'; ?><!--This line must be the first line of this file to be redirected to the next page by 'header()' function.-->
<?//----------------------------------------------------------------------------------------------------------------------------?>

<!--This file produces the front-end 'Reset account' page where user has to provide email address to get username/password reset code via email::-->
<!DOCTYPE html>
<html>
<head>
	<title>Reset account</title>

<!--The CSS properties of this page are given below::-->
	<style type="text/css">
		#tableId{
			width: 45%;
			height: 61vh;
			background-color: #f2f2f2;
			margin-top: 15vh;
			margin-left: 350px;
			padding-top: 0vh;
			padding-bottom: 30px;
			border-radius: 25px;
		}

		#td1{
			width: 35%;
			padding-left: 100px;
		}

		#errorId{
			color: red;
		}
		#footerId{
			text-align: center;
			margin-top: 17.9vh;
			padding-top: 1vh;
			height: 25px;
			width: 100%;
			background-color: grey;
		}
		#inputId{
			height: 25px; 
			width: 80%; 
			border-radius: 3px;
		}
	</style>
	
</head>
<body>
	<!--'POST' method prevents data from exposing on the url bar-->
	<!--Don't use $_SERVER['PHP_SELF'] as it is vulnerable to Cross-Site Scripting(XSS)-->
	<!--If you have to use $_SERVER['PHP_SELF'], then use it as htmlspecialchars($_SERVER['PHP_SELF'])-->
	<form method="POST" action="">

		<table id="tableId">		
			<tr>
				<td style="padding-left: 15vh; padding-right: 10vh; color: blue;"><h3>Forgot username or password?</h3><br>To reset your username or password, please enter the email associated with your account.</td>
			</tr>
		<?//--------------------------------------------------------------------------------------------------------------------?>

			<tr>
				<td>


					<table>
						<tr>
							<td></td>
							<td id="errorId"><?php echo $err; ?></td><!--Email and account related error messages are shown here-->
						</tr>
						<?//----------------------------------------------------------------------------------------------------?>

						<tr>
							<td id="td1">E-mail:</td>
							<td><!--Email input area-->
								<input id="inputId" type="text" name="email" value="<?php echo $eMail; ?>" required autofocus/>
							</td>
						</tr>
						<?//----------------------------------------------------------------------------------------------------?>

						<tr>
							<td id="td1"><img src="captcha.php"></td><!--Captcha image area-->
							<td id="errorId"><?php echo $captchaErr; ?></td><!--Captcha related error messages are shown here-->
						</tr>
						<tr>
							<td id="td1">Enter captcha: </td>
							<td><input id="inputId" type="text" name="vercode" required/></td><!--Captcha code input area-->
						</tr>
						<?//----------------------------------------------------------------------------------------------------?>

						<tr>
							<td>
								<div style="margin-left: 50%; margin-top: 15%;"><a href="loginPage.php"><strong>back</strong></a></div><!--Go back login page-->
							</td>
							<td>
								<input type="submit" value="Submit" style="height: 40px; width: 20%; margin-left: 61%; margin-top: 5%; border-radius: 3px;"/><!--Submit information-->
							</td>
						</tr>
					</table>


				</td>
			</tr>
		</table>

		<footer id="footerId"></footer><!--Footer of the page-->
	</form>
</body>
</html>
