<?php
/*
Plugin Name: Airtable
Description: Envoie de données vers Airtable
Author: Matthieu GRANDIERES
Version: 1.0.0
*/
define( 'AIRTABLE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require_once( AIRTABLE__PLUGIN_DIR . 'classes/Commercant.php' );
require_once( AIRTABLE__PLUGIN_DIR . 'classes/Form.php' );
require_once( AIRTABLE__PLUGIN_DIR . 'services/apiAirtable.php' );
require_once( AIRTABLE__PLUGIN_DIR . 'services/traitementFormulaire.php' );

/**
 * Commerçant
 */
function createCommercant(){
    Form::createTextForm("nom", "Nom", "nom");
    Form::createTextForm("prenom", "Prenom", "prenom");
    Form::createTextForm("enseigne", "Enseigne", "enseigne");
    Form::createTextForm("email", "Email", "email");
    Form::createNumberForm("telephone", "Telephone", "telephone");
    Form::createTextForm("adresse", "Adresse", "adresse");
    Form::createTextForm("code_postal", "Code Postal", "code_postal");
    Form::createTextForm("ville", "Ville", "ville");
    Form::createSelectForm("categorie_commerce", "Catégorie de commerce", array('Alimentation', 'High Tech', 'Higiène', 'Santé et bien être', 'Autre'));
    Form::createSubmitForm("S'inscrire");
    
}

/**
 * Data commerçant
 */
function sendDatasCommercant(){
    /**
     * Vérification si les champs sont vide
     */
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['enseigne']) && !empty($_POST['email']) && !empty($_POST['telephone']) &&
    !empty($_POST['adresse']) && !empty($_POST['code_postal']) && !empty($_POST['ville']) && !empty($_POST['categorie_commerce'])) {

        /**
         * Vérification longueur min et max des champs
         */    
        if (traitementFormulaire::lenghtField(3, 20, $_POST['nom']) && traitementFormulaire::lenghtField(3, 20, $_POST['prenom']) &&
            traitementFormulaire::lenghtField(3, 50, $_POST['enseigne']) && traitementFormulaire::lenghtField(3, 50, $_POST['email']) && 
            traitementFormulaire::lenghtField(10, 15, $_POST['telephone']) && traitementFormulaire::lenghtField(5, 100, $_POST['adresse']) && 
            traitementFormulaire::lenghtField(5, 6, $_POST['code_postal']) && traitementFormulaire::lenghtField(3, 50, $_POST['ville']) && 
            traitementFormulaire::lenghtField(3, 30, $_POST['categorie_commerce'])) {


            /**
             * Vérification type des champs
             */
            if (is_string($_POST['nom']) && is_string($_POST['prenom']) && is_string($_POST['enseigne']) && is_string($_POST['email']) && is_numeric($_POST['telephone']) && 
            is_string($_POST['adresse']) && is_numeric($_POST['code_postal']) && is_string($_POST['ville']) && is_string($_POST['categorie_commerce'])) {

                /**
                 * Création d'un commerçant 
                 */
                $commercant = new Commercant(
                    traitementFormulaire::validationDatas($_POST['nom']),
                    traitementFormulaire::validationDatas($_POST['prenom']),
                    traitementFormulaire::validationDatas($_POST['enseigne']),
                    traitementFormulaire::validationDatas($_POST['email']),
                    traitementFormulaire::validationDatas($_POST['telephone']),
                    traitementFormulaire::validationDatas($_POST['adresse']),
                    traitementFormulaire::validationDatas($_POST['code_postal']),
                    traitementFormulaire::validationDatas($_POST['ville']),
                    traitementFormulaire::validationDatas($_POST['categorie_commerce'])
                );

                /**
                 * API Airtable
                 */
                $request = new apiAirtable($commercant, "https://api.airtable.com/v0/appBTp6tfN7x9ak16/Commer%C3%A7ants");
                $request->datasFormatJson();
                $request->curlPost("page-commercant");

            } else {
                traitementFormulaire::messageFlashError("Une erreur est survenu, problème de type de champs", "page-commercant");
            }

        } else {
            traitementFormulaire::messageFlashError("Une erreur est survenue, un ou plusieurs champs sont trop court ou trop long", "page-commercant");
        }

    } else {
        traitementFormulaire::messageFlashError("Une erreur est survenue, un ou plusieurs champs sont vides", "page-commercant");
    }

}

