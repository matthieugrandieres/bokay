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

    public function getDatas(){
        return $this->_datas;
    }

    public function getDatasFormat(){
        return $this->_datasFormat;
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

    public function curlPost(){
        $this->_ch = curl_init();
        curl_setopt($this->_ch, CURLOPT_URL, $this->_url);
        curl_setopt($this->_ch, CURLOPT_POST, true);
        curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $this->_datasFormat);
        curl_setopt($this->_ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer keyHbHQA7eqhOvZVB",
            "content-type:application/json"
        ));

        $this->_response = curl_exec($this->_ch);

        if (curl_getinfo($this->_ch, CURLINFO_HTTP_CODE) == 200) {
            traitementFormulaire::messageFlashValidation("Vos informations ont bien étés transmises", "page-commercant");
        } else {
            traitementFormulaire::messageFlashError("Une erreur est survenue, merci de recommencer la saisie", "page-commercant");
        }

    }
    
}