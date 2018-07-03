<?php
include'../includes/connect.php';

$sql = $db->Prepare("DELETE FROM users WHERE id_user=? ");

$sql->execute(array($_GET['name']));

header("Refresh:0; url=index.php");


?>