/**
 * Livreur
 */
function createFormLivreur(){
    Form::createTextForm("nom", "Nom", "nom");
    Form::createTextForm("prenom", "Prenom", "prenom");
    Form::createTextForm("email", "Email", "email");
    Form::createNumberForm("telephone", "Telephone", "telephone");
    Form::createSelectForm("type_vehicule", "Type de véhicule", array('Vélo', 'Scooter', 'Voiture'));
    Form::createSelectForm("secteur_geographique", "Secteur géographique", array('Ile de France', 'Normandie', 'Centre Val de Loire', 'Guadeloupe', 'Martinique', 'Guyanne'));
    echo "<label class='pt-2'>Ville où vous souhaitez travailler</label>";
    Form::createTextForm("ville", "Ville", "ville");
    Form::createTextForm("code_postal", "Code Postal", "code_postal");
    Form::createSelectForm("rayon_km", "Rayon en km", array('1-3km', '3-5km', '5-10km', '10-20km', '20-50km', '>50km'));
    Form::createSubmitForm("S'inscrire");
    
}

/**
 * Data livreur
 */
function sendDatasLivreur(){
/**
     * Vérification si les champs sont vide
     */
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['type_vehicule']) &&
    !empty($_POST['secteur_geographique']) && !empty($_POST['ville']) && !empty($_POST['code_postal']) && !empty($_POST['rayon_km']) ) {

        /**
         * Vérification longueur min et max des champs
         */    
        if (traitementFormulaire::lenghtField(3, 20, $_POST['nom']) && traitementFormulaire::lenghtField(3, 20, $_POST['prenom']) &&
            traitementFormulaire::lenghtField(3, 50, $_POST['email']) && traitementFormulaire::lenghtField(10, 15, $_POST['telephone']) && 
            traitementFormulaire::lenghtField(5, 20, $_POST['type_vehicule']) && traitementFormulaire::lenghtField(5, 20, $_POST['secteur_geographique']) && 
            traitementFormulaire::lenghtField(3, 50, $_POST['ville']) && traitementFormulaire::lenghtField(5, 6, $_POST['code_postal']) && 
            traitementFormulaire::lenghtField(3, 20, $_POST['rayon_km'])) {


            /**
             * Vérification type des champs
             */
            if (is_string($_POST['nom']) && is_string($_POST['prenom']) && is_string($_POST['email']) && is_numeric($_POST['telephone']) && is_string($_POST['telephone']) && 
            is_string($_POST['adresse']) && is_numeric($_POST['code_postal']) && is_string($_POST['ville']) && is_string($_POST['categorie_commerce'])) {

                /**
                 * Création d'un commerçant 
                 */
                $commercant = new Commercant(
                    traitementFormulaire::validationDatas($_POST['nom']),
                    traitementFormulaire::validationDatas($_POST['prenom']),
                    traitementFormulaire::validationDatas($_POST['enseigne']),
                    traitementFormulaire::validationDatas($_POST['email']),
                    traitementFormulaire::validationDatas($_POST['telephone']),
                    traitementFormulaire::validationDatas($_POST['adresse']),
                    traitementFormulaire::validationDatas($_POST['code_postal']),
                    traitementFormulaire::validationDatas($_POST['ville']),
                    traitementFormulaire::validationDatas($_POST['categorie_commerce'])
                );

                /**
                 * API Airtable
                 */
                $request = new apiAirtable($commercant, "https://api.airtable.com/v0/appBTp6tfN7x9ak16/Commer%C3%A7ants");
                $request->datasFormatJson();
                $request->curlPost("page-commercant");

            } else {
                traitementFormulaire::messageFlashError("Une erreur est survenu, problème de type de champs", "page-commercant");
            }

        } else {
            traitementFormulaire::messageFlashError("Une erreur est survenue, un ou plusieurs champs sont trop court ou trop long", "page-commercant");
        }

    } else {
        traitementFormulaire::messageFlashError("Une erreur est survenue, un ou plusieurs champs sont vides", "page-commercant");
    }
}