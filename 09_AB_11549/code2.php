<?php
	session_start();

	$host = "localhost"; // Host name 
	$username = "root"; // Mysql username 
	$password = ""; // Mysql password 
	$db_name = "tugas09user"; // Database name

	$conn = mysqli_connect($host, $username, $password, $db_name);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}


if(isset($_POST['Login'])) {
 	$user = $_POST['user'];
 	$pass = $_POST['pass'];

	$sql = 'select * from user where username="'.$user.'"';
 	$hasil = $conn->query($sql);
 
 	$rows = [];
 	if($hasil->num_rows > 0) {
 		// Push into $rows array
 		for($i=0; $row = $hasil->fetch_assoc(); $i++) array_push($rows, $row);
 	}
 
 	if($hasil->num_rows > 0 && $pass === $rows[0]["password"]){
 		$_SESSION['sessionLogin'] = $user;
 		echo "<h1>Anda berhasil LOGIN</h1>";
 		echo "<h2>Klik <a href='code3.php'> disini (code3.php)</a> untuk menuju
 		ke halaman pemeriksaan session";
 	} else {
     $_SESSION['notif'] = "Username atau password tidak valid!";
 		header("Location: ".$_SERVER['PHP_SELF']);
 	}
}
	else {
		?>
			<html>
				<body>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
								<td><input type="submit" name="Login" value="Log In"></td>
							</tr>
						</table>
					</form>
				</body>
			</html>
		<?php
	}
?>