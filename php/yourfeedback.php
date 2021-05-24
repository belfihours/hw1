<?php
	
	session_start();
	
	$conn = mysqli_connect('localhost', 'root', '', 'webprogramming') or die ("Errore: ".mysqli_connect_error());

	$query1="select id from cliente where nome='".$_COOKIE["nome"]."'";
	$res1 = mysqli_query($conn, $query1) or die ("Errore 1 : ".mysqli_connect_error());
	$id=mysqli_fetch_row($res1)[0];
	
	$query= "SELECT r.stelle, c.nome, r.data, r.testo from recensione r join cliente c on r.id_cliente=c.ID";
	$res = mysqli_query($conn, $query) or die ("Errore 1 : ".mysqli_connect_error());
		
	$stelle=[];
	$nomi=[];
	$date=[];
	$testi=[];
	$numrows=mysqli_num_rows($res);
	
	$i=0;
	
	while($row = mysqli_fetch_row($res))
		{
			$stelle[$i]=$row[0];
			$nomi[$i]=$row[1];
			$date[$i]=$row[2];
			$testi[$i]=$row[3];
			$i++;
		}
	

?>

<html>
	<head>
		<meta name="viewport"
		content="width=device-width, initial-scale=1">
		<title>PB - Feedback</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
		<link rel='stylesheet' href='../css/yourfeedback.css'>
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
		
		<h3 strong>Tutti i Feedback</h3>
		
		<div class = "container">
		<p> Qui puoi federe tutti i Feedback</p>

		<?php 
			for($i=1; $i<$numrows+1; $i++){
							echo "<div id='recensione'>";
							
									echo "<span id='num'>";
										echo $stelle[$numrows - $i] ;
									echo "</span>" ;
									echo "<span>";
										echo $nomi[$numrows - $i] ;
									echo "</span>" ;
									echo "<p>";
										echo $date[$numrows - $i] ;
									echo "</p>" ;
							
								echo "<span>";
									echo $testi[$numrows - $i] ;
								echo "</span>" ;
							echo "</div>";
							
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