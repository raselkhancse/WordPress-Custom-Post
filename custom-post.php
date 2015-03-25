<?php

/**
* Registers a new post type created by Rasel Khan
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/

function add_post_type($name, $args_init = array()) {
		global $post_type_label_name;
		global $args_init;
		global $post_type_name;

	     $post_type_label_name = $name;
		  $post_type_name = strtolower(str_replace(' ', '_', 'csd_dsfd'));


	function custom_post_register(){
		global $post_type_label_name;
		global $args_init;
		global $post_type_name;


		// echo $post_type_name;



		// echo $name;


		$labels = array(
			'name'                => __( ucfirst($post_type_label_name)." "."Post", 'text-domain' ),
			'singular_name'       => __( ucfirst($post_type_label_name)." "."Post", 'text-domain' ),
			'add_new'             => _x( "Add New"." ".ucfirst($post_type_label_name), 'text-domain', 'text-domain' ),
			'add_new_item'        => __( "Add New"." ".ucfirst($post_type_label_name), 'text-domain' ),
			'edit_item'           => __( "Edit $post_type_label_name Name", 'text-domain' ),
			'new_item'            => __( "New $post_type_label_name Name", 'text-domain' ),
			'view_item'           => __( "View $post_type_label_name Name", 'text-domain' ),
			'search_items'        => __( "Search $post_type_label_name Name", 'text-domain' ),
			'not_found'           => __( "Not Any $post_type_label_name found", 'text-domain' ),
			'not_found_in_trash'  => __( "No $post_type_label_name Name found in Trash", 'text-domain' ),
			'parent_item_colon'   => __( "Parent $post_type_label_name Name", 'text-domain' ),
			'menu_name'           => __( ucfirst($post_type_label_name), 'text-domain' ),
		);

		$args = array(
			'labels'              => $labels,
			'hierarchical'        => false,
			'description'         => 'description',
			'taxonomies'          => array(),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => null,
			'menu_icon'           => null, //plugins_url('images/www.png', __FILE__),
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'supports'            => array(
				'title', 'editor', 'author', 'thumbnail',
				'excerpt','custom-fields', 'trackbacks', 'comments',
				'revisions', 'page-attributes', 'post-formats'
				),
			'taxonomies' => ['post_tag', 'category']
		
		);


		register_post_type( 'custompost', $args );
	}
	// End custom_post_register function()

	add_action( 'init', 'custom_post_register' );

}
// End add_post_type function()

// Start post type

$custompost_menu_name = get_option('custompost_menu_name');

if($custompost_menu_name){
	 add_post_type($custompost_menu_name);

}else{
	add_post_type('WPCustomPost');

}





/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function add_taxonomy($taxonomy_name, $post_type, $args = []){
	 $taxonomy_name = strtolower($taxonomy_name);

	add_action( 'init', function () use($taxonomy_name, $post_type, $args){

	$labels = array(
		'name'					=> _x( ucwords($taxonomy_name), 'Taxonomy plural name', 'text-domain' ),
		'singular_name'			=> _x( ucwords($taxonomy_name), 'Taxonomy singular name', 'text-domain' ),
		'search_items'			=> __( "Search $taxonomy_name Name", 'text-domain' ),
		'popular_items'			=> __( "Popular $taxonomy_name Name", 'text-domain' ),
		'all_items'				=> __( "All $taxonomy_name Name", 'text-domain' ),
		'parent_item'			=> __( "Parent $taxonomy_name Name", 'text-domain' ),
		'parent_item_colon'		=> __( "Parent $taxonomy_name Name", 'text-domain' ),
		'edit_item'				=> __( "Edit ".ucwords($taxonomy_name)." "."Name", 'text-domain' ),
		'update_item'			=> __( "Update $taxonomy_name Name", 'text-domain' ),
		'add_new_item'			=> __( "Add New ".ucwords($taxonomy_name)." "."Name", 'text-domain' ),
		'new_item_name'			=> __( "New ".ucwords($taxonomy_name)." "."Name", 'text-domain' ),
		'add_or_remove_items'	=> __( "Add or remove $taxonomy_name Name", 'text-domain' ),
		'choose_from_most_used'	=> __( 'Choose from most used text-domain', 'text-domain' ),
		'menu_name'				=> __( ucwords($taxonomy_name), 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy($taxonomy_name, $post_type, $args);
	});
}


// Start taxonomy

add_taxonomy('Template', 'custompost');

//  Add meta boxes
add_action('add_meta_boxes', function() {

	add_meta_box( 	'khan_custom_post',
					 'Custom Post title', 
					 'khan_custom_post_cb',
			 		 'custompost', 
			 		 'normal', 
			 		 'high'
			 		 // $callback_args 
			 		 );

});

function khan_custom_post_cb(){
	  global $post;

	  $url = get_post_meta( $post->ID, 'facebook_url',true );

	  wp_nonce_field( __FILE__, 'fb_url');
	?>
	   <label for="facebook_url">Facebook Url</label>
	   <input type="text" name="facebook_url" id="facebook_url" class="widefat" value="<?php echo $url; ?>">
	<?php
}

// Save Post

add_action('save_post', function(){
	  global $post;

	  if( @define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;

	  // verify nonce field
	     if($_POST && !wp_verify_nonce(isset($_POST['facebook_url']), __FILE__ )){
	     	return;
	     } 
       
         if(isset($_POST['facebook_url'])){

         	update_post_meta( $post->ID, 'facebook_url', $_POST['facebook_url']);
         }




} );

?>
	
