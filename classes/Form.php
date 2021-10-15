<?php

class Form{

    public static function createTextForm($el, $label, $id){
        echo <<<HTML
        <label>$label</label>
        <input type="text" class="form-control" id=$id name=$el>   
HTML;
    }

    public static function createNumberForm($el, $label, $id){
        echo <<<HTML
        <label>$label</label>
        <input type="number" class="form-control" id=$id name=$el>   
HTML;
    }

    public static function createSelectForm($el, $label, $selected){
        echo <<<HTML
        <label for="formGroupExampleInput">$label</label>
        <select type="text" class="custom-select" id="formGroupExampleInput" name=$el>   
            <option selected>$selected</option>
            <option value="Alimentation">Alimentation</option>
            <option value="Santé et bien être">Santé et bien être</option>
            <option value="Maison">Maison</option>
            <option value="High tech">High tech</option>
            <option value="Autre">Autre</option>
        </select>
HTML;
    }

    public static function createSubmitForm($label){
        echo '
        <div class="button-submit mt-4 d-flex justify-content-center">
            <input class="btn btn-primary mb-4" type="submit" value="'. $label . '">
        </div>';

    }
}