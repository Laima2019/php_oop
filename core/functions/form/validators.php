<?php

function validate_fields_match($filtered_input, &$form, $params)
{
    $match = true;

    foreach ($params as $field_id) {
        $ref_value = $ref_value ?? $filtered_input[$field_id];
        if ($ref_value != $filtered_input[$field_id]) {
            $match = false;
            break;
        }
    }

    if (!$match) {
        $form['fields'][$field_id]['error'] = 'Laukai nesutampa!';
        return false;
    }

    return true;
}

function validate_not_empty($field_value, &$field)
{
    if (strlen($field_value) == 0) {
        $field['error'] = 'Laukas privalo būti netuščias';
    } else {
        return true;
    }
}

function validate_is_number($field_value, &$field)
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Įveskite skaičių!';
    } else {
        return true;
    }
}

function validate_is_positive($field_value, &$field)
{
    if ($field_value < 0) {
        $field['error'] = 'Įveskite teigiamą skaičių.';
    } else {
        return true;
    }
}

function validate_no_space($field_value, &$field)
{
    if (preg_match('/\s/', $field_value)) {
        $field['error'] = 'Laukelyje neturi būti tarpų.';
    } else {
        return true;
    }
}
function validate_phone_number($field_value, &$field)
{
    if (!preg_match("/^\+3706[0-9]{7}$/", $field_value)) {
        $field['error'] = 'Telefono numeris įvestas neteisingai.';
    } else {
        return true;
    }
}
    function validate_ranking($field_value, &$field){
        if ($field_value < 0 || $field_value > 5 ){
         $field['error'] = 'Įvertinimas gali būti nuo 0 iki 5.' ;
        } else {
        return true;

}
}
