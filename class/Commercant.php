<?php 

class Commercant{
    
    /**
     * @var string
     */
    private $_nom;

    /**
     * @var string
     */
    private $_prenom;

    /**
     * @var string
     */
    private $_enseigne;

    /**
     * @var string
     */
    private $_email;

    /**
     * @var integer
     */
    private $_telephone;

    /**
     * @var string
     */
    private $_adresse;

    /**
     * @var integer
     */
    private $_code_postal;

    /**
     * @var string
     */
    private $_ville;

    /**
     * @var array
     */
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

    public function getNom(){
        return $this->_nom;
    }

    public function getPrenom(){
        return $this->_prenom;
    }

    public function getEnseigne(){
        return $this->_enseigne;
    }

    public function getEmail(){
        return $this->_email;
    }

    public function getTelephone(){
        return intval($this->_telephone);
    }

    public function getAdresse(){
        return $this->_adresse;
    }

    public function getCodePostal(){
        return intval($this->_code_postal);
    }

    public function getVille(){
        return $this->_ville;
    }

    public function getCategorieCommerce(){
        return $this->_categorie_commerce;
    }

    
}