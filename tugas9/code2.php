<?php
session_start();

	$host = "localhost"; 
	$username = "root";  
	$password = ""; 
	$db_name = "tugas9"; 
	
	$conn = mysqli_connect($host, $username, $password, $db_name)
?>

<?php
if(isset($_POST['Login'])) {
 $user = $_POST['user'];
 $pass = $_POST['pass'];
 $login    = mysqli_query($conn, "select * from users where user='$user' and pass=$pass'");
 $result   = mysqli_num_rows($login);
 if($result>0){
	 $user = mysqli_fetch_array($login);
 $_SESSION['user'] = $user['user'];
 echo "<h1>Anda berhasil LOGIN</h1>";
 echo "<h2>Klik <a href='code3.php'> disini (code3.php)</a> untuk menuju
ke halaman pemeriksaan session";
 } else {
 header("Location: ".$_SERVER['PHP_SELF']);
 }
} else {
?> 
 <html>
 <body>
 <form method="post" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <h3>Login</h3>
 <table>
 <tr>
 <td>Username</td>
 <td>:</td>
 <td><input type="text" name="user"></td>
 </tr>
 <tr>
 <td>Password</td>
 <td>:</td>
 <td><input type="password" name="pass"></td>
 </tr>
 <tr>
 <td></td>
 <td></td>
 <td><input type="submit" name="Login" value="Log In"></
td>
 </tr>
 </table>
 </form>
 </body>
 </html>
<?php
}
?>