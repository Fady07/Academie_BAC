<?php
session_start();
include'../includes/connect.php';


?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><?php echo'Bienvenu '. $_SESSION['username'].' @ Academie_Bac'; ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Acceuil</a></li>

      <li><a class="active" href="?action=users">Utilisateurs</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page-1
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="">Page 1-1</a></li>
          <li><a href="">Page 1-2</a></li>
          <li><a href="">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">page-2</a></li>
      <li><a href="#">page-3</a></li>
    </ul>
  </div>
</nav>

<?php

if(isset($_GET['action']) && $_GET['action'] == 'users'){

$sql =$db->Prepare('SELECT * FROM users');

$sql->execute();
  

  ?>

   <div class="container">

  <table class="table table-hover">

    <thead>
      <tr>
        <th>Id</th>
        <th>Nom d'utilisateur</th>
        <th>E-mail</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php

      while($data = $sql->fetch()){
      
      echo'<tr>';

      echo'<td>';
      echo $data['id_user'];
      echo'</td>';

      echo'<td>';
      echo $data['username'];
      echo'</td>';

      echo'<td>';
      echo $data['email'];
      echo'</td>';

      echo'<td>';
      echo $data['password'];
      echo'</td>';

      echo'<td>';
      




      echo'<a href="process_valider.php?name='.$data['id_user'].'">';

            echo'<input class="btn btn-success" value="Valider" type="submit" name="valider">';
      
      echo'</a>';

      echo'<a href="process_delete.php?name='.$data['id_user'].'">';

            echo'<input class="btn btn-danger" value="Supprimer" type="submit" name="delete">';
      
      echo'</a>';


      echo'</td>'; 
      echo'</tr>';
      
      
      }

      


      ?>
    </tbody>
  </table>
  
</div>
</body>




  <?php
}

?>