<?php
// Exemple de module connecté 1
/* un modele est decrit dans la base de donnees par son:
		ID
		Nom
		Temperature
		nbrDonnees
		Etat
		dateCreation
*/
/*  pour creer la table on execute le code SQL suivant
CREATE TABLE iot_modules (
    ID int NOT NULL AUTO_INCREMENT,
    Nom varchar(255) NOT NULL,
    Temperature int,
	Duree int,
    nbrDonnees int,
	Etat int,
	dateCreation DATETIME,
    PRIMARY KEY (ID)
);
*/
class ConnectedModule{
	private $id;
	private $name;
	private $temperature;
	private $dureeFonct;
	private $nbrDonnees;
	private $etat;
	
	public function __construct($name){
		$this->name = $name;
		$this->temperature = 25;
		$this->dureeFonct = 0;
		$this->nbrDonnees = 0;
		$this->etat = true;
	}
	
	public function getTemperature(){
		return $this->temperature;
	}
	public function getDureeFonct(){
		return $this->dureeFonct;
	}
	public function getnbrDonnees(){
		return $this->nbrDonnees;
	}
	public function getEtat(){
		return $this->etat;
	}
	public function getName(){
		return $this->name;
	}
	public function setTemperature($temperature){
		$this->temperature = $temperature;
	}
	public function setDureeFonct($dureeFonct){
		$this->dureeFonct = $dureeFonct;
	}
	public function setnbrDonnees($nbrDonnees){
		$this->nbrDonnees = $nbrDonnees;
	}
	public function setEtat($etat){
		if($etat == 0 || $etat == 1){
			$this->etat = $etat;
		}
	}
	public function getID(){
		return $this->id;
	}
	public function setID($id){
		$this->id=$id;
	}
	function setValues($temp, $d, $nbD, $etat){
		$this->setTemperture = $temp;
		$this->setDureeFonct = $d;
		$this->setnbrDonnees = $nbD;
		$this->setEtat = $etat;
	}

}