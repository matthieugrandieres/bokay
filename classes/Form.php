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

    public static function createSelectForm($el, $label, $values){

        echo '<label for="formGroupExampleInput">' . $label . '</label>' . 
        '<select type="text" class="custom-select" id="formGroupExampleInput" name=' . $el . '>' 
            ?>
            <?php 
            for ($i = 0; $i < count($values); $i++){
                echo '<option value=' . $values[$i] . '>' . $values[$i] . '</option>';
            }?>
        </select><?php
    }

    public static function createSubmitForm($label){
        echo '
        <div class="button-submit mt-4 d-flex justify-content-center">
            <input class="btn btn-primary mb-4" type="submit" value="'. $label . '">
        </div>';

    }
}