function addNewDogs(){

	var nomMaster = document.getElementById('nomMaster').value;
	var prenomMaster = document.getElementById('prenomMaster').value;
	var rueMaster = document.getElementById('rueMaster').value;
	var numMaster = document.getElementById('numMaster').value;
	var cpMaster = document.getElementById('cpMaster').value;
	var villeMaster = document.getElementById('villeMaster').value;
	var paysMaster = document.getElementById('paysMaster').value;
	var mailMaster = document.getElementById('mailMaster').value;
	var telMaster = document.getElementById('telMaster').value;
	var gsmMaster = document.getElementById('gsmMaster').value;
	var dateNaissance = document.getElementById('dateNaissance').value;
	var lieuNaissance = document.getElementById('lieuNaissance').value;
	var periodeContact= document.getElementById('periodeContact').value;
	var autreDispo = document.getElementById('autreDispo').value;
	var nomContact = document.getElementById('nomContact').value;
	var prenomContact = document.getElementById('prenomContact').value;
	var telContact = document.getElementById('telContact').value;

	


	if((nomMaster != '')){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/addNewDogs.php",
			data:{
				nomMaster:nomMaster,
				prenomMaster:prenomMaster,
				rueMaster:rueMaster,
				numMaster:numMaster,
				cpMaster:cpMaster,
				villeMaster:villeMaster,
				paysMaster:paysMaster,
				mailMaster:mailMaster,
				telMaster:telMaster,
				gsmMaster:gsmMaster,
				dateNaissance:dateNaissance,
				lieuNaissance:lieuNaissance,
				periodeContact:periodeContact,
				autreDispo:autreDispo,
				nomContact:nomContact,
			    prenomContact:prenomContact,
			    telContact:telContact,
			
				
			},
			//success:function(retour){alert(retour);},
			success:setTimeout(function(){
			window.location.href="?component=dogs&action=actif";
			


		},
		1000),
		//success:function(retour){alert(retour);},
	});
		}else{

			alert('Les champs requis ne sont pas remplis !')
	}
}

function ajoutDogs(idp){

		var nomDogs = document.getElementById('nomDogs'+idp+'').value;
		var numPuceDogs = document.getElementById('numPuceDogs'+idp+'').value;
		var raceDogs = document.getElementById('raceDogs'+idp+'').value;
		var dateNaissance = document.getElementById('dateNaissance'+idp+'').value;
		var puceDogs = document.getElementById('puceDogs'+idp+'').value;
		var tatooDogs = document.getElementById('tatooDogs'+idp+'').value;
		var sexe_dogs = document.getElementById('sexe_dogs'+idp+'').value;
		var detention = document.getElementById('detention'+idp+'').value;
		var club = document.getElementById('club'+idp+'').value;
		var clubAdresse = document.getElementById('clubAdresse'+idp+'').value;
		var mordant = document.getElementById('mordant'+idp+'').value;
		var veto = document.getElementById('veto'+idp+'').value;
		var vetoTel = document.getElementById('vetoTel'+idp+'').value;



				

				if((nomDogs != '')){

				$.ajax({
					type:"GET",
					url:"js/php/dogs/NewDogs.php",
					data:{
						idp:idp,
						nomDogs:nomDogs,
						numPuceDogs:numPuceDogs,
						raceDogs:raceDogs,
						dateNaissance:dateNaissance,
						puceDogs:puceDogs,
						tatooDogs:tatooDogs,
						sexe_dogs:sexe_dogs,
						detention:detention,
						club:club,
						clubAdresse:clubAdresse,
						mordant:mordant,
						veto:veto,
						vetoTel:vetoTel,

					},

					success:setTimeout(function(){
						window.location.href="?component=dogs&action=actif";
					


				},

				1000),
				//success:function(retour){alert(retour);},
			});
				}else{

					alert('Les champs requis ne sont pas remplis !')
			}
}
function desactDogs(id,nom){

	

	$.ajax({
			type:"GET",
			url:"js/php/dogs/desactDogs.php",
			data:{
				id:id,
				nom:nom,
				

			},
				success:setTimeout(function(){
						window.location.href="?component=dogs&action=actif";
					


				},

				1000),
				
		
			

		});

}

function addverif(id){
	var verif = document.getElementById('verification'+id+'').checked;
	if(verif){
		alert('TRUE');
	}else{
		alert('FALSE');
	}}


function desactProprio(id,nom){

	var ok = confirm('Voulez-vous desactiver '+nom+' ?');
	if(ok){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/desactProprio.php",
			data:{
				id:id,
				nom:nom,
				

			},
			//success:function(retour){alert(retour);

			// },
			success:setTimeout(function(){
				window.location.href="?component=dogs&action=actif";
				
				
			},
			2000),

		});

	}
	else{
		window.location.href="?component=dogs&action=actif";
	}
}

function activProprio(id,nom){

	var ok = confirm('Voulez-vous activer '+nom+' ?');
	if(ok){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/activProprio.php",
			data:{
				id:id,
				nom:nom,
				

			},
			//success:function(retour){alert(retour);

			// },
			success:setTimeout(function(){
				window.location.href="?component=dogs&action=actif";
				
				
			},
			2000),

		});

	}
	else{
		window.location.href="?component=dogs&action=inactif";
	}
}

function addNewDogsList(){

	var listDogs=document.getElementById('listDogs').value;

	if(listDogs){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/addNewDogsList.php",
			data:{listDogs:listDogs,

           

           },
           success:setTimeout(function(){
				window.location.href="?component=dogs&action=majListDogs";
				
				
			},
			2000),



		});




	}else{
		window.location.href="?component=dogs&action=majListDogs";
	}
}

