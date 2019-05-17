<?php
require_once("controller.php");
$pdo_statement=$pdo_x->prepare("DELETE FROM user WHERE id=" . $_GET['id']);
$pdo_statement->execute();
header('location:affiche.php');
?>