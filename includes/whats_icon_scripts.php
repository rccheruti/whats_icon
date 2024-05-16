<?php

add_action('wp_enqueue_scripts','whats_icon_add_scripts');
function whats_icon_add_scripts(){

    wp_enqueue_script(
        'whats_icon_js',
        plugins_url() . '/whats_icon/js/whats_icon_scripts.js',
        null,
        null,
        true
    );
}