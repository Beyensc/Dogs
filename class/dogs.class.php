<?php
class Dogs{
	private $pdo;

public function __construct($dbPdo){
	
	$this->pdo=$dbPdo;
}
	public function getListDogs(){

		$sql=('SELECT id_race,race FROM race WHERE actif="O"');
		return $this->pdo->query($sql)->fetchAll();
	}

	public function getListVerification(){
		$sql=('SELECT * FROM verification');
		return $this->pdo->query($sql)->fetchAll();
	}

	public function dogs(){
		$sql=('SELECT a.id_chien,a.nom,a.num_puce,a.id_race,b.race,a.id_proprietaire,c.id_proprietaire 
			FROM chien a
			LEFT JOIN race b ON b.id_race = a.id_race
			LEFT JOIN proprietaire c ON c.id_proprietaire = a.id_proprietaire');
			return $this->pdo->query($sql)->fetchAll();
	}

	public function dogsProprio($id){

		$sql=('SELECT a.id_chien,a.nom,a.num_puce,a.date_naissance,a.puce_dogs,a.tatoo_dogs,a.sexe,a.detention,a.club,a.club_adresse,a.mordant,a.veto,a.vetotel,a.remarques,a.id_race,b.race,a.id_proprietaire
			FROM chien a
			LEFT JOIN race b ON b.id_race = a.id_race
			WHERE a.id_proprietaire='.$id.'');                     //prob ici!!!!!
		//$sql=('SELECT * FROM chien WHERE actif="O"');          
		return $this->pdo->query($sql)->fetchAll();
		

	}
	public function desactDogs($id){

		$req=$this->pdo->exec('UPDATE chien SET actif="N" WHERE id_chien="'.$id.'"');
	}

	public function getListNameDogs(){
		$sql=('SELECT * FROM chien');
		return $this->pdo->query($sql)->fetchAll();
	}

	public function getListPro(){
		$sql=('SELECT * 
				FROM proprietaire
				WHERE actif="O" ORDER BY  nom DESC');
		return $this->pdo->query($sql)->fetchAll();
	}

	public function getlistProInactif(){
		$sql=('SELECT id_proprietaire,nom,prenom,rue,numero,CP,ville,pays,mail,telephone,gsm 
				FROM proprietaire
				WHERE actif="N"');
		return $this->pdo->query($sql)->fetchAll();
	}
	
	public function desactProprio($id){

		$req=$this->pdo->exec('UPDATE proprietaire SET actif="N" WHERE id_proprietaire="'.$id.'"');
	}

	public function deleteProprio($id){

		$req=$this->pdo->exec('DELETE FROM proprietaire WHERE id_proprietaire="'.$id.'"');
	}

    public function deleteRace($id){

        //$req=$this->pdo->exec('DELETE FROM race WHERE id_race="'.$id.'"');
        	$req=$this->pdo->exec('UPDATE race SET actif="N" WHERE id_race="'.$id.'"');
    }

    public function deleteVerification($id){

    	$req=$this->pdo->exec('DELETE FROM verification WHERE id_verification ="'.$id.'"');
    }

	public function activProprio($id){

		$req=$this->pdo->exec('UPDATE proprietaire SET actif="O" WHERE id_proprietaire="'.$id.'"');
	}

	public function modifProprio($tab){
		print_r($tab);
		$req=$this->pdo->prepare('UPDATE proprietaire SET nom=:nom,prenom=:prenom,lieu_naissance=:lieu_naissance,rue=:rue,numero=:numero,CP=:CP,ville=:ville,pays=:pays,mail=:mail,telephone=:telephone,gsm=:gsm,periode_dispo=:periode_dispo,autre_dispo=:autre_dispo,nom_contact=:nom_contact,prenom_contact=:prenom_contact,num_contact=:num_contact
			WHERE id_proprietaire=:id');

		$req->bindParam(':id',$tab['id'],PDO::PARAM_INT);
		$req->bindParam(':nom',$tab['nomMaster'],PDO::PARAM_STR);
		$req->bindParam(':prenom',$tab['prenomMaster'],PDO::PARAM_STR);
		$req->bindParam(':lieu_naissance',$tab['lieuNaissance'],PDO::PARAM_STR);
		$req->bindParam(':rue',$tab['rueMaster'],PDO::PARAM_STR);
		$req->bindParam(':numero',$tab['numMaster'],PDO::PARAM_STR);
		$req->bindParam(':CP',$tab['cpMaster'],PDO::PARAM_STR);
		$req->bindParam(':ville',$tab['villeMaster'],PDO::PARAM_STR);
		$req->bindParam(':pays',$tab['paysMaster'],PDO::PARAM_STR);
		$req->bindParam(':mail',$tab['mailMaster'],PDO::PARAM_STR);
		$req->bindParam(':telephone',$tab['telMaster'],PDO::PARAM_STR);
		$req->bindParam(':gsm',$tab['gsmMaster'],PDO::PARAM_STR);
		$req->bindParam(':periode_dispo',$tab['periodeContact'],PDO::PARAM_STR);
		$req->bindParam(':autre_dispo',$tab['autreDispo'],PDO::PARAM_STR);
		$req->bindParam(':nom_contact',$tab['nomContact'],PDO::PARAM_STR);
		$req->bindParam(':prenom_contact',$tab['prenomContact'],PDO::PARAM_STR);
		$req->bindParam(':num_contact',$tab['telContact'],PDO::PARAM_STR);
	
		$req->execute();
	}

	public function modifListVerification($tab){

		$req=$this->pdo->prepare('UPDATE verification SET verification=:verification WHERE id_verification=:id');

		$req->bindParam(':verification',$tab['verif'],PDO::PARAM_STR);
		$req->bindParam(':id',$tab['id'],PDO::PARAM_INT);
		$req->execute();
	}

	public function addNewDogs($tab){

		print_r($tab);
		echo "string";

		$req=$this->pdo->prepare('INSERT INTO proprietaire(nom,prenom,date_naissance,lieu_naissance,rue,numero,CP,ville,pays,mail,telephone,gsm,periode_dispo,autre_dispo,nom_contact,prenom_contact,num_contact,datesave) 
			VALUES (:nom,:prenom,:date_naissance,:lieu_naissance,:rue,:numero,:CP,:ville,:pays,:mail,:telephone,:gsm,:periode_dispo,:autre_dispo,:nom_contact,:prenom_contact,:num_contact,:datesave)');

		$req->bindParam(':nom',$tab['nomMaster'],PDO::PARAM_STR);
		$req->bindParam(':prenom',$tab['prenomMaster'],PDO::PARAM_STR);
		$req->bindParam(':date_naissance',$tab['dateNaissance'],PDO::PARAM_STR);
		$req->bindParam(':lieu_naissance',$tab['lieuNaissance'],PDO::PARAM_STR);
		$req->bindParam(':rue',$tab['rueMaster'],PDO::PARAM_STR);
		$req->bindParam(':numero',$tab['numMaster'],PDO::PARAM_STR);
		$req->bindParam(':CP',$tab['cpMaster'],PDO::PARAM_STR);
		$req->bindParam(':ville',$tab['villeMaster'],PDO::PARAM_STR);
		$req->bindParam(':pays',$tab['paysMaster'],PDO::PARAM_STR);
		$req->bindParam(':mail',$tab['mailMaster'],PDO::PARAM_STR);
		$req->bindParam(':telephone',$tab['telMaster'],PDO::PARAM_STR);
		$req->bindParam(':gsm',$tab['gsmMaster'],PDO::PARAM_STR);
		$req->bindParam(':periode_dispo',$tab['periodeContact'],PDO::PARAM_STR);
		$req->bindParam(':autre_dispo',$tab['autreDispo'],PDO::PARAM_STR);
		$req->bindParam(':nom_contact',$tab['nomContact'],PDO::PARAM_STR);
		$req->bindParam(':prenom_contact',$tab['prenomContact'],PDO::PARAM_STR);
		$req->bindParam(':num_contact',$tab['telContact'],PDO::PARAM_STR);
		$req->bindParam(':datesave',$tab['date'],PDO::PARAM_STR);
		


		
		$req->execute();
	}

	public function ajoutDogs($tab){
		
		
		$req=$this->pdo->prepare('INSERT INTO chien(nom,num_puce,sexe,date_naissance,puce_dogs,tatoo_dogs,detention,club,club_adresse,mordant,veto,vetotel,remarques,id_race,id_proprietaire) 
			VALUES (:nom,:num_puce,:sexe,:date_naissance,:puce_dogs,:tatoo_dogs,:detention,:club,:club_adresse,:mordant,:veto,:vetotel,:remarques,:id_race,:id_proprietaire)');
		
		$req->bindParam(':nom',$tab['nomDogs'],PDO::PARAM_STR);
		$req->bindParam(':num_puce',$tab['numPuceDogs'],PDO::PARAM_STR);
		$req->bindParam(':sexe',$tab['sexe_dogs'],PDO::PARAM_STR);
		$req->bindParam(':date_naissance',$tab['dateNaissance'],PDO::PARAM_STR);
		$req->bindParam(':puce_dogs',$tab['puceDogs'],PDO::PARAM_STR);
		$req->bindParam(':tatoo_dogs',$tab['tatooDogs'],PDO::PARAM_STR);
		$req->bindParam(':detention',$tab['detention'],PDO::PARAM_STR);
		$req->bindParam(':club',$tab['club'],PDO::PARAM_STR);
		$req->bindParam(':club_adresse',$tab['clubAdresse'],PDO::PARAM_STR);
		$req->bindParam(':mordant',$tab['mordant'],PDO::PARAM_STR);
		$req->bindParam(':veto',$tab['veto'],PDO::PARAM_STR);
		$req->bindParam(':vetotel',$tab['vetoTel'],PDO::PARAM_STR);
		$req->bindParam(':id_race',$tab['raceDogs'],PDO::PARAM_INT);
		$req->bindParam(':id_proprietaire',$tab['id'],PDO::PARAM_INT);
		$req->bindParam(':remarques',$tab['remarques'],PDO::PARAM_STR);


		//print_r($tab);	
		$req->execute();	
	}

	public function modifDogs($tab){
		

		$req=$this->pdo->prepare('UPDATE chien 
			SET nom=:nom,num_puce=:num_puce,sexe=:sexe,date_naissance=:date_naissance,puce_dogs=:puce_dogs,tatoo_dogs=:tatoo_dogs,detention=:detention,club=:club,club_adresse=:club_adresse,mordant=:mordant,veto=:veto,vetotel=:vetotel,remarques=:remarques WHERE id_chien=:id');

		$req->bindParam(':id',$tab['id'],PDO::PARAM_INT);
		$req->bindParam(':nom',$tab['nomDogs'],PDO::PARAM_STR);
		$req->bindParam(':num_puce',$tab['numPuceDogs'],PDO::PARAM_STR);
		$req->bindParam(':sexe',$tab['sexe_dogs'],PDO::PARAM_STR);
		$req->bindParam(':date_naissance',$tab['dateNaissance'],PDO::PARAM_STR);
		$req->bindParam(':puce_dogs',$tab['puceDogs'],PDO::PARAM_STR);
		$req->bindParam(':tatoo_dogs',$tab['tatooDogs'],PDO::PARAM_STR);
		$req->bindParam(':detention',$tab['detention'],PDO::PARAM_STR);
		$req->bindParam(':club',$tab['club'],PDO::PARAM_STR);
		$req->bindParam(':club_adresse',$tab['clubAdresse'],PDO::PARAM_STR);
		$req->bindParam(':mordant',$tab['mordant'],PDO::PARAM_STR);
		$req->bindParam(':veto',$tab['veto'],PDO::PARAM_STR);
		$req->bindParam(':vetotel',$tab['vetoTel'],PDO::PARAM_STR);
		$req->bindParam(':remarques',$tab['remarques'],PDO::PARAM_STR);

		$req->execute();
	}

	public function addNewDogsList($tab){
		$req=$this->pdo->prepare('INSERT INTO race (race) VALUES (:race)');

		$req->bindParam(':race',$tab['listDogs'],PDO::PARAM_STR);
		$req->execute();
	}

	public function addNewListVerification($tab){
		$req=$this->pdo->prepare('INSERT INTO verification (verification) VALUES (:verification)');

		$req->bindParam(':verification',$tab['listVerification'],PDO::PARAM_STR);
		$req->execute();
	}
    
   	public function connexion(){
   		$login=$_POST['login'];
   		$mdp=$_POST['mdp'];


   		$req=$this->pdo->prepare('SELECT login,mdp,id_type FROM agent WHERE login=:login AND mdp=:mdp');
   		$req->bindParam(':login',$_POST['login'],PDO::PARAM_STR);
   		$req->bindParam(':mdp',$_POST['mdp'],PDO::PARAM_STR);
   		$req->execute();
   		$count=$req->rowCount();


   		if($count == 1){
   			while($row=$req->fetch()){
   			

   				$_SESSION['type'] = $row['id_type'];
   				return $row['id_type'];

   			}

   			
   		}
   		else echo 'pas good';

   		
   		
   	}

	













}

?>