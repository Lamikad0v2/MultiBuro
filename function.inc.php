<?php
/*
    CLERC Pierre-François le 10/05/2017 
    Modifier le 08/04/2019
    function.inc.php
    Fichier de fonction pour le TD08 de SI6 BTS SIO
*/

/**
 * Procédure qui génère et affichage un champ
 * @param array $argv (libelle, type, name, value, size, disabled)
 */
function displayInput($argv)
{
    $tmp = '<div>';
    if(isset($argv['libelle']) === true)
        $tmp .= '<label>'.$argv['libelle'].'</label>';
    $tmp .= '<input';
    // [optionnel]Type
    if(isset($argv['type']) === true)
        $tmp .= ' type="'.$argv['type'].'"';
    else
        $tmp .= ' type="text"';
    // [optionnel]Name
    if(isset($argv['name']) === true)
        $tmp .= ' name="'.$argv['name'].'"';
    // [optionnel]Value
    if(isset($argv['value']) === true)
        $tmp .= ' value="'.$argv['value'].'"';
    else
        $tmp .= ' value=""';
    // [optionnel]Size
    if(isset($argv['size']) === true)
        $tmp .= ' size="'.$argv['size'].'"';
    // [optionnel]Readonly
    if(isset($argv['disabled']) && $argv['disabled'] === true)
        $tmp .= ' disabled';
    $tmp .= ' /></div>';
    // Affichage
    echo $tmp;
}

/**
 * Procédure qui génère et affichage une liste déroulante
 * @param array $argv (libelle, name, list, value, disabled)
 */
function displaySelect($argv)
{
    $tmp = '<div>';
    if(isset($argv['libelle']) === true)
        $tmp .= '<label>'.$argv['libelle'].'</label>';
    $tmp .= '<select';
    // [optionnel]Name
    if(isset($argv['name']) === true)
        $tmp .= ' name="'.$argv['name'].'"';
    // [optionnel]Readonly
    if(isset($argv['disabled']) && $argv['disabled'] === true)
        $tmp .= ' disabled';
    $tmp .= ' />';
    // List
    foreach($argv['list'] as $key => $value)
    {
        $tmp .= '<option value="'.$key.'"';
        if(isset($argv['value']) === true && $argv['value'] == $key)
            $tmp .= 'selected="selected"';
        $tmp .= '>'.$value.'</option>';
    }
    $tmp .= '</select></div>';
    // Affichage
    echo $tmp;
}

/**
 * Procédure qui génère et affichage un bouton
 * @param array $argv (type, name, value, href, onclick, disabled, center)
 */
function displayButton($argv)
{
    // [optionnel]Type
    if(isset($argv['center']) === true)
        $tmp = '<div class="center">';
    else
        $tmp = '<div>';
    $tmp .= '<input';
    // [optionnel]Type
    if(isset($argv['type']) === true)
        $tmp .= ' type="'.$argv['type'].'"';
    else
        $tmp .= ' type="button"';
    // [optionnel]Name
    if(isset($argv['name']) === true)
        $tmp .= ' name="'.$argv['name'].'"';
    // [optionnel]Value
    if(isset($argv['value']) === true)
        $tmp .= ' value="'.$argv['value'].'"';
    else
        $tmp .= ' value="Valider"';
    // [optionnel]Href
    if(isset($argv['href']) === true)
        $tmp .= ' onclick="window.location.href=\''.$argv['href'].'\'"';
    // [optionnel]OnClick
    if(isset($argv['onclick']) === true)
        $tmp .= ' onclick="'.$argv['onclick'].'"';
    // [optionnel]Disabled
    if(isset($argv['disabled']) && $argv['disabled'] === true)
        $tmp .= ' disabled';
    $tmp .= ' /></div>';
    // Affichage
    echo $tmp;
}


?>
