<?php
/*
Plugin Name: weather1
Description: Un plugin pour afficher la météo
Version: 1.0
Author: Arsene
*/

function weather1() {


    $output = '<iframe id="widget_autocomplete_preview" frameborder="0" src="https://meteofrance.com/widget/prevision/561210"></iframe>';
    return $output;
}

add_shortcode('weather1', 'weather1');
