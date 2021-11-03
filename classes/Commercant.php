<?php 

class Commercant{
    
    private $_nom;
    private $_prenom;
    private $_enseigne;
    private $_email;
    private $_telephone;
    private $_adresse;
    private $_code_postal;
    private $_ville;
    private $_categorie_commerce;

    public function __construct($nom, $prenom, $enseigne, $email, $telephone, $adresse, $code_postal, $ville, $categorie_commerce){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_enseigne = $enseigne;
        $this->_email = $email;
        $this->_telephone = $telephone;
        $this->_adresse = $adresse;
        $this->_code_postal = $code_postal;
        $this->_ville = $ville;
        $this->_categorie_commerce = $categorie_commerce;
    }

    public function getNom(): string{
        return $this->_nom;
    }

    public function getPrenom(): string{
        return $this->_prenom;
    }

    public function getEnseigne(): string{
        return $this->_enseigne;
    }

    public function getEmail(): string{
        return $this->_email;
    }

    public function getTelephone(): int{
        return intval($this->_telephone);
    }

    public function getAdresse(): string{
        return $this->_adresse;
    }

    public function getCodePostal(): int{
        return intval($this->_code_postal);
    }

    public function getVille(): string{
        return $this->_ville;
    }

    public function getCategorieCommerce(): string{
        return $this->_categorie_commerce;
    }

    
}