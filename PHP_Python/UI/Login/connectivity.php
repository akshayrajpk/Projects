<?php
session_start();

$mail = $_SESSION["email"];



$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "test"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

$query = mysqli_query($con,"SELECT *  FROM user where email = '$_POST[user]' AND pass = '$_POST[pass]'");
$row = mysqli_fetch_array($query);

$uname = $row['name'];

if(!empty($row['email']) AND !empty($row['pass']))
	{
		//$_SESSION['email'] = $row['pass'];
		//echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
		echo "mail".$mail;
		echo $uname;
		
		$_SESSION["name"] = $uname;

		header("Location:http://localhost/Project/louie/index.php");

	}
	else
	{
		echo "<script language=\"JavaScript\">\n";
						 echo "alert('Wrong Credentials Entered, Please check and try again.');\n";
						echo "window.location='login.html'";
						echo "</script>";
		//echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
		//sleep(3);
		//header("Location: http://localhost/Project/Login_v2/login.html");
		
		//sleep(10);
	}

?>