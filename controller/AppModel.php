<?php
// App model
function chargerClasse($classe)
{
  require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}
spl_autoload_register('chargerClasse'); // charger les classes que nous allons utiliser

//connection a la base de donnee
/*
*	ici le nom de la base de donnee est "iot_manage"
*	et la table principale : "iot_modules"
*	on fait le test dans un serveur local donc l'identifiant est : root, il n'a pas de mot de passe
*/
function dbconnect(){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=iot_manage;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
}

// permet d'ajouter un module dans la base de donnee
function addModule($module){
	$bdd = dbConnect();
	$req = $bdd->prepare('INSERT INTO iot_modules(Nom,Temperature,Duree,nbrDonnees,Etat,dateCreation) VALUES(:nom,:temp,:D,:nbrD,:Etat,:date)');
	$req->execute(array(
		'nom'=> $module->getName(),
		'temp'=> $module->getTemperature(),
		'D'=> $module->getDureeFonct(),
		'nbrD'=> $module->getnbrDonnees(),
		'Etat'=> $module->getEtat(),
		'date'=> date ("Y-m-d H:i:s")
	));
}
// permet de recuperer les modules de la base de donnees
function getAllModuleData(){
	$bdd = dbConnect();
	$req = $bdd->prepare('SELECT * FROM iot_modules');
	$req->execute();
	return $req;
}
// permet de changer la temperature et la duree de fonctionnement d'un module dans la base de donnees
function simpleModuleUpdate($module){
	$bdd = dbConnect();
	$req = $bdd->prepare('UPDATE iot_modules SET Temperature=:temp ,Duree=:Duree WHERE ID=:id');
	$req->execute(array(
		'temp'=>$module->getTemperature(),
		'Duree'=>$module->getDureeFonct(),
		'id'=>$module->getID()
	));
}

// permet d'eteindre un module
function offModuleUpdate($id){
	$bdd = dbConnect();
	$req = $bdd->prepare('UPDATE iot_modules SET Etat=:etat WHERE ID=:id');
	$req->execute(array(
		'etat'=>0,
		'id'=>$id
	));
}

// permet d'allumer un module
function onModuleUpdate($id){
	$bdd = dbConnect();
	$req = $bdd->prepare('UPDATE iot_modules SET Etat=:etat WHERE ID=:id');
	$req->execute(array(
		'etat'=>1,
		'id'=>$id
	));
}

// permet d'enlever un module
function removeItem($id){
	$bdd = dbConnect();
	$req = $bdd->prepare('DELETE FROM iot_modules WHERE ID=:id');
	$req->execute(array(
		'id' => $id
	));
}
