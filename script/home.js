

fetch("../php/contents.php").then(onResponse).then(onJson);

function onResponse(response){
	console.log(response);
	return response.json();
}

let array;

function onJson(json){
    //console.log(json);
    array=json;
    
}



function aggiungiContenuto(elemento, sezione){
    const container= document.createElement('div');
    const container2= document.createElement('div');
    container.classList.add('generale');
    container2.classList.add('container2')
    const immagine=document.createElement('img');
    immagine.src=elemento.immagine;
    const titolo=document.createElement('h2');
    titolo.textContent=elemento.titolo;
    const text=document.createElement('h4');
    text.textContent=('Mostra Dettagli');
    text.classList.add('mdescrizione');
    const descrizione=document.createElement('span');
    descrizione.textContent=elemento.descrizione;
    descrizione.classList.add('hidden');
    descrizione.classList.add('descrizione');
    immagine.classList.add('cibo');
    const bm=document.createElement('img');
    bm.src="../img/addbookmark.png";
    bm.classList.add('icon');
    container.appendChild(titolo);
    container2.appendChild(text);
    container.appendChild(immagine);
    container.appendChild(container2);
    container2.appendChild(bm);
    container.appendChild(descrizione);
    sezione.appendChild(container);
}

function mostraDescrizione(event){
    const oggetto= event.currentTarget.parentElement.parentElement;
    if(oggetto.querySelector('span').classList.contains('show')){
        oggetto.querySelector('span').classList.add('hidden');
        oggetto.querySelector('span').classList.remove('show');
    }
    else{
        oggetto.querySelector('span').classList.remove('hidden');
        oggetto.querySelector('span').classList.add('show');
    }
    
} 

function aggiungiPreferiti(event){
    const variabile=event.currentTarget.parentElement.parentElement;
    if(!variabile.classList.contains('bm')){
    	const sezione=document.querySelector('.preferiti');
        const container= document.createElement('div');
        const container2= document.createElement('div');
        container.classList.add('divpref');
        container2.classList.add('container2');
        const immagine=document.createElement('img');
        immagine.src=variabile.querySelector('img').src;
        const titolo=document.createElement('h2');
        titolo.textContent=variabile.querySelector('h2').textContent;
        const text=document.createElement('h4');
        text.textContent=('Mostra Dettagli');
        text.classList.add('mdescrizione');
        const descrizione=document.createElement('span');
        descrizione.textContent=variabile.querySelector('span').textContent;
        descrizione.classList.add('hidden');
        descrizione.classList.add('descrizione');
        immagine.classList.add('cibo');
        const bm=document.createElement('img');
        bm.src="../img/removebookmark.png";
        bm.classList.add('iconp');
        container.appendChild(titolo);
        container2.appendChild(text);
        container.appendChild(immagine);
        container.appendChild(container2);
        container2.appendChild(bm);
        container.appendChild(descrizione);
        sezione.appendChild(container);
        sezione.classList.remove('hidden');
        variabile.classList.add('bm');
        text.addEventListener('click', mostraDescrizione);
        
        bm.addEventListener('click', rimuoviPreferiti);
        
    }

}

function rimuoviPreferiti(event){
    const sezione=document.querySelector('.preferiti');
    const elemento=event.currentTarget.parentElement.parentElement;
    const preferiti=document.querySelectorAll('.preferiti .divpref');
    const bookmark=document.querySelectorAll('.bm');
    for(let elementi of bookmark){
        if(elementi.firstChild.textContent===elemento.firstChild.textContent){
            elementi.classList.remove('bm');   
        }
    }
    //ha lo stesso effetto anche se metto hidden invece di eliminare
    elemento.remove();
    if(!sezione.hasChildNodes()){
        sezione.classList.add('hidden');
    }
    
}

