function conversion(taux)   // Conversion between two change
{
   var valeur = prompt("Entrez la valeur à convertir");
   var resultat = valeur * taux;
   alert('Valeur  : '+valeur + '\nRésultat : '+resultat);
}

function underline(champ, erreur)
{
   if(erreur) {
      	champ.style.backgroundColor = "#fba";
   }
   else {
      champ.style.backgroundColor = "";
   }
}

function checkLogin(champ)
{
	erreur = 0;
	if( 3<= champ.value.length && champ.value.length <25) {
		erreur = 0;
		surligne(champ,erreur);
		return true;
	}
	else { 
		erreur = 1;
		surligne(champ,erreur);
		return false;
	}
}

function checkPassword(champ)
{
	erreur = 0;
	var regex = /^[a-zA-Z0-9._-]+$/;
	if(regex.test(champ.value)) {
		erreur = 0;
		surligne(champ,erreur);
		return true;
	}
	else { 
		erreur = 1;
		surligne(champ,erreur);
		return false;
	}
}

function checkEmail(champ)
{
	erreur = 0;
	var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
	if(regex.test(champ.value)) {
		erreur = 0;
		surligne(champ,erreur);
		return true;
	}
	else { 
		erreur = 1;
		surligne(champ,erreur);
		return false;
	}
}

function checkAll()
{
	var pseudoOk= verifierPseudo(f.pseudo);
	var emailOk = verifierEmail(f.email);

	if(pseudoOk && emailOk) {
		return true;
	}
	else {
		alert("Veuillez remplir correctement les champs");
		return false;
	}

}

function readDate(champ)
{
	var date = new Date;
	var jours = new Array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
    var mois = new Array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");

    var messageDate = "Nous sommes le " + jours[date.getDay()] + " " + date.getDate() + " " + mois[date.getMonth()] + " et il est " + date.getHours() + "h " + date.getMinutes() + "min et " + date.getSeconds();
    champ.value = messageDate;
    return true;
}

function displayPics()
{
	//Get elements from page
	var photos = document.getElementById('galerie_mini') ;
	var liens = photos.getElementsByTagName('a') ;
	var big_photo = document.getElementById('big_pict') ;
	var titre_photo = document.getElementById('photo').getElementsByTagName('dt')[0] ;
	
	//Change big picture when mini pictures are cliecked.
	for (var i = 0 ; i < liens.length ; ++i) 
	{
	    liens[i].onclick = function() {
	    big_photo.src = this.href;
	    big_photo.alt = this.title;
	    titre_photo.firstChild.nodeValue = this.title;
	    return false;
	};
  }
}

//Call function on change page
window.onload = displayPics;