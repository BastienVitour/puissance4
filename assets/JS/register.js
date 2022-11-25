function Check()
{
    // variable getelement
    var password = document.getElementById("mdp1").value;
    var faible =document.getElementById("faible");
    var moyen= document.getElementById("moyen");
    var elevee= document.getElementById("elevee");
    var fme= document.getElementById("fme");
    //variable pour les conditions
	var passwordlow = password.toLowerCase();
	var majuscule = false;
    var taille = password.length;
    var numerique = false;
	var special = false;
    var realtaille=false;
	
	//On vérifie si il y a des majuscules
	if(password != passwordlow)
	{
		majuscule = true;
	}
    
    // On vérifie qu'il y a des chiffres
	for(i=0;i<taille-1;i++)
	{
		caractere = password.substring(i,i+1);
		if(!isNaN(caractere))
		{
			numerique = true;
		}
	}

	//on verifie qu'il y a des caracteres speciaux
	for(i=0;i<taille-1;i++)
	{
		caractere = password.substring(i-1,i+1);
		if(password.match(/[&#@=€$%*?\/:!\+_(){}ù£éè§çà^-]/gm))
		{
			special = true;
		}
	}
    //on verifie que la taille est de 8
    if (taille>=8) {
        realtaille=true;
    }
    
    console.log(special)

//conditions pour les changements d'etats de la barre et des couleurs
	if((majuscule==false && numerique==false && special==false && realtaille==false))
	{
		//couleur de la barre
		faible.style.backgroundColor = '#830e0e';
        moyen.style.backgroundColor = '#23235f';
		elevee.style.backgroundColor= '#23235f';
		//couleur du text
		fme.style.color = '#830e0e';
		//changement du text
        fme.innerHTML = "week";

		
	}
	
	else
	{
		if(majuscule==true && numerique==true && special==false && realtaille==true)
		{
		//couleur de la barre
			faible.style.backgroundColor = '#d48a21';
			moyen.style.backgroundColor = '#d48a21';
            elevee.style.backgroundColor= '#23235f';
		//couleur du text
		    fme.style.color = '#d48a21';
		//changement du text
            fme.innerHTML = "medium";

			
		}
		else if(majuscule==true && numerique==true && special==true && realtaille==true)
		{
		//couleur de la barre
			faible.style.backgroundColor = '#256f2a';
			moyen.style.backgroundColor = '#256f2a';
			elevee.style.backgroundColor = '#256f2a';
		//couleur du text
		    fme.style.color = '#256f2a';
		//changement du text
            fme.innerHTML = "strong";
            
	    }
    }
}