function caricaContenuto(event){
    
    let oggetto=null;
    let giacliccato=0;
    if(document.querySelector('div.corrente').classList.contains('hidden')){
        giacliccato=1;
    } else{
        giacliccato=0;
    }
    document.querySelector('div.corrente').classList.remove('hidden');
    document.querySelector('.search').classList.remove('hidden');
    if(event.currentTarget===ultimoelemento && giacliccato===0){
        document.querySelector('div.corrente').classList.add('hidden');
        document.querySelector('.search').classList.add('hidden');
    }

    if(event.currentTarget===document.querySelector('#Pane')){
        oggetto=array[0];

    }
    else if(event.currentTarget===document.querySelector('#Pizza')){
        oggetto=array[1];
        
    }
    else if(event.currentTarget===document.querySelector('#Biscotti')){
        oggetto=array[2];
        
    }
    else if(event.currentTarget===document.querySelector('#Bevande')){
        oggetto=array[3];
    }
    else if(event.currentTarget===document.querySelector('#Ingredienti')){
        oggetto=array[4];
        
    }
    ultimasezione=oggetto;

    while(document.querySelector('div.corrente').firstChild){
            document.querySelector('div.corrente').removeChild(document.querySelector('div.corrente').firstChild);
    }
    ultimoelemento=event.currentTarget;
    
    for(let elemento of oggetto){
        aggiungiContenuto(elemento, document.querySelector('div.corrente'));
        console.log(elemento);
    }


    const mostra= document.querySelectorAll('.mdescrizione');
        for(let button of mostra){
    button.addEventListener('click', mostraDescrizione);
    }

    const preferiti= document.querySelectorAll('.icon');
        for(let button of preferiti){
    button.addEventListener('click', aggiungiPreferiti);
    }


}


function avviaricerca(){
    
    const oggetti=document.querySelectorAll('.corrente div.generale');
    const sezione=document.querySelector('corrente');

    arrayricerca.splice(0,arrayricerca.length);
    while(document.querySelector('div.corrente').firstChild){
        document.querySelector('div.corrente').removeChild(document.querySelector('div.corrente').firstChild);
    }
    if(ricerca.value!==""){
        for(let oggetto of array[0]){
            
            if(oggetto.titolo.toLocaleLowerCase().indexOf(ricerca.value.toLocaleLowerCase())!==-1){
                arrayricerca.push(oggetto);
            }
            
        }
        for(let oggetto of array[1]){
            if(oggetto.titolo.toLocaleLowerCase().indexOf(ricerca.value.toLocaleLowerCase())!==-1){
                arrayricerca.push(oggetto);
            }
            
        }
        for(let oggetto of array[2]){
            if(oggetto.titolo.toLocaleLowerCase().indexOf(ricerca.value.toLocaleLowerCase())!==-1){
                arrayricerca.push(oggetto);
            }
            
        }
        for(let oggetto of array[3]){
            if(oggetto.titolo.toLocaleLowerCase().indexOf(ricerca.value.toLocaleLowerCase())!==-1){
                arrayricerca.push(oggetto);
            }
            
        }
        for(let oggetto of array[4]){
            if(oggetto.titolo.toLocaleLowerCase().indexOf(ricerca.value.toLocaleLowerCase())!==-1){
                arrayricerca.push(oggetto);
            }     
        }
        
        if(ricerca.length!==0){
            for(let div of arrayricerca){
                aggiungiContenuto(div,document.querySelector('div.corrente') );

            }
            
        }  
        const mostra= document.querySelectorAll('.mdescrizione');
        for(let button of mostra){
            button.addEventListener('click', mostraDescrizione);
        }

        const preferiti= document.querySelectorAll('.icon');
        for(let button of preferiti){
            button.addEventListener('click', aggiungiPreferiti);
        } 
    }
    else{
        
        while(document.querySelector('div.corrente').firstChild){
            document.querySelector('div.corrente').removeChild(document.querySelector('div.corrente').firstChild);
        }
    
        for(let elemento of ultimasezione){
            aggiungiContenuto(elemento, document.querySelector('div.corrente'));
        }

        const mostra= document.querySelectorAll('.mdescrizione');
        for(let button of mostra){
            button.addEventListener('click', mostraDescrizione);
        }

        const preferiti= document.querySelectorAll('.icon');
        for(let button of preferiti){
            button.addEventListener('click', aggiungiPreferiti);
        }
    }
    

}

