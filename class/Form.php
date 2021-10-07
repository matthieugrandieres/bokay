<?php

class Form{

    public static function createTextForm($el, $label){
        echo <<<HTML
        <label for="formGroupExampleInput">$label</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name=$el>   
HTML;
    }

    public static function createSelectForm($el, $label, $selected){
        echo <<<HTML
        <label for="formGroupExampleInput">$label</label>
        <select type="text" class="custom-select" id="formGroupExampleInput" name=$el>   
            <option selected>$selected</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
HTML;
    }

    public static function createSubmitForm($label){
        echo '
        <div class="button-submit mt-4 d-flex justify-content-center">
            <input class="btn btn-primary" type="submit" value="'. $label . '">
        </div>';

    }
}