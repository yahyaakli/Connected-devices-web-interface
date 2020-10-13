<?php $title = 'home page'; ?>

<?php ob_start(); ?>
<!--HOME PAGE VIEW-->
<div class="container">
<div class="card">
  <div class="card-body">
		Number of connected devices: <?php echo $sizeC?>
  </div>
</div>
<br>
<div class='row'>
	<?php
	
	// cette boucle permet d'afficher les modules dans la page principale
	foreach($ConnectedModules as $module){
			echo "<div class='col-md-6'>";
				echo $module->getName();
				if($module->getEtat() == 0){
					echo " <a href='index.php?option=on&ID=".$module->getID()."' class='badge badge-pill badge-danger'>OFF</a><br>";
				}else{
					echo " <a href='index.php?option=off&ID=".$module->getID()."' class='badge badge-pill badge-success'>On</a><br>";
				}
				echo "<ul class=\"list-group\">";
					echo "<li class=\"list-group-item\">";
						echo "temperature: ";
						if($module->getTemperature()>50){
							echo " <span class=\"badge badge-pill badge-danger\">".$module->getTemperature()."</span><br>";
						}else{
							echo " <span class=\"badge badge-pill badge-success\">".$module->getTemperature()."</span><br>";
						}
					echo "</li>";
					echo "<li class=\"list-group-item\">";
						echo "Duree de fonctionnement: ";
						echo $module->getDureeFonct();
					echo "</li>";
					echo "<li class=\"list-group-item\">";
						echo "Nombre de donnees envoye: ";
						echo $module->getnbrDonnees();
					echo "</li>";
				echo "</ul>";
				echo "<br> <a href='index.php?option=remove&ID=".$module->getID()."' class='badge badge-pill badge-danger'>Remove</a><br><br>";
			echo "</div>";
	}	
	?>
</div>
</div>
<br>
<?php $content = ob_get_clean(); ?>

<?php require('public/template/index.php'); ?>
