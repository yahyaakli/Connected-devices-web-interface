vous allez trouver dans ce dossier le travail demander.
Dans ce travail, j'ai respecté l'architecture MVC pour qu'il soit simple a lire, et plus facile a developper et maintenir a jour.

index.php est la page principale qui permet de gerer toutes les fonctionnalités du site
vous trouverer aussi la table SQL iot_modules

le nom de la base de données que j'ai utilisé est: iot_manage, vous pouvez changer le nom dans:
Controller/AppModel.php, ligne 17

vous pouvez aussi creer une nouvelle table iot_module en executant:
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

Dans la page principale vous pouvez ajouter des modules en appuyant sur Add modules,
vous pouvez aussi soit eteindre/allumer un module en appuyant sur les bouttons On/off
et enlever un module en appuyant sur Remove

si vous rafraichissez la page principale, la temperature des modules qui sont allumés change de facon aleatoire
si elle est >50, elle est affiché en rouge, sinon en vert.

la duree de fonctionnement des module allumés s'incremente par 1 a chaque fois que vous rafraichissez la page d'acceuil.
