<?php
/*
Plugin Name: weather2
Description: Un plugin pour afficher la météo
Version: 1.0
Author: Arsene
*/


function weather2($content) {
    // Définir les attributs par défaut
    $content = shortcode_atts(
        array(
            'code' => '561210', 
            'color' => '#3D6AA2'
        ),
        $content,
        'weather2'
    );

    $code = esc_attr($content['code']);
    $color = esc_attr($content['color']);

    // Retourner le code de l'iframe
    $output = '<iframe id="widget_autocomplete_preview" frameborder="0" src="https://meteofrance.com/widget/prevision/' . $code . '##' . $color . '"></iframe>';
    return $output;
}

// Ajouter le shortcode
add_shortcode('weather2', 'weather2');
