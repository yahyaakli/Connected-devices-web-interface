<?php
// Controller

// importer le model qui contient les fonctions php que nous allons executer pour communiquer avec la base de donnees, ainsi que les objets que nous allons utiliser
require("AppModel.php");

class AppController{
	
	// page principale
	public function indexPage(){
		$req = getAllModuleData();
		$ConnectedModules = array();
		while($read_data = $req ->fetch()){
			$read_module = new ConnectedModule($read_data['Nom']);
			
			$read_module->setID($read_data['ID']);
			$read_module->setTemperature($read_data['Temperature']);
			$read_module->setDureeFonct($read_data['Duree']);
			$read_module->setnbrDonnees($read_data['nbrDonnees']);
			$read_module->setEtat($read_data['Etat']);
			$ConnectedModules[] = $read_module;
			if($read_module->getEtat()==1){
				$read_module->setTemperature(rand(20,80));
				$read_module->setDureeFonct($read_module->getDureeFonct()+1);
			}else{
				$read_module->setTemperature(25);
			}
			simpleModuleUpdate($read_module);
			
		}
		$sizeC = sizeof($ConnectedModules);
		require("views/indexView.php");
	}
	
	// Formulaire d'ajout d'element
	public function addPage(){
		require("views/addView.php");
	}
	
	// ajout d'element
	public function addElement($name){
		$module = new ConnectedModule($name);
		addModule($module);
		header('Location: index.php');
	}
	
	// eteindre un composant
	public function turnOff($id){
		offModuleUpdate($id);
		header('Location: index.php');
	}
	
	// Allumer un composant
	public function turnOn($id){
		onModuleUpdate($id);
		header('Location: index.php');
	}
	
	// Enlever un composant
	public function removeElement($id){
		removeItem($id);
		header('Location: index.php');
	}
}