function Check()
{
    var password = document.getElementById("mdp1").value;
    
    
	var passwordlow = password.toLowerCase();

	var majuscule = false;

    const introPara = document.getElementById("fme");
    let contenu = introPara.innerHTML; 
	
	//On vérifie si il y a des majuscules
	if(password != passwordlow)
	{
		majuscule = true;
	}
	
	var taille = password.length;
	var numerique = false;
	var special = false;

	// On vérifie qu'il y a des chiffres
	for(i=0;i<taille-1;i++)
	{
		caractere = password.substring(i-1,i+1);
		if(password.match(/@/))
		{
			special = true;
		}
	}
    for(i=0;i<taille-1;i++)
	{
		caractere = password.substring(i,i+1);
		if(!isNaN(caractere))
		{
			numerique = true;
		}
	}
    console.log(special)

	if((majuscule==false && numerique==false))
	{
		if(document.getElementById)
		{
		document.getElementById("faible").style.backgroundColor = 'red';
        document.getElementById("moyen").style.backgroundColor = 'gray';
		document.getElementById("elevee").style.backgroundColor= 'gray';
		document.getElementById("fme").style.color = 'red';
		document.getElementById("pbarre").style.color = 'red';


        introPara.innerHTML = "faible";

		
		}
	}
	else
	{
		if((majuscule || numerique) && taille<=8)
		{
			document.getElementById("faible").style.backgroundColor = 'orange';
			document.getElementById("moyen").style.backgroundColor = 'orange';
            document.getElementById("elevee").style.backgroundColor= 'gray';
		    document.getElementById("fme").style.color = 'orange';

            introPara.innerHTML = "moyen";

			
		}
		else if(majuscule && numerique && taille>8)
		{
			document.getElementById("faible").style.backgroundColor = 'green';
			document.getElementById("moyen").style.backgroundColor = 'green';
			document.getElementById("elevee").style.backgroundColor = 'green';
		    document.getElementById("fme").style.color = 'green';

            introPara.innerHTML = "elevee";
            
		}else if(password.length=1){
        document.getElementById("faible").style.backgroundColor = 'gray';
        document.getElementById("moyen").style.backgroundColor = 'gray';
		document.getElementById("elevee").style.backgroundColor= 'gray';
        }
	}
}




