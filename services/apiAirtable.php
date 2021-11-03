<?php

class apiAirtable{

    private $_datas;
    private $_url;
    private $_ch;
    private $_response;
    private $_datasFormat;

    
    public function __construct($datas, $url){
        $this->_datas = $datas;
        $this->_url = $url;
    }

    public function datasFormatJson(){
        $this->_datasFormat = array("fields" => array(
            "Nom" => $this->_datas->getNom(),
            "Prénom" => $this->_datas->getPrenom(),
            "Enseigne" => $this->_datas->getEnseigne(),
            "Email" => $this->_datas->getEmail(),
            "Téléphone" => $this->_datas->getTelephone(),
            "Adresse" => $this->_datas->getAdresse(),
            "Code postal" => $this->_datas->getCodePostal(),
            "Ville" => $this->_datas->getVille(),
            "Catégorie de commerce" => $this->_datas->getCategorieCommerce()
        ));

        $this->_datasFormat = json_encode($this->_datasFormat);
    }

    public function datasFormatJsonLivreur(){
        $this->_datasFormat = array("fields" => array(
            "Nom" => $this->_datas->getNom(),
            "Prénom" => $this->_datas->getPrenom(),
            "Email" => $this->_datas->getEmail(),
            "Téléphone" => $this->_datas->getTelephone(),
            "Type de véhicule" => $this->_datas->getVehicule(),
            "Secteur géographique" => $this->_datas->getSecteurGeographique(),
            "Ville souhaitée" => $this->_datas->getVille(),
            "Code postal" => $this->_datas->getCodePostal(),
            "Rayon en km" => $this->_datas->getRayon()
        ));

        $this->_datasFormat = json_encode($this->_datasFormat);
    }

    public function curlPost($location){
        $this->_ch = curl_init();
        curl_setopt($this->_ch, CURLOPT_URL, $this->_url);
        curl_setopt($this->_ch, CURLOPT_POST, true);
        curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $this->_datasFormat);
        curl_setopt($this->_ch, CURLOPT_HTTPHEADER, APIHEADER);

        $this->_response = curl_exec($this->_ch);

        if (curl_getinfo($this->_ch, CURLINFO_HTTP_CODE) == 200) {
            traitementFormulaire::messageFlashValidation("Vos informations ont bien étés transmises", $location);
        } else {
            traitementFormulaire::messageFlashError("Une erreur est survenue, merci de recommencer la saisie", $location);
        }

    }
    
}