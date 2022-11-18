<html>
<head>
<title> securité </title>
<script language="javascript" type="text/javascript">
function Check()
{
    
	password = document.forms[0].pass.value;
	passwordlow = password.toLowerCase();
	majuscule = false;
	
	//On vérifie si il y a des majuscules
	if(password != passwordlow)
	{
		majuscule = true;
	}
	
	taille = password.length;
	numerique = false;
	// On vérifie qu'il y a des chiffres
	for(i=0;i<taille-1;i++)
	{
		caractere = password.substring(i,i+1);
		if(!isNaN(caractere))
		{
			numerique = true;
		}
	}
	
	if((majuscule==false && numerique==false))
	{
		if(document.getElementById)
		{
		document.getElementById("faible").style.backgroundColor = 'green';
		document.getElementById("moyen").style.backgroundColor = 'white';
		document.getElementById("elevee").style.backgroundColor = 'white';
		}
	}
	else
	{
		if((majuscule || numerique) && taille<=8)
		{
			document.getElementById("faible").style.backgroundColor = 'green';
			document.getElementById("moyen").style.backgroundColor = 'green';
			document.getElementById("elevee").style.backgroundColor = 'white';
		}
		else if(majuscule && numerique && taille>8)
		{
			document.getElementById("faible").style.backgroundColor = 'green';
			document.getElementById("moyen").style.backgroundColor = 'green';
			document.getElementById("elevee").style.backgroundColor = 'green';
		}
	}
}
</script>
</head>
<body>
<form>

<input type="password" name="pass" OnKeyDown="Check();"><br><br>

<table border="" width="300">
<tr>
<td id="faible" align="center" style="background-color :white;">Faible</td>
<td id="moyen" align="center" style="background-color :white;">Moyen</td>
<td id="elevee" align="center" style="background-color :white;">Elevee</td>
</tr>
</table>

</form>
</body>
</html>