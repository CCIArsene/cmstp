<?php
/*
Plugin Name: video
Description: Un plugin pour afficher la météo
Version: 1.0
Author: Arsene
*/

function video($content) {

    $content = shortcode_atts(
        array(
            'site' => 'youtube',
            'code' => 'qkuxg6-YCVo',
            'width' => '640',
            'height' => '480'
        ),
        $content,
        'video'
    );

    
    $url = array(
        'youtube' => 'https://www.youtube.com/embed/',
        'vimeo' => 'https://player.vimeo.com/video/'
    );


    if (array_key_exists($content['site'], $url)) {
        $embed_url = $url[$content['site']] . $content['code'];
    }

    $output = '<iframe width="' . esc_attr($content['width']) . '" height="' . esc_attr($content['height']) . '" src="' . esc_url($embed_url) . '" frameborder="0" allowfullscreen></iframe>';

    return $output;
}

add_shortcode('video', 'video');

