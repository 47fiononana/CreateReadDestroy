<?php
if(!empty($_POST["add_user"])) {
	require_once("controller.php");
	

	$sql = "INSERT INTO user (nom,prenom) VALUES (:nom,:prenom)";
	$pdo_statement = $pdo_x->prepare($sql);
		
	$result = $pdo_statement->execute(array(
		':nom'=>$_POST['nom'],
		':prenom'=>$_POST['prenom']
	));
	if (!empty($result) ){
	  header('location:index.php');
	}	

	
}
?>
<html>
<head>
<title>PHP PDO CRUD - Add New User</title>
<style>
button{}

	.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
    
</style>

</head>
<body>

<div class="frm-add">
<h1 class="demo-form-heading">Add New user</h1>
<form name="frmAdd" action="index.php" method="POST">
  <div class="demo-form-row">
	  <label>nom: </label><br>
	  <input type="text" name="nom" class="demo-form-field"/>
  </div>
  <div class="demo-form-row">
	  <label>prenom: </label><br>
	  <input type="text" name="prenom" class="demo-form-field" rows="5">
  </div>
  <br>
  <div style="text-align:left;">
	  <input name="add_user" type="submit" value="Ajouter" class="button_link">
  </div>

  <div style="text-align:left;margin:20px 0px;">
	  <a href="affiche.php" style="text-decoration: none;"><input type="button" name="Liste" value="Liste" class="button_link"></a> 
	</div>
  </form>
</div> 
</body>
</html>