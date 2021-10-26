<?php
	session_start();
	$Nombre = $_POST['Nombre'];
	$Contraseña = $_POST['Contrasena'];
	

	$db = "hospital";
		$link = mysqli_connect("localhost", "root", " ", $db) or die ("<h2>No hay conexion</h2>");

		$sql = "SELECT COUNT(*) as cont FROM usuarios WHERE Usuario = '$Nombre' AND Password = '$Contrasena'";

		$resultado = mysqli_query($link, $sql);
		$array = mysqli_fetch_array($resultado);

		if ($array['cont']>0) {
			$_SESSION['User']= $Nombre;
			header("location: index.html");
		}else{
			include 'Login1.php';
			// echo '<script>
			// 	alert("Usuario o Contraseña incorrectos");
			// 	window.location="index.html";
			// </script>';
		}
?>