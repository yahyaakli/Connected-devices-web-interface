<?php $title = 'add page'; ?>

<?php ob_start(); ?>
<!--FORMULAIRE D'AJOUT DE MODULE-->
<div class="container">
	<form method="post" action="index.php?option=adding">
	  <div class="form-group">
		<label>Module name</label>
		<input name="moduleName" type="text" class="form-control" placeholder="module name">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('public/template/index.php'); ?>