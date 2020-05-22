<?php
/* session_start(); */


class Personnage
{
    private $name;
    private $degats;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
       if(strlen($data['name']) < 2){
            throw new Exception ('Le nom du personnage est trop court !');
        } 
        $this->setName($data['name']);
        $this->setDegats($data['degats']);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDegats()
    {
        return $this->degats;
    }

    public function setName(string $name)
    {
        if(strlen($name) < 2){
            throw new Exception ('le nom de personnage doit avoir au moins 2 caractères');
        }
        $this->name = $name;
    } 

    public function setDegats($degats)
    {
        $this->degats = $degats;
    }


    public function hit(Personnage $personnageHit)
    
    {
        $_SESSION['adversaire']=$personnageHit;
        echo $this->getName().' frappe '.$personnageHit->getName().'<br>';
        $personnageHit->setDegats($personnageHit->getDegats() +20);     
        echo $personnageHit->getName().' reçoit 20 points de dégât, il est désormais à '.($personnageHit->getDegats()).' points<br>'; 
        
        /* $personnageHit->update();  */
    }

} 
?>