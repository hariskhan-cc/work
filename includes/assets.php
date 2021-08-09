<?php 
function enquescripts(){
    wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/assets/plugins/bootstrap/bootstrap.min.js');
    wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/plugins/bootstrap/bootstrap.min.css');
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts','enquescripts');