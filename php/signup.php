
<?php
	if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["nome_utente"]) && isset($_POST["password"]) && isset($_POST["password_c"])
	&& ($_POST["nome"])!="" && ($_POST["cognome"])!="" && ($_POST["nome_utente"])!="" && ($_POST["password"])!="" && ($_POST["password_c"])!=""){

	if($_POST["password"]!==$_POST["password_c"]){
		$errore_p = true;
		
	}
	$conn = mysqli_connect('localhost', 'root', '', 'webprogramming') or die ("Errore: ".mysqli_connect_error());
	
	$nome_utente = mysqli_real_escape_string($conn, $_POST['nome_utente']);

	$query = "SELECT nome_utente from cliente where nome_utente = '".$nome_utente."'";
	
	
	$res = mysqli_query($conn, $query) or die ("Errore 1 : ".mysqli_connect_error());
	
	if(mysqli_num_rows($res) > 0 ){
			$errore_e = true;
			
		}
	
	else{
		if($errore_p==false){
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
		$nome_utente = mysqli_real_escape_string($conn, $_POST['nome_utente']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$query1 = "insert into cliente values (null, '".$nome."','".$cognome."', '".$nome_utente."','".$password."')";
		$res1 = mysqli_query($conn, $query1) or die ("Errore 2 : ".mysqli_error($conn));	
		}
		
		
		}
		if($errore_p==false && $errore_e==false){
			mysqli_close($conn);
			header("Location: login.php");
			exit;
		}
		
	}
	else{
		
		$errore_c=true;
	
	}
	
	
	
?>

<html>
	<head>
		<meta name="viewport"
		content="width=device-width, initial-scale=1">
		<title>PB - Signup</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
		<link rel='stylesheet' href='../css/signup.css'>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
	</head>
	<body>
		<header>
			<div id ="overlay"></div>
        <h1 strong>Panificio Belfiore<br><br>Signup</h1>
        <div class='logo'>
            <img id='logo' src="../img/Logo.png">
            <h5 strong>Panificio Belfiore</h1> 
        </div>
		</header>
		
		<h3 strong>Registrati</h3>
		
		<div id = 'credenziali'>
		
			<form action='signup.php' method='post'>
				<label>Nome   <input type='text' name='nome' ></label>
				<label>Cognome   <input type='text' name='cognome' ></label>
				<label>Nome Utente   <input type='text' name='nome_utente' ></label>
				<label>Password   <input type='password' name='password' ></label>
				<label>Conferma Password   <input type='password' name='password_c' ></label>
				<label><input type='submit' name='invio' value='Iscriviti' ></label>
			</form>
			<?php
				if(isset($errore_c)){
					echo "<p class='error'>";
					echo "Compilare tutti i campi";
					echo "</p>";
				}
				else if(isset($errore_p)){
					echo "<p class='error'>";
					echo "Le password non corrispondono.";
					echo "</p>";
				}
				else if(isset($errore_e)){
					echo "<p class='error'>";
					echo "Nome utente già esistente";
					echo "</p>";
				}
			?>
		</div>
		
		<footer>
			<span>
				Simone Belfiore<br>1000011355<br>Università degli studi di Catania
			</span>
		</footer>
	</body>
	
</html>