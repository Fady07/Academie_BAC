<?php
include 'includes/connect.php';

session_start();

$error = '';

$remplir ='';

if(isset($_POST['submit'])){
 
 $username= htmlspecialchars(mysql_real_escape_string($_POST['username']));
 $password= htmlspecialchars(mysql_real_escape_string($_POST['password']));

 if($username && $password){

 $sql=$db->Prepare("SELECT * FROM users WHERE username=? AND password=? ");
 $sql->execute(array($username,$password));
 
 $row = $sql->rowCount();


 if ($row > 0) {
 
  $data = $sql->fetch();

 	if($data['rank'] == 1){

    if($data['validation'] == 1){

 		$_SESSION['username'] = $data['username'];

 		header('Location: admin/index.php');
    }else{

      header('Location:index.php');
    }

 	}else{
 		header('Location:index.php');
 		
 	}
 	
 }else{

  $error = "Votre compte n'existe pas";

 }
  

 }else{

  $remplir = "Veuillez remplir tout les champs !";
 }


}




?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<form action="" method="POST">
	<h1 align="center">Login</h1>

	<div class="form-control" style="margin:20px auto;width: 80%;border:solid;height: 300px;">
       
       <?php
        
        if($error){

          echo'<div class="alert alert-danger">'.$error.'</div>';
        }elseif($remplir){
           
           echo'<div class="alert alert-info">'.$remplir.'</div>';

        }

       ?>

    	<div class="form-group">

    <label for="name">Nom d'utilisateur:</label>
    <input type="text" name="username" class="form-control" id="name">

  </div>

  <div class="form-group">

    <label for="pwd">Mot de pass:</label>
    <input type="password" name ="password" class="form-control" id="password">

  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
