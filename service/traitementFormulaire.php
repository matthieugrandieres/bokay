<?php 

class traitementFormulaire {

    public static function validationDatas($data){
        /**
         * Pour les espace inutiles
         */
        $data = trim($data);
        /**
         * Pour les antislashes
         */
        $data = stripslashes($data);
        /**
         * Pour les balises
         */
        $data = htmlspecialchars($data);

        return $data;
    }

    public static function lenghtField($min, $max, $field){
        if (strlen($field) < $min || strlen($field) > $max){
            return false;
        } else {
            return true;
        }
    }
}