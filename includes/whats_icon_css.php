<?php

add_action(
    'wp_enqueue_scripts',
    'whats_icon_style'
);

function whats_icon_style() {
    wp_enqueue_style(
        'whats_icon_styles',
        plugins_url().'/whats_icon/css/whats_icon_styles.css'
    );
}