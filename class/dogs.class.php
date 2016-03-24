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

		$sql=('SELECT a.id_chien,a.nom,a.num_puce,a.date_naissance,a.puce_dogs,a.tatoo_dogs,a.sexe,a.id_race,b.race,a.id_proprietaire
			FROM chien a
			LEFT JOIN race b ON b.id_race = a.id_race
			WHERE  id_proprietaire="'.$id.'"');
		return $this->pdo->query($sql)->fetchAll();
		

	}
	public function desactDogs($id){

		$req=$this->pdo->exec('DELETE FROM chien WHERE id_chien="'.$id.'"');
	}

	public function getListNameDogs(){
		$sql=('SELECT * FROM chien');
		return $this->pdo->query($sql)->fetchAll();
	}

	public function getListPro(){
		$sql=('SELECT id_proprietaire,nom,prenom,rue,numero,CP,ville,pays,mail,telephone,gsm 
				FROM proprietaire
				WHERE actif="O"');
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
		$req=$this->pdo->prepare('UPDATE proprietaire SET nom=:nom,prenom=:prenom,rue=:rue,numero=:numero,CP=:CP,ville=:ville,pays=:pays,mail=:mail,telephone=:telephone,gsm=:gsm
			WHERE id_proprietaire=:id');

		$req->bindParam(':id',$tab['id'],PDO::PARAM_INT);
		$req->bindParam(':nom',$tab['nomMaster'],PDO::PARAM_STR);
		$req->bindParam(':prenom',$tab['prenomMaster'],PDO::PARAM_STR);
		$req->bindParam(':rue',$tab['rueMaster'],PDO::PARAM_STR);
		$req->bindParam(':numero',$tab['numMaster'],PDO::PARAM_STR);
		$req->bindParam(':CP',$tab['cpMaster'],PDO::PARAM_STR);
		$req->bindParam(':ville',$tab['villeMaster'],PDO::PARAM_STR);
		$req->bindParam(':pays',$tab['paysMaster'],PDO::PARAM_STR);
		$req->bindParam(':mail',$tab['mailMaster'],PDO::PARAM_STR);
		$req->bindParam(':telephone',$tab['telMaster'],PDO::PARAM_STR);
		$req->bindParam(':gsm',$tab['gsmMaster'],PDO::PARAM_STR);
		//$req->bindParam(':nom_chien',$tab['nomDogs'],PDO::PARAM_STR);
		//$req->bindParam(':race_chien',$tab['raceDogs'],PDO::PARAM_STR);
		//$req->bindParam(':num_puce',$tab['numPuceDogs'],PDO::PARAM_STR);
		$req->execute();
	}

	public function addNewDogs($tab){

		$req=$this->pdo->prepare('INSERT INTO proprietaire(nom,prenom,rue,numero,CP,ville,pays,mail,telephone,gsm) VALUES (:nom,:prenom,:rue,:numero,:CP,:ville,:pays,:mail,:telephone,:gsm)');

		$req->bindParam(':nom',$tab['nomMaster'],PDO::PARAM_STR);
		$req->bindParam(':prenom',$tab['prenomMaster'],PDO::PARAM_STR);
		$req->bindParam(':rue',$tab['rueMaster'],PDO::PARAM_STR);
		$req->bindParam(':numero',$tab['numMaster'],PDO::PARAM_STR);
		$req->bindParam(':CP',$tab['cpMaster'],PDO::PARAM_STR);
		$req->bindParam(':ville',$tab['villeMaster'],PDO::PARAM_STR);
		$req->bindParam(':pays',$tab['paysMaster'],PDO::PARAM_STR);
		$req->bindParam(':mail',$tab['mailMaster'],PDO::PARAM_STR);
		$req->bindParam(':telephone',$tab['telMaster'],PDO::PARAM_STR);
		$req->bindParam(':gsm',$tab['gsmMaster'],PDO::PARAM_STR);
		
		$req->execute();

	}

	public function ajoutDogs($tab){
		
		$req=$this->pdo->prepare('INSERT INTO chien(nom,num_puce,date_naissance,puce_dogs,tatoo_dogs,sexe,id_race,id_proprietaire) 
			VALUES (:nom,:num_puce,:date_naissance,:puce_dogs,:tatoo_dogs,:sexe,:id_race,:id_proprietaire)');
		
		$req->bindParam(':nom',$tab['nomDogs'],PDO::PARAM_STR);
		$req->bindParam(':num_puce',$tab['numPuceDogs'],PDO::PARAM_STR);
		$req->bindParam(':id_race',$tab['raceDogs'],PDO::PARAM_STR);
		$req->bindParam(':id_proprietaire',$tab['idp'],PDO::PARAM_INT);
		$req->bindParam(':date_naissance',$tab['dateNaissance'],PDO::PARAM_STR);
		$req->bindParam(':puce_dogs',$tab['puceDogs'],PDO::PARAM_STR);
		$req->bindParam(':tatoo_dogs',$tab['tatooDogs'],PDO::PARAM_STR);
		$req->bindParam(':sexe',$tab['sexe'],PDO::PARAM_STR);
		
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

   		$sql=$this->pdo->exec('SELECT * FROM agent');
   		return $this->pdo->query($sql)->fetchAll();
   	}

	













}

?>