

////////////////////////////////////////////DatePicker////////////////////////////////////////////////////////


$(document).ready(function () {
    
    
    $('#recherche').click(function () {
        $('#recherche').val($(this).html());
    });
 
    //la recherche ok , mais pour afficher le détails il faut mettre un espace dans le barre de rcherche puis enter pour afficher le détails
    $('#recherche').change(function () {
        var result= $.trim($(this).val());
        if (!result) {
            $('tr').show();
        } else {
            $('tr').show().not(':contains(' + result  + ')').hide();
        }
    });
});

 $(function() {
	$( "#datepicker","#datepickerNaissance" ).datepicker({
	altField: "#datepicker",
	closeText: 'Fermer',
	prevText: 'Précédent',
	nextText: 'Suivant',
	currentText: 'Aujourd\'hui',
	monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
	monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
	dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
	dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
	dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
	weekHeader: 'Sem.',
	dateFormat: 'dd-mm-yy'
	});
	});


///////////////////////////////////Récupération des données///////////////////////////////////////////////


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
	var dateNaissance = document.getElementById('datepickerNaissance').value;
	var lieuNaissance = document.getElementById('lieuNaissance').value;
	var periodeContact= document.getElementById('periodeContact').value;
	var autreDispo = document.getElementById('autreDispo').value;
	var nomContact = document.getElementById('nomContact').value;
	var prenomContact = document.getElementById('prenomContact').value;
	var telContact = document.getElementById('telContact').value;
	var date = document.getElementById('datepicker').value;
	

	


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
			    date:date,
			
				
			},
			//success:function(retour){alert(retour);},
			//success:setTimeout(function(){
			//window.location.href="?component=admin&action=actif";
			success:function(data){
                 alert('L\'ajout a bien été effectuée');
                //console.log(data);
                 window.location.assign("?component=admin&action=actif");
              }


			


		//},
		//1000),
		//success:function(retour){alert(retour);},
	});
		}else{

			alert('Les champs requis ne sont pas remplis !')
	}
}

function ajoutDogs(id){



		var nomDogs = document.getElementById('nomDogs'+id+'').value;
		var numPuceDogs = document.getElementById('numPuceDogs'+id+'').value;
		var raceDogs = document.getElementById('raceDogs'+id+'').value;
		var dateNaissance = document.getElementById('dateNaissance'+id+'').value;
		var puceDogs = document.getElementById('puceDogs'+id+'').value;
		var tatooDogs = document.getElementById('tatooDogs'+id+'').value;
		var sexe_dogs = document.getElementById('sexe_dogs'+id+'').value;
		var detention = document.getElementById('detention'+id+'').value;
		var club = document.getElementById('club'+id+'').value;
		var clubAdresse = document.getElementById('clubAdresse'+id+'').value;
		var mordant = document.getElementById('mordant'+id+'').value;
		var veto = document.getElementById('veto'+id+'').value;
		var vetoTel = document.getElementById('vetoTel'+id+'').value;
		var remarques= document.getElementById('remarques'+id+'').value;
		
		


				

				if((nomDogs != '')){

				$.ajax({
					type:"GET",
					url:"js/php/dogs/NewDogs.php",
					data:{
						id:id,
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
						remarques:remarques,

					},

					//success:setTimeout(function(){
						//window.location.href="?component=admin&action=actif";
					

						success:function(data){
                 			alert('L\'ajout du chien a bien été effectuée');
                		//console.log(data);
                 			window.location.assign("?component=admin&action=actif");
              }
				//},

				//1000),
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
				success:function(data){
						alert('Le chien chien a bien été supprimer');
						window.location.assign("?component=admin&action=actif");
					


				}
				
		
			

		});
}

function desactProprio(id,nom){

	var ok = confirm('Voulez-vous supprimer '+nom+' ?');
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
				window.location.href="?component=admin&action=actif";
				
				
			},
			1000),

		});

	}
	else{
		window.location.href="?component=admin&action=actif";
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
				window.location.href="?component=admin&action=actif";
				
				
			},
			1000),

		});

	}
	else{
		window.location.href="?component=admin&action=inactif";
	}
}

