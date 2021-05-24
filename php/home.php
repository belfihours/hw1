<?php
	session_start();
	if(isset($_SESSION["utente"])){
		header("Location: home_logged.php");
		exit;
	}
	$conn = mysqli_connect('localhost', 'root', '', 'webprogramming') or die ("Errore: ".mysqli_connect_error());
	
	$query= "SELECT r.stelle, c.nome, r.data, r.testo from recensione r join cliente c on r.id_cliente=c.ID;";
	
	$res = mysqli_query($conn, $query) or die ("Errore 1 : ".mysqli_connect_error());
	
	$stelle=[];
	$nomi=[];
	$date=[];
	$testi=[];
	$sumstars=0;
	$numrows=mysqli_num_rows($res);
	
	$i=0;
	
	while($row = mysqli_fetch_row($res))
		{
			$sumstars+=$row[0];
			$stelle[$i]=$row[0];
			$nomi[$i]=$row[1];
			$date[$i]=$row[2];
			$testi[$i]=$row[3];
			$i++;
		}
	$media=$sumstars/$numrows;
	
	
	
?>

<html>
  <head>
	<?php
	echo "<script
      src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBS9s1LE6Qx3C7Sv4WXK-TfTgBd5e9Cew0&callback=initMap&libraries=&v=weekly'async></script>"
	?>
    <meta name="viewport"
    content="width=device-width, initial-scale=1">
    <title>Panificio Belfiore</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='../css/home.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <script src='../script/home.js' defer></script>
    
  </head>
  <body>
    <header>
        <div id ="overlay"></div>
        <a href="home.php">
                <h1 strong>Panificio Belfiore</h1> 
            </a>
        <div class='logo'>
            <img id='logo' src="../img/Logo.png">
            <h5 strong>Panificio Belfiore</h5> 
        </div>
    </header>
    
    <div class="container">
        <nav>
            <a href="login.php">
                <span>Login</span>
            </a>
        </nav>   
        <nav>
            <a href=#informazioni>
                <span>Informazioni</span>
            </a>
			<a href=#recensioni>
                <span>Recensioni</span>
            </a>
            <a href=#mappa>
                <span>Dove siamo</span>
            </a>
            
        </nav>
        <div id="menu">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    
    <main>
        <div class='a' id='Pane'>
            <div class="button">
                <img src="../img/bread.png">
                <span>Pane</span>
            </div>
        </div>
        <div  class='a' id='Pizza'>
            <div class="button" >
                <img src="../img/pizza.png">
                <span>Pizze</span>
            </div>
        </div>
        <div class='a' id='Biscotti'>
            <div class="button">
                <img src="../img/cookie.png">
                <span>Biscotti</span>
            </div>
        </div>
        <div  class='a' id='Bevande'>
            <div class="button">
                <img src="../img/beer.png">
                <span>Bevande</span>
            </div>
        </div>
        <div  class='a' id='Ingredienti'>
            <div class="button" id='Ingredienti'>
                <img src="../img/vegetable.png">
                <span>Ingredienti</span>
            </div>
        </div>
    </main>
    <div class='preferiti hidden'></div>
    <div class='search hidden'>
        <input placeholder="Cerca"></input>
        <img src="../img/search.png">
    </div>
    <div class='corrente hidden'></div>
    <h3 strong> I nostri prodotti</h3>
    <div class="photogallery">
        <img id='pane' src="../img/pane.jpg">
        <img id='pizza' src="../img/pizza-napoletana.jpg">
        <img id='biscotti' src="../img/biscotti.jpg">
        <img id='bevande' src="../img/cocacola.jpg">
        <img id='tavolacalda' src="../img/tavolacalda.jpg">
    </div>
    <h3 strong id=informazioni>Informazioni</h3>
    <div id="info">
        <span>Via Matteo Renato Imbriani, 55, Catania</span><br>
        <span>095 447912</span>
    </div>
	<h3 strong id=recensioni>Recensioni</h3>
		<div class="recensioni">
			<div class="sinistra">
				<span id=stelle>
					<?php print round ($media, 1) ?>	
				</span>
				<a href="login.php">
					<span>Clicca qui per lasciarne una!</span>
				</a>
				<span>Oppure</span>
				<a href="yourfeedback.php">
					<span>Leggi tutte le recensioni</span>
				</a>
				
			</div>
			<div id=clienti>
				<?php
					if($numrows>=4){
						for($i=1; $i<5; $i++){
							echo "<div id='recensione'>";
							echo "<div id='recensioneinfo'>";
							echo "<span id='num'>";
							echo $stelle[$numrows - $i] ;
							echo "</span>" ;
							echo "<span>";
							echo $nomi[$numrows - $i] ;
							echo "</span>" ;
							echo "<p>";
							echo $date[$numrows - $i] ;
							echo "</p>" ;
							echo "</div>";
							echo "<p>";
							echo $testi[$numrows - $i] ;
							echo "</p>" ;
							echo "</div>";
							
						}
					}
					else{
						for($i=1; $i<$numrows+1; $i++){
							echo "<div id='recensione'>";
							echo "<div id='recensioneinfo'>";
							echo "<span id='num'>";
							echo $stelle[$numrows - $i] ;
							echo "</span>" ;
							echo "<span>";
							echo $nomi[$numrows - $i] ;
							echo "</span>" ;
							echo "<p>";
							echo $date[$numrows - $i] ;
							echo "</p>" ;
							echo "</div>";
							echo "<p>";
							echo $testi[$numrows - $i] ;
							echo "</p>" ;
							echo "</div>";
							
						}
					}
					
					
				
		
				?> 
			</div>
			
		</div>
		
    <h3 strong id=mappa>Dove trovarci</h3>
    <div class="mappa">
        <div id="map"></div>
    </div>
    <div id='food image'></div>
    

    <footer>
        <span>
            Simone Belfiore<br>1000011355<br>Università degli studi di Catania
        </span>
    </footer>     
    
  </body>
</html>