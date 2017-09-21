<?php
session_start();


$host = "localhost"; 
$username = "root"; 
$password = ""; 
$db_name = "web"; 



$conn = mysqli_connect($host, $username, $password, $db_name);
 	// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['Login'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];


	$sql = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE username='".$username."'"));
	$hasil = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	//$data = mysqli_fetch_array($hasil);

	$rows =[];
	if($hasil->num_rows > 0) {

		for($i=0; $row = $hasil->fetch_assoc(); $i++) array_push($rows, $row);
	}


if($hasil-> num_rows > 0 && $pass == $row[3]["password"]){
	$_SESSION['sessionLogin'] = $user;
	echo "<h1>Anda berhasil LOGIN</h1>";
	echo "<h2>Klik <a href='code3.php'> disini (code3.php)</a> untuk menuju ke halaman pemeriksaan session";
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