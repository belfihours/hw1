
<?php
	
	session_start();
	
	if(isset($_SESSION["utente"])){
		header("Location: home_logged.php");
		exit;
	}
	if(isset($_POST["nome_utente"]) && isset($_POST["pwd_utente"]))
	{
		
		$conn = mysqli_connect('localhost', 'root', '', 'webprogramming') or die ("Errore: ".mysqli_connect_error());

		
		$nome_utente = mysqli_real_escape_string($conn, $_POST['nome_utente']);
		$password = mysqli_real_escape_string($conn, $_POST['pwd_utente']);
		
		$query = "SELECT nome, id from cliente where nome_utente = '".$nome_utente."' and password = '".$password."'";

		
		$res = mysqli_query($conn, $query) or die ("Errore 1 : ".mysqli_connect_error());
	
		if( $row = mysqli_num_rows($res) > 0 ){
			
			$rowres = mysqli_fetch_object($res);
			
			
			$_SESSION["utente"] = $nome_utente;
			
			setcookie("nome", "".$rowres->nome."");
			
			header("Location: home_logged.php");
			mysqli_close($conn);
			exit;
		}
		else{
		
		$errore = true;
		}
		mysqli_close($conn);
	}
?>

<html>
	<head>
		<meta name="viewport"
		content="width=device-width, initial-scale=1">
		<title>PB - Login</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
		<link rel='stylesheet' href='../css/login.css'>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
	</head>
	<body>
		<header>
			<div id ="overlay"></div>
        <h1 strong>Panificio Belfiore<br><br>Login</h1>
        <div class='logo'>
            <img id='logo' src="../img/Logo.png">
            <h5 strong>Panificio Belfiore</h1> 
        </div>
		</header>
		
		<h3 strong>Login</h3>
		
		<div id = 'credenziali'>
		
			<form action='login.php' method='post'>
				<label>Nome Utente   <input type='text' name='nome_utente' ></label>
				<label>Password   <input type='password' name='pwd_utente' ></label>
				<label><input type='submit' name='invio' value='Login' ></label>
			</form>
			<?php
				if(isset($errore)){
					echo "<p class='error'>";
					echo "Credenziali non valide.";
					echo "</p>";
				}
			?>
			<p>Non sei registrato? <a href="signup.php">Clicca qui</a> per iscriverti!</p>
		</div>
		
		<footer>
			<span>
				Simone Belfiore<br>1000011355<br>Università degli studi di Catania
			</span>
		</footer>
	</body>
	
</html>