function addNewDogsList(){

	var listDogs=document.getElementById('listDogs').value;

	if(listDogs){

		$.ajax({
			type:"GET",
			url:"js/php/dogs/addNewDogsList.php",
			data:{
				listDogs:listDogs,

           

           },
           success:setTimeout(function(){
				window.location.href="?component=admin&action=majListDogs";
				
				
			},
			2000),



		});




	}else{
		window.location.href="?component=admin&action=majListDogs";
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
				
				lieuNaissance:lieuNaissance,
				periodeContact:periodeContact,
				autreDispo:autreDispo,
				nomContact:nomContact,
			    prenomContact:prenomContact,
			    telContact:telContact,
			    
				
			},
			success:setTimeout(function(){
				window.location.href="?component=admin&action=actif";


		},
		1000),
		//success:function(retour){alert(retour);},
	});
		}else{

			
				window.location.href="?component=admin&action=actif";
	}
}

function modifDogs(id){

		var nomDogs = document.getElementById('nomDogs'+id+'').value;
		var numPuceDogs = document.getElementById('numPuceDogs'+id+'').value;
		var raceDogs = document.getElementById('raceDogs'+id+'').value;
		var dateNaissance = document.getElementById('dateNaissance'+id+'').value;
		var puceDogs = document.getElementById('puceDogs'+id+'').value;
		var tatooDogs = document.getElementById('tatooDogs'+id+'').value;
		var sexe_dogs = document.getElementById('sexe_dogs'+id+'').value;
		var detention = document.getElementById('detention'+id+'').value;
		var club = document.getElementById('club'+id+'').value;
		var clubAdresse = document.getElementById('clubAdresse'+id+'').value;
		var mordant = document.getElementById('mordant'+id+'').value;
		var veto = document.getElementById('veto'+id+'').value;
		var vetoTel = document.getElementById('vetoTel'+id+'').value;
		var remarques = document.getElementById('remarques'+id+'').value;
	




				

				if((nomDogs != '')){

				$.ajax({
					type:"GET",
					url:"js/php/dogs/modifDogs.php",
					data:{
						id:id,
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
						remarques:remarques,

					},

					success:setTimeout(function(){
						window.location.href="?component=admin&action=actif";
					


				},

				1000),
				//success:function(retour){alert(retour);},
			});
				}else{

					alert('Les champs requis ne sont pas remplis !')
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
			//success:function(retour){alert(retour);},
			success:setTimeout(function(){
				window.location.href="?component=admin&action=inactif";
				
				
			},
			1000),

		});

	}
	else{
		window.location.href="?component=admin&action=actif";
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

//dipsarition/apparition du tableau récapitulatif des maîtres pareille pour le détails
function details(id){

	
	

	if(document.getElementById('details'+id).style.display=="block")

    {
       
        document.getElementById('details'+id).style.display="none";
        document.getElementById('listDogs'+id).style.display="none";
        document.getElementById('ajoutDogsForm'+id).style.display="none";

    }

    else
    {
        
       document.getElementById('details'+id).style.display="block";
       document.getElementById('listpro').style.display="none";



			

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
       document.getElementById('listpro').style.display="none";
   


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
				window.location.href="?component=admin&action=majListDogs";
				
				
			},
			1000),

		});

		}
		else{
			window.location.href="?component=admin&action=majListDogs";
		}
}

function nouvelUtilisateur(){

	alert("test")
}

////////////////////////////formulaire d'enregistrement/////////////////////////////////////

$(function() {
  $('input').floatlabel({labelEndTop:0});
});


////////////////////////////Connexion///////////////////////////////////////////////////////

$( ".input" ).focusin(function() {
  $( this ).find( "span" ).animate({"opacity":"0"}, 200);
});

$( ".input" ).focusout(function() {
  $( this ).find( "span" ).animate({"opacity":"1"}, 300);
});

$(".login").submit(function(){
  $(this).find(".submit i").removeAttr('class').addClass("fa fa-check").css({"color":"#fff"});
  $(".submit").css({"background":"#2ecc71", "border-color":"#2ecc71"});
  $(".feedback").show().animate({"opacity":"1", "bottom":"-80px"}, 400);
  $("input").css({"border-color":"#2ecc71"});
  return false;
});

////////////////////////////////////RegExp///////////////////////////////////////////////////

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

function valideMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function valideNomPrenom(champ)
{
   var regex = /^[A-Z]+[ \-']?[[a-z]+[ \-']?]*[a-z]+$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;

   }
}

function date(champ)
{
   var regex = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function phone(champ)
{
   var regex = /^[0-9]{3}[\/]?[0-9]{6}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}


function cp(champ)
{
   var regex = /^[0-9]{4,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function numeroRue(champ)
{
   var regex = /^[0-9]{1,}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}








