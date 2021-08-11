<?php 
function enquescripts(){
    wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/assets/plugins/bootstrap/bootstrap.min.js');
	wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/assets/plugins/js/admin_script.js');
    
    wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/plugins/bootstrap/bootstrap.min.css');
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts','enquescripts');

function admin_scripts(){
	wp_enqueue_script(
		'masking',
		"https://unpkg.com/jquery-input-mask-phone-number@1.0.14/dist/jquery-input-mask-phone-number.js"
		// 'https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js',
		// array(),
		// "3.3.4"

	);
	wp_enqueue_script('admin-js',get_template_directory_uri().'/assets/js/admin_script.js');

}
add_action('admin_print_scripts','admin_scripts');


 
?>
