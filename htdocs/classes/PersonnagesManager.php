<?php

//pour recuperer resultat de mySql

class PersonnagesManager
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all()
    {
        $statementPersonnages = $this->pdo->query('SELECT * FROM personnages');
        $persoLignes = $statementPersonnages->fetchAll();
        $persos = [];
        
        foreach($persoLignes as $persoLigne){
            $persos[] = new Personnage($persoLigne);
        }
        return $persos;
    }

    public function get()
    {

    }

    public function create()
    {
        
    }

    public function update()
    {
        
        $updateDegats = $this->pdo->query("UPDATE personnages SET degats = ? WHERE personnages.name = ?"); 
        $requete->execute([$personnageHit->getDegats(), $personnageHit->getName()]);
    }

    public function delete()
    {
       /*  DELETE FROM `personnages` WHERE `personnages`.`id` = 6; */
    }
}

?>