<?php

// Définition de l'interface
interface IPresentation
{
    public function sePresenter();
}

// Définition de la classe Personne
class Personne implements IPresentation
{
    protected $prenom;
    protected $age;

    public function __construct($prenom, $age)
    {
        $this->prenom = $prenom;
        $this->age = $age;
    }

    public function sePresenter()
    {
        // La méthode sePresenter de la classe Personne
        echo "Je suis une personne de {$this->age} ans et je m'appelle {$this->prenom}<br>";
    }
}

// Définition de la classe Homme héritant de Personne
class Homme extends Personne
{
    public function sePresenter()
    {
        echo "Je suis un Homme de {$this->age} ans et je m'appelle {$this->prenom}<br>";
    }
}

// Définition de la classe Femme héritant de Personne
class Femme extends Personne
{
    public function sePresenter()
    {
        echo "Je suis une Femme de {$this->age} ans et je m'appelle {$this->prenom}<br>";
    }
}

// Exemple d'utilisation
$homme1 = new Homme("Johnny", 30);
$homme1->sePresenter();

$femme1 = new Femme("Judy", 25);
$femme1->sePresenter();
