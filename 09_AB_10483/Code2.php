<?php
 		session_start();
 		
 		$servername = "localhost";
 		$username = "root";
 		$password = "";
 		$dbname = "praktikum8";
 		
 		$db = new mysqli($servername, $username, $password, $dbname);
 		// Check connection
 		if ($db->connect_error) {
 		    die("Connection failed: " . $db->connect_error);
 		}
 		
 		if(isset($_POST['Login'])) {
 			$user = $_POST['user'];
 			$pass = $_POST['pass'];
 		
 			// utk mengambil/mengakses password dari database
 			//select * untuk mengambil data dati tabel di db
 			$sql = 'select * from user where user="'.$user.'"';
 			$result = $db->query($sql);
 		
 			$rows = [];
 			if($result->num_rows > 0) {
 				for($i=0; $row = $result->fetch_assoc(); $i++) array_push($rows, $row);
 				// perintah mysqli_fetch_assoc tidak bisa membuat hasil berupa index. berbeda dg yang dilakukan oleh fungsi mysqli_fetch_array.
 				//hasil mysqli_fetch_assoc hanya berupa array['nama_field'] 
 			}
 		
 			if($result->num_rows > 0 && $pass === $rows[0]["pass"]){
 				$_SESSION['sessionLogin'] = $user;
 				echo "<h1>Anda berhasil LOGIN</h1>";
 				echo "<h2>Klik <a href='code3.php'> disini (code3.php)</a> untuk menuju
 				ke halaman pemeriksaan session";
 			} else {
 		    $_SESSION['peringatan'] = "Username atau Password anda salah !";
 				header("Location: ".$_SERVER['PHP_SELF']);
 			}
 		} else {
 		?>
 		<html>
 		<body>
 			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 				<h3>Login</h3>
 		    <p><?php if(isset($_SESSION['peringatan'])) echo $_SESSION['peringatan']; unset($_SESSION['peringatan']); ?></p>
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
