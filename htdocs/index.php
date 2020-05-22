<?php
session_start();

?>
<?php
include 'classes/PersonnagesManager.php';
include 'classes/Personnage.php';
include 'config/db.php';


/* 
echo '<pre>';
var_dump($persos);
exit;  */




$persos[0]->hit($persos[1]).'<br>';
$persos[0]->hit($persos[1]);
var_dump($persos[1]->getId( )).'<br>';  
var_dump($_SESSION['adversaire']->getId()).'<br>'; 

 
//je recupere en session le personnage hit et c'est lui que je dois update !


if(isset($_POST['name'])){  
    $requete=$pdo->prepare('INSERT INTO personnages (name, degats) 
                            VALUES (?,?)');
    $requete->execute([$_POST['name'],10]);
} 
;   

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
            <h4>Ou créer ton personnage : </h4S> 
                <div class="form-group">
                    <input name="name" type="text" class="form-control" id="name" placeholder="nom du personnage">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
<div>





       

<div>
    <form action="" method="POST">
        <div class="form-group ">
            <h4>Choisis ton personnage : </h4S> 
                <select name="persoSelected">
    
        <?php foreach($persos as $perso): ?>
   
            <option value="<?=$perso->getName();?>"><?php echo $perso->getName();?> </option>
        <?php endforeach;?>
                </select>
        </div>
        <div>
            <h4>Choisis ton adversaire : </h4S> 
                <select name="persoAgainst">
    
        <?php foreach($persos as $perso): ?>
   
            <option value="<?=$perso->getName();?>"><?php echo $perso->getName();?> </option>
        <?php endforeach;?>
                </select>
                
                <button type="submit" class="btn btn-primary">Fight</button>
        </div>
    </form>
</div>
<!-- fonction pour choisir un adversaire différent du personnage choisi
    -->
    <?php 
    if(isset($_POST['persoSelected']) AND isset($_POST['persoAgainst'])){
    /*  echo $_POST['persoSelected'];
        echo $_POST['persoAgainst']; */
        if(($_POST['persoSelected']) === ($_POST['persoAgainst'])){
            echo 'Vous ne pouvez pas selectionner le même personnage !<br>';
            echo 'Choississez un adversaire.';
        }
        else{
            echo 'C\'est parti !';
        }
        
    }
?>


   
</body>
</html>