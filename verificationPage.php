<?php require 'verificationPage2.php';?><!--This line must be the first line of this file to be redirected to the next page by 'header()' function.-->
<?//----------------------------------------------------------------------------------------------------------------------------?>

<!--This file generates the account verification page front-end design::-->
<!DOCTYPE html>
<html>
<head>
	<title>Account Verification</title>

	<!--CSS design::-->
	<style type="text/css">
		#textId{
			padding-left: 15%;
			color: indigo;
		}

		#tableId{
			width: 45%;
			height: 61vh;
			background-color: #f2f2f2;
			margin-top: 10vh;
			margin-left: 350px;
			padding-top: 20px;
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
		#inputId{
			height: 25px; 
			width: 80%; 
			border-radius: 3px;
		}
	</style>

</head>
<body>
	<h4 id="textId">The activation code has been sent to your email address. Please, enter your username and the activation code to activate your account:</h4>

	<!--'POST' method prevents data from exposing on the url bar-->
	<!--Don't use $_SERVER['PHP_SELF'] as it is vulnerable to Cross-Site Scripting(XSS)-->
	<!--If you have to use $_SERVER['PHP_SELF'], then use it as htmlspecialchars($_SERVER['PHP_SELF'])-->
	<form method="POST" action="" >

		<table id="tableId">
			<tr>
				<td></td>
				<td id="errorId"><?php echo $err; ?></td><!--Error messages related to username & activation code are shown in this section-->
			</tr>
		<?//--------------------------------------------------------------------------------------------------------------------?>

			<tr>
				<td id="td1">Username:</td>
				<td>
					<input id="inputId" type="text" name="userName" value="<?php echo $userName; ?>" required autofocus/><!--Username input area-->
				</td>
			</tr>
		<?//--------------------------------------------------------------------------------------------------------------------?>

			<tr>
				<td id="td1">Activation code:</td>
				<td>
					<input id="inputId" type="text" name="activationCode" required/><!--Account activation code input area-->
				</td>
			</tr>
		<?//--------------------------------------------------------------------------------------------------------------------?>

			<tr>
				<td id="td1"><img src="captcha.php"></td><!--Captcha image area-->
				<td id="errorId"><?php echo $captchaErr; ?></td><!--Captcha code related error message is shown here-->
			</tr>

			<tr>
				<td id="td1">Enter Captcha: </td>
				<td><input id="inputId" type="text" name="vercode1" required/></td><!--Captcha input area-->
			</tr>
		<?//--------------------------------------------------------------------------------------------------------------------?>

			<tr>
				<td></td>
				<td>
					<input id="inputId" type="submit" value="Activate your account!" style="height: 40px; color: green;"/><!--'Activate your account' button-->
				</td>
			</tr>
		</table>

	</form>
</body>
</html>
