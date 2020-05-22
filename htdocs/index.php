<?php
session_start();

?>
<?php
include 'classes/PersonnagesManager.php';
include 'classes/Personnage.php';

$pdo = new PDO('mysql:host=127.0.0.1;dbname=TP_mini_combat;charset=utf8','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$PersonnagesManager = new PersonnagesManager($pdo);

$persos = $PersonnagesManager->all();

/* 
echo '<pre>';
var_dump($persos);
exit;  */




$persos[0]->hit($persos[1]);
$persos[0]->hit($persos[1]);
/* var_dump($persos[1]).'<br>'; */
var_dump($_SESSION['adversaire']); 
//je recupere en session le personnage hit et c'est lui que je dois update !


if(isset($_POST['name'])){  
    $requete=$pdo->prepare('INSERT INTO personnages (name, degats) 
                            VALUES (?,?)');
    $requete->execute([$_POST['name'],10]);
} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>jeu de combat</title>
</head>
<body>
<div class="container">
        <form class="formulaire" action="" method="POST">
            <div class="form-group">
                <input name="name" type="text" class="form-control" id="name" placeholder="nom du joueur">
            </div>
           

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>




<div class="dropdown">
 <button class="boutonmenuprincipal">Choisi ton adversaire</button>
 <div class="dropdown-child">
 <?php foreach($persos as $perso): ?>
 <a href=""><?php echo $perso->getName();?></a>
 <?php endforeach;?>
 </div>
 </div>




 


   
</body>
</html>