function modifFild(id,nom){
	var ok = confirm('Voulez-vous modifier M. '+nom+' ?');


	var nomMaster = document.getElementById('nomMaster'+id+'').value;
	var prenomMaster = document.getElementById('prenomMaster'+id+'').value;
	var rueMaster = document.getElementById('rueMaster'+id+'').value;
	var numMaster = document.getElementById('numMaster'+id+'').value;
	var cpMaster = document.getElementById('cpMaster'+id+'').value;
	var villeMaster = document.getElementById('villeMaster'+id+'').value;
	var paysMaster = document.getElementById('paysMaster'+id+'').value;
	var mailMaster = document.getElementById('mailMaster'+id+'').value;
	var telMaster = document.getElementById('telMaster'+id+'').value;
	var gsmMaster = document.getElementById('gsmMaster'+id+'').value;
	var dateNaissance = document.getElementById('dateNaissance'+id+'').value;
	var lieuNaissance = document.getElementById('lieuNaissance'+id+'').value;
	var periodeContact= document.getElementById('periodeContact'+id+'').value;
	var autreDispo = document.getElementById('autreDispo'+id+'').value;
	var nomContact = document.getElementById('nomContact'+id+'').value;
	var prenomContact = document.getElementById('prenomContact'+id+'').value;
	var telContact = document.getElementById('telContact'+id+'').value;

	
	

	if(ok){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/modifFildDogs.php",
			data:{
				id:id,
				nomMaster:nomMaster,
				prenomMaster:prenomMaster,
				rueMaster:rueMaster,
				numMaster:numMaster,
				cpMaster:cpMaster,
				villeMaster:villeMaster,
				paysMaster:paysMaster,
				mailMaster:mailMaster,
				telMaster:telMaster,
				gsmMaster:gsmMaster,
				dateNaissance:dateNaissance,
				lieuNaissance:lieuNaissance,
				periodeContact:periodeContact,
				autreDispo:autreDispo,
				nomContact:nomContact,
			    prenomContact:prenomContact,
			    telContact:telContact,
				
			},
			success:setTimeout(function(){
				window.location.href="?component=dogs&action=actif";


		},
		2000),
		//success:function(retour){alert(retour);},
	});
		}else{

			
				window.location.href="?component=dogs&action=actif";
	}
}

function deleteProprio(id,nom){

	var ok = confirm('Voulez-vous Supprimer  '+nom+' ?');
	if(ok){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/deleteProprio.php",
			data:{
				id:id,
				nom:nom,
				

			},
			//success:function(retour){alert(retour);

			// },
			success:setTimeout(function(){
				window.location.href="?component=dogs&action=inactif";
				
				
			},
			2000),

		});

	}
	else{
		window.location.href="?component=dogs&action=actif";
	}
}

function dogsProprioform(id){




	if(document.getElementById('listDogs'+id).style.display=="block")

    {
       
        document.getElementById('listDogs'+id).style.display="none";
    }
    else
    {
        
       document.getElementById('listDogs'+id).style.display="block";
    
    return true;
    }	
}

function dogsProprio(id){

	 $.ajax({
				type:"GET",
				url:"js/php/dogs/dogsProprio.php",
				data:{
					id:id,
				},
				success:function(retour){document.getElementById('listDogs'+id).innerHTML=retour;},
				//success:function(retour){alert(retour);},
			});	
}

function details(id){

	
	

	if(document.getElementById('details'+id).style.display=="block")

    {
       
        document.getElementById('details'+id).style.display="none";
    }
    else
    {
        
       document.getElementById('details'+id).style.display="block";


			

    }
    return true;
}

function ajoutDogsForm(id){

	if(document.getElementById('ajoutDogsForm'+id).style.display=="block")
    {
       
        document.getElementById('ajoutDogsForm'+id).style.display="none";
    }
    else
    {
        
       document.getElementById('ajoutDogsForm'+id).style.display="block";


    }
    return true;
}

function deleteRace(id,nom){

		var ok = confirm('Voulez-vous Supprimer  '+nom+' ?');

		if(ok){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/deleteRace.php",
			data:{
				id:id,
				nom:nom,
				

			},
			//success:function(retour){alert(retour);

			// },
			success:setTimeout(function(){
				window.location.href="?component=dogs&action=majListDogs";
				
				
			},
			2000),

		});

		}
		else{
			window.location.href="?component=dogs&action=majListDogs";
		}
}

function deleteVerification(id,nom){
	
	var ok = confirm('Voulez-vous Supprimer  '+nom+' ?');

		if(ok){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/deleteVerification.php",
			data:{
				id:id,
				nom:nom,
				

			},
			//success:function(retour){alert(retour);

			// },
			success:setTimeout(function(){
				window.location.href="?component=dogs&action=majListVerification";
				
				
			},
			2000),

		});

		}
		else{
			window.location.href="?component=dogs&action=majListVerification";
		}

}
function addNewListVerification(){
	var listVerification=document.getElementById('listVerification').value;

	if(listVerification){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/addNewListVerification.php",
			data:{
				listVerification:listVerification,

           

           },
           success:setTimeout(function(){
				window.location.href="?component=dogs&action=majListVerification";
				
				
			},
			2000),



		});




	}else{
		window.location.href="?component=dogs&action=majListVerification";
	}
}

/*function connexion(){

	var login = document.getElementById('login').value;
	var mdp = document.getElementById('mdp').value;

	if((login !='')&&(mdp !='')){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/connexion.php",
			data:{
				login:login,
				mdp:mdp,

           

           },
           success:setTimeout(function(){
				window.location.href="?component=dogs&action=actif";
				
				
			},
			2000),



		});




	}else{
		window.location.href="?component=dogs&action=connexion";
	}






		});
	}
}*/