function initMap() {
    const myLatLng = { lat: 37.51484330337947, lng: 15.087038187240512};
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 19,
      center: myLatLng,
    });
    new google.maps.Marker({
      position: myLatLng,
      map,
    });
  }

const foodApi="https://foodish-api.herokuapp.com/";
const drinkApi="https://www.thecocktaildb.com/api/json/v1/1/random.php";

function onResponse(response){
    return response.json();
}

function changeFood(json){
    console.log("cambio cibo");
    oggetto.src=json.image;
}
function changeDrink(json){
    console.log("cambio bevanda");
    oggetto.src=json.drinks["0"].strDrinkThumb;
}

function cambiaImg(event){
    oggetto=event.currentTarget;
    if(oggetto.id=="pane"){
        fetch(foodApi + "api/images/burger/").then(onResponse).then(changeFood);  
    }
    else if(oggetto.id=="pizza"){
        fetch(foodApi + "api/images/pizza/").then(onResponse).then(changeFood);
    }
    else if(oggetto.id=="biscotti"){
        fetch(foodApi + "api/images/dessert/").then(onResponse).then(changeFood);
    }
    else if(oggetto.id=="tavolacalda"){
        fetch(foodApi + "api/images/samosa/").then(onResponse).then(changeFood);
    }
    
}

function cambiaImgCocktail(event){
    oggetto=event.currentTarget;
    fetch(drinkApi).then(onResponse).then(changeDrink);
}

function inserisciStelle(){
	sezione=document.querySelector('#stelle');
	const media=sezione.textContent;
	const immagine=document.createElement('img');
	console.log(media);
	if(media<1.5){
		immagine.src="../img/1Stella.png";
	}
	else if(media>=1.5 && media<2.5){
		immagine.src="../img/2Stelle.png";
	}
	else if(media>=2.5 && media<3.5){
		immagine.src="../img/3Stelle.png";
	}
	else if(media>=3.5 && media<4.5){
		immagine.src="../img/4Stelle.png";
	}
	else if(media>=4.5 && media<=5){
		immagine.src="../img/5Stelle.png";
	}
	
	
	sezione.appendChild(immagine);
	
}

window.onload = function() {
   inserisciStelle();
}

let oggetto;
let ultimasezione=null;
const arrayricerca=[];
let map;
let ultimoelemento=null;
const bPane=document.querySelector('#Pane');
const bPizza=document.querySelector('#Pizza');
const bBiscotti=document.querySelector('#Biscotti');
const bBevande=document.querySelector('#Bevande');
const bIngredienti=document.querySelector('#Ingredienti');
const ricerca=document.querySelector('.search input');
const img1=document.querySelector('.photogallery #pane');
const img2=document.querySelector('.photogallery #pizza');
const img3=document.querySelector('.photogallery #biscotti');
const img4=document.querySelector('.photogallery #bevande');
const img5=document.querySelector('.photogallery #tavolacalda');





bPane.addEventListener('click', caricaContenuto);
bPizza.addEventListener('click', caricaContenuto);
bBiscotti.addEventListener('click', caricaContenuto);
bBevande.addEventListener('click', caricaContenuto);
bIngredienti.addEventListener('click', caricaContenuto);
ricerca.addEventListener('keyup', avviaricerca);
img1.addEventListener('click', cambiaImg);
img2.addEventListener('click', cambiaImg);
img3.addEventListener('click', cambiaImg);
img4.addEventListener('click', cambiaImgCocktail);
img5.addEventListener('click', cambiaImg);
