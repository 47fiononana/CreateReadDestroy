<?php

include_once("controller.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
        
    
    // checking empty fields
    if(empty($nom) || empty($prenom)) {    
            
        if(empty($nom)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($prenom)) {
            echo "<font color='red'>firstname field is empty.</font><br/>";
        }
                
    } else {    
        //updating the table
        $sql = "UPDATE user SET nom=:nom, prenom=:prenom WHERE id=:id";
        $query = $pdo_x->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':nom', $nom);
        $query->bindparam(':prenom', $prenom);
        
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: affiche.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM user WHERE id=:id";
$query = $pdo_x->prepare($sql);
$query->execute(array(':id' => $id));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    
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
<h1 class="demo-form-heading">UPDATE USERs</h1>
<form name="frmAdd" action="update.php" method="post">
  <div class="demo-form-row">
	  <label>nom: </label><br>
	  <input type="text" name="nom" class="demo-form-field" value="<?php echo $nom;?>" />
  </div>
  <div class="demo-form-row">
	  <label>prenom: </label><br>
	  <input type="text" name="prenom" class="demo-form-field" rows="5" value="<?php echo $prenom;?>">
	  <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
  </div>
  <br>
  <div style="text-align:left;">
	  <input name="update" type="submit" value="Update" class="button_link">
  </div>
  </form>
</div> 
</body>
</html>