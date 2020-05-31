<?php
//session_start();

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "test"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}


$sqll="SELECT * FROM  user  WHERE email='$_POST[email]'";
				    $result=mysqli_query($con,$sqll);
					$rec=mysqli_fetch_row($result);
                    $count=mysqli_num_rows($result);
						if( $count > 0)
						{
						echo "<script language=\"JavaScript\">\n";
						 echo "alert('Email Already Registred');\n";
						echo "window.location='index.html'";
						echo "</script>";
						}
						
						else {
								$image = mysqli_real_escape_string($con,file_get_contents("dummy.png"));
								$sql = "INSERT INTO user  VALUES ('$_POST[email]', '$_POST[name]', '$_POST[password]', '$image')";

								if (mysqli_query($con, $sql)) 
								{
									echo "New record created successfully";
									echo "<script language=\"JavaScript\">\n";
							   echo "alert('Registred!!!Login To Continue');\n";
								echo "window.location='http://localhost/Project/Login_v2/login.html'";
								echo "</script>";
								} 
								else 
								{
								echo "Error: " . $sql . "<br>" . mysqli_error($con);
								}
						}



?>