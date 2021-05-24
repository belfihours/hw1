<?php
	
	session_start();
	
	if(isset($_POST["text_r"]) && isset($_POST["stelle_r"]) )
	{
		if($_POST["text_r"]!==""){
			$conn = mysqli_connect('localhost', 'root', '', 'webprogramming') or die ("Errore: ".mysqli_connect_error());

		
			$stelle = mysqli_real_escape_string($conn, $_POST['stelle_r']);
			$text = mysqli_real_escape_string($conn, $_POST['text_r']);
		
			$query1="select id from cliente where nome='".$_COOKIE["nome"]."'";
			$res1 = mysqli_query($conn, $query1) or die ("Errore 1 : ".mysqli_connect_error());
			$id=mysqli_fetch_row($res1)[0];
			
			//faccio il replace così da evitare recensioni multiple dello stesso cliente
			$query = "replace into recensione values ('".$stelle."',  '".$id."', NOW(), '".$text."');";
			

		
			$res = mysqli_query($conn, $query) or die ("Errore 2 : ".mysqli_connect_error());
	
		
			mysqli_close($conn);
			header("Location: home_logged.php");
			exit;
		}
		
		else{
			 $errore=true;
		}
	}
	
?>

<html>
	<head>
		<meta name="viewport"
		content="width=device-width, initial-scale=1">
		<title>PB - Feedback</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
		<link rel='stylesheet' href='../css/feedback.css'>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
	</head>
	<body>
		<header>
			<div id ="overlay"></div>
        <a href="home.php">
                <h1 strong>Panificio Belfiore</h1> 
        </a>
        <div class='logo'>
            <img id='logo' src="../img/Logo.png">
            <h5 strong>Panificio Belfiore</h1> 
        </div>
		</header>
		
		<h3 strong>Feedback</h3>
		
		<div>
		
			<form action='feedback.php' method='post'>
				
				<label>Stelle<select name='stelle_r'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
						</select>
			
				</label>
				<label id="testo_r">Recensione   <input type='textarea' name= 'text_r' ></label>
				<label><input type='submit' name='invio' value='Invia Feedback!' ></label>
			</form>
			<?php
				if(isset($errore)){
					echo "<p class='error'>";
					echo "Scrivere del testo";
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