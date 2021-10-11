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

function createCommercant(){
    $commercant = new Commercant("GRANDIERES", "Matthieu", "Enseigne", "Email", "Telephone", "Adresse", "Code Postal", "Paris", "Catégorie");
    Form::createTextForm("nom", "Nom");
    Form::createTextForm("prenom", "Prenom");
    Form::createTextForm("enseigne", "Enseigne");
    Form::createTextForm("email", "Email");
    Form::createNumberForm("telephone", "Telephone");
    Form::createTextForm("adresse", "Adresse");
    Form::createNumberForm("code_postal", "Code Postal");
    Form::createTextForm("ville", "Ville");
    Form::createSelectForm("categorie_commerce", "Catégorie de commerce", "Choisir une catégorie");
    Form::createSubmitForm("S'inscrire");
    
}

function sendCommercant(){
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