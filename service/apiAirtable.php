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
            "Nom" => "Dubost",
            "Prénom" => "Jean",
            "Enseigne" => "Paul",
            "Email" => "jean.dupont@exemple.com",
            "Téléphone" => "0765895623",
            "Code postal" => 37000,
            "Catégorie de commerce" => "Alimentation"
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




    }
    
}