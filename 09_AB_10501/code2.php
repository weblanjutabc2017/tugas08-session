<?php
session_start();

require_once 'koneksi.php';

if(isset($_POST['Login'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$sql = 'select * from user where username="'.$user.'"';
	$result = $conn->query($sql);
	$rows = [];
	if($result->num_rows > 0) {
		for($i=0; $row = $result->fetch_assoc(); $i++) array_push($rows, $row);
	}
	if($result->num_rows > 0 && $pass === $rows[0]["password"]){
		$_SESSION['sessionLogin'] = $user;
		echo "<h1>Anda berhasil LOGIN</h1>";
		echo "<h2>Klik <a href='code3.php'> disini (code3.php)</a> untuk menuju ke halaman pemeriksaan session";
	}
	else {
		header("Location: ".$_SERVER['PHP_SELF']);
	}
}
else {
?>
<html>
	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h3>Login</h3>
		<p><?php if(isset($_SESSION['notif'])) echo $_SESSION['notif']; unset($_SESSION['notif']); ?></p>
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