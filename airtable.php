<?php
/*
Plugin Name: Airtable
Description: Envoie de données vers Airtable
Author: Matthieu GRANDIERES
Version: 1.0.0
*/
define( 'AIRTABLE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require_once( AIRTABLE__PLUGIN_DIR . 'class/Commercant.php' );
require_once( AIRTABLE__PLUGIN_DIR . 'class/Form.php' );
require_once( AIRTABLE__PLUGIN_DIR . 'service/apiAirtable.php' );
require_once( AIRTABLE__PLUGIN_DIR . 'service/traitementFormulaire.php' );

function createCommercant(){
    $commercant = new Commercant("GRANDIERES", "Matthieu", "Enseigne", "Email", "Telephone", "Adresse", "Code Postal", "Paris", "Catégorie");
    Form::createTextForm("nom", "Nom");
    Form::createTextForm("prenom", "Prenom");
    Form::createTextForm("enseigne", "Enseigne");
    Form::createTextForm("email", "Email");
    Form::createTextForm("telephone", "Telephone");
    Form::createTextForm("adresse", "Adresse");
    Form::createTextForm("code_postal", "Code Postal");
    Form::createSelectForm("categorie_commerce", "Catégorie de commerce", "Choisir une catégorie");
    Form::createSubmitForm("S'inscrire");
    //var_dump($commercant->getNom());
    
}