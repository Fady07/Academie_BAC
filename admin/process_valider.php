<?php
include'../includes/connect.php';

$sql =$db->Prepare("UPDATE users SET validation='1' WHERE id_user=?");

$sql->execute(array($_GET['name']));

header("Refresh:0; url=index.php");


?>