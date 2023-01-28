<?php

function wp_aricle_load_assets()
{

    wp_register_style('wp_aricle_style', WF_aricle_URL . 'assets/css/articleStyleCss.css?v=version100.8');
    wp_enqueue_style('wp_aricle_style');
    wp_register_script('wp_aricle_script', WF_aricle_URL . 'assets/js/articleJs.js',['jquery']);
    wp_enqueue_script('wp_aricle_script');
    
}


add_action('wp_enqueue_scripts', 'wp_aricle_load_assets');
