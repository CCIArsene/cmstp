<?php
/*
Plugin Name: Mon Premier Plugin
Description: Un plugin de test pour apprendre les bases.
Version: 1.0
Author: Votre Nom
*/

// Hook pour afficher un message en haut du site
add_action('wp_head', 'afficher_message_bienvenue');

function afficher_message_bienvenue() {
    echo '<p style="text-align: center; background-color: #f0f0f0; padding: 10px;">Bienvenue sur mon site WordPress!</p>';
}


function db($userAttributes) {
    global $wpdb;
    
    // DEFAULT attributes
    $defaultAttributes = [
        "max" => "56"
    ];

    // MERGE default attributes and user attributes
    $finalAttributes = shortcode_atts($defaultAttributes, $userAttributes);
    $max = $finalAttributes["max"];

    //SQL
    $sql = <<< SQL
    SELECT *
    FROM wp_posts
    WHERE post_type = 'post' AND post_status = 'publish'
    LIMIT $max
    SQL;

    //Extract data
    $data = $wpdb->get_results($sql);

    // prepare result string
    $result = ' ';
    foreach($data as $row) {
        // TODO
    }

    return $result;
}


