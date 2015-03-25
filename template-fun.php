<?php 

function excerpt_length_link(){

    	return 20;

}
add_filter('excerpt_length', 'excerpt_length_link');


function read_more_link($more){
	global $post;
	$read_more = 'Read more';


   return '<a class="more" href="'.get_permalink($post->ID).'"> &nbsp;'.$read_more.'</a>';

}
add_filter('excerpt_more', 'read_more_link');




// add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
// function mw_enqueue_color_picker( $hook_suffix ) {
//     wp_enqueue_style( 'jquery' );
//     wp_enqueue_style( 'wp-color-picker' );
//     wp_enqueue_style( 'wp-color-json' );

//     wp_enqueue_script( 'my-script-handle', plugins_url('/js/jquery.js', __FILE__ ), array( 'jquery' ), false, true );
//     wp_enqueue_script( 'my-script-handle', plugins_url('/jscolor/jscolor.js', __FILE__ ), array( 'wp-color-json' ), false, true );
//     wp_enqueue_script( 'my-script-handle', plugins_url('/js/my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
// }





 ?>