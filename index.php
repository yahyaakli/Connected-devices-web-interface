<?php 
// Main Index 
require("controller/AppController.php");

/*
* Les pages sont controllés par la classe AppController. les methodes de cette classes permettent d'executer les fonctionnalités attendus
* Et quand vous rafraichissez la page index.php, et si le systeme est en mode de fonctionnement, la temperature change de facon aleatoire, et la duree s'incremente par 1
* si la temperature est superieure a 50, sa couleur devient rouge, sinon elle est verte
*/

$C = new AppController();

if(isset($_GET['option'])){
	if($_GET['option'] == "add"){
		$C->addPage(); // la page qui permet l'ajout d'un element
	}else if($_GET['option'] == "adding"){
		if(isset($_POST['moduleName'])){
			// l'ajout de l'element par le formulaire declanche ces lignes de code
			$name = htmlspecialchars($_POST['moduleName']);
			$C->addElement($name);
		}
	}else if($_GET['option'] == "on"){
		// si vous cliquer sur le boutton on qui est a cote du nom du module, vous allez pouvoir soit eteindre ou allumer le composant
		$C->turnOn($_GET['ID']);
	}else if($_GET['option'] == "off"){
		$C->turnOff($_GET['ID']);
	}else if($_GET['option'] == "remove"){
		// cette page permet la suppresion de l'element
		$C->removeElement($_GET['ID']);
	}
}else{
	// page principale
	$C->indexPage();
}
