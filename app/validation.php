<?php

$validation = true;


if(empty($form_name)){
    $validation = false;
    echo "<p>*Ingresa un nombre</pclass=>"; 
} else {
    if(strlen($form_name)>20){
        echo "<p>*El nombre es muy largo</p>";
    }
    if(filter_var($form_name,FILTER_VALIDATE_INT)){
        echo "<p>*El nombre debe de ser un texto</p>";
    }
}

if(empty($form_lastname)){
    $validation = false;
    echo "<p>*Ingresa un apellido</p>";
} else {
    if(strlen($form_lastname)>20){
        echo "<p>*El apellido es muy largo</p>";
    }
    if(filter_var($form_lastname,FILTER_VALIDATE_INT)){
        echo "<p>*El apellido debe de ser un texto</p>";
    }
}

if(empty($form_age)){
    $validation = false;
    echo "<p>*Ingresa una edad</p>";
} else {
    if (!is_numeric($form_age)) {
        echo "<p>*Debes ingresar una edad correcta</p>";
    }
    if ($form_age >=99 || $form_age<=1 || $form_age==0) {
        echo "<p>*La edad no corresponde</p>";
    }
}


if ($form_phone >1199999999) {
    $validation = false;
    echo "<p>*El numero de telefono no corresponde</p>";
}


