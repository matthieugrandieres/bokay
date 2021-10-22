<?php 

class Livreur{

    private $_nom;
    private $_prenom;
    private $_email;
    private $_telephone;
    private $_vehicule;
    private $_secteurGeographique;
    private $_ville;
    private $_codePostal;
    private $_rayon;


    public function __construct($nom, $prenom, $email, $telephone, $vehicule, $secteurGeographique, $ville, $codePostal, $rayon){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_email = $email;
        $this->_telephone = $telephone;
        $this->_vehicule = $vehicule;
        $this->_secteurGeographique = $secteurGeographique;
        $this->_ville = $ville;
        $this->_codePostal = $codePostal;
        $this->_rayon = $rayon;
    }

    
    public function getNom()
    {
        return $this->_nom;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function getTelephone()
    {
        return $this->_telephone;
    }

    public function getVehicule()
    {
        return $this->_vehicule;
    }

    public function getSecteurGeographique()
    {
        return $this->_secteurGeographique;
    }

    public function getVille()
    {
        return $this->_ville;
    }

    public function getRayon()
    {
        return $this->_rayon;
    }
}