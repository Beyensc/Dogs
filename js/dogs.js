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
	var nomDogs = document.getElementById('nomDogs').value;
	var numPuceDogs = document.getElementById('numPuceDogs').value;
	var raceDogs = document.getElementById('raceDogs').value;

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
				nomDogs:nomDogs,
				numPuceDogs:numPuceDogs,
				raceDogs:raceDogs,
				
			},

			success:setTimeout(function(){
				window.location.href="?component=dogs&action=actif";
			


		},
		2000),
		//success:function(retour){alert(retour);},
	});
		}else{

			alert('Les champs requis ne sont pas remplis !')
	}
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
	//var nomDogs = document.getElementById('nomDogs'+id+'').value;
	//var numPuceDogs = document.getElementById('numPuceDogs'+id+'').value;
	//var raceDogs = document.getElementById('raceDogs'+id+'').value;
	

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
				//nomDogs:nomDogs,
				//numPuceDogs:numPuceDogs,
				//raceDogs:raceDogs,
				
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



