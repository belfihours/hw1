<?php 
    header('Content-Type: application/json');
    
	$pane=array(
	array(
		'titolo' => 'Pane Bianco', 
        'descrizione' => 'Pane semplice con Farina 00', 
        'immagine' => 'https://www.gustissimo.it/articoli/scuola-di-cucina/impasti-e-pastelle/mafalda-siciliana.jpg'
		),
	array(
		'titolo' => 'Pane di Semola', 
        'descrizione' => 'Pane semplice con Farina di semola', 
        'immagine' => 'https://blog.cookaround.com/veronic/wp-content/uploads/2020/03/pizap.com14649848128272.jpg'
		),
	array(
		'titolo' => 'Pane di Casa', 
        'descrizione' => 'Pane senza lievito aggiunto', 
        'immagine' => 'https://uploads.nonsprecare.it/wp-content/uploads/2014/11/ricetta-pane-fatto-in-casa.jpg'
		),
	array(
		'titolo' => 'Pane di Timilia', 
        'descrizione' => 'Pane con farina speciale di Timilia', 
        'immagine' => 'https://files.synapp.it/1340202/foto/prodotti/B/1599302237454_dsc_6006m_B.jpg'
		),
	array(
		'titolo' => 'Pane ai 5 Cereali', 
        'descrizione' => 'Pane con farina ai 5 Cereali', 
        'immagine' => 'http://2.bp.blogspot.com/-4T0v1eehWBw/UUA7JxmbtoI/AAAAAAAAALY/rVHUzP5wV-U/s640/CIMG2907.JPG'
		),
	array(
		'titolo' => 'Morbidoni', 
        'descrizione' => 'Pane adatto per spuntini e Hamburgers', 
        'immagine' => 'https://tuttofabrodoincucina.it/wp-content/uploads/2020/09/PANINI-MORBIDONI-AL-LATTE-3-1-1200x900.jpg'
		)
	);
	
	$pizza=array(
	array(
		'titolo' => 'Margherita', 
        'descrizione' => 'pomodoro, mozzarella, olio e origano', 
        'immagine' => 'https://i2.wp.com/www.piccolericette.net/piccolericette/wp-content/uploads/2017/12/3240_Pizza.jpg?resize=895%2C616&ssl=1'
		),
	array(
		'titolo' => 'Capricciosa', 
        'descrizione' => 'pomodoro, mozzarella, prosciutto cotto, funghi, olive e carciofini', 
        'immagine' => 'https://blog.cookaround.com/veronic/wp-content/uploads/2020/03/pizap.com14649848128272.jpg'
		),
	array(
		'titolo' => 'Patatina', 
        'descrizione' => 'pomodoro, mozzarella, patatine fritte e olio', 
        'immagine' => 'https://www.dolcidee.it/media/uploads/recipe/5ede46927ca62_tmp6d9b772b4286436abd426b9e1c3769ba.jpg'
		),
	array(
		'titolo' => 'Piccante', 
        'descrizione' => 'pomodoro, mozzarella, salame piccante, cipolla, olive e olio', 
        'immagine' => 'https://i2.wp.com/www.piccolericette.net/piccolericette/wp-content/uploads/2016/07/3019_Pizza.jpg?resize=895%2C616&ssl=1'
		)
	);
	
	$biscotti=array(
	array(
		'titolo' => 'Biscotti al latte', 
        'descrizione' => 'Biscotti leggeri per chi vuole stare in forma', 
        'immagine' => 'https://i.pinimg.com/564x/3e/76/08/3e76080e2613dfb0f962c4ea5698fccc.jpg'
		),
	array(
		'titolo' => 'Occhi di bue', 
        'descrizione' => 'Biscotti semplici con nutella o marmellata', 
        'immagine' => 'https://www.giallozafferano.it/images/23-2313/Occhio-di-bue_650x433_wm.jpg'
		),
	array(
		'titolo' => 'Meringhe', 
        'descrizione' => "Solo zucchero, una tira l'altra", 
        'immagine' => 'https://dolciveloci.it/wp-content/uploads/2019/11/SH_meringhe_colorate.jpg'
		),
	array(
		'titolo' => 'Biscotti della monaca', 
        'descrizione' => 'Biscotti classici e tradizionali', 
        'immagine' => 'https://www.quotidianodiragusa.com/cache/2019/02/biscotti-monaca-ricetta-siciliana-410_900x600.jpg'
		)
	);
	
	$bevande=array(
	array(
		'titolo' => 'Coca Cola', 
        'descrizione' => 'La classica bevanda amata da tutti', 
        'immagine' => 'https://www.coca-colaitalia.it/content/dam/one/it/it/homepage/carousel/desktop/CocaCola-KeelClip-1600x900_new.jpg'
		),
	array(
		'titolo' => 'Monster', 
        'descrizione' => 'Bibita energetica in vari gusti', 
        'immagine' => 'https://perfectbody360.it/site/wp-content/uploads/2019/03/monster-energy.jpg'
		),
	array(
		'titolo' => 'Birra', 
        'descrizione' => 'Birra di varie marche', 
        'immagine' => 'https://dolciveloci.it/wp-content/uploads/2019/11/SH_meringhe_colorate.jpg'
		),
	array(
		'titolo' => 'Tè', 
        'descrizione' => 'Bibita rifrescante, pesca o limone', 
        'immagine' => 'https://media.area-gourmet.com/product/te-frio-melocoton-hibiscus-400ml-fuze-tea-800x800.jpeg'
		)
	);
	
	$ingredienti=array(
	array(
		'titolo' => 'Farina 00', 
        'descrizione' => 'Farina semplice', 
        'immagine' => 'https://www.greenme.it/wp-content/uploads/2013/05/farina-bianca.jpg'
		),
	array(
		'titolo' => 'Farina di Semola', 
        'descrizione' => 'Farina di semola per panini come schiacciatelle', 
        'immagine' => 'https://file.cure-naturali.it/site/image/content/23056.jpg?format=jpg'
		),
	array(
		'titolo' => 'Uova', 
        'descrizione' => 'Uova fresche', 
        'immagine' => 'https://static.ohga.it/wp-content/uploads/sites/24/2019/10/uova-proprieta%CC%80.jpg'
		),
	array(
		'titolo' => 'Lievito', 
        'descrizione' => 'Lievito per impasti', 
        'immagine' => 'https://www.cicalia.com/it/img/imgproducts/370/l_370.jpg'
		)
	);
	
    $Array = array($pane, $pizza, $biscotti, $bevande, $ingredienti);
	;
    echo json_encode($Array);
	exit;
?>