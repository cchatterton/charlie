<?php

// find'n replace Mytaxs & Mytax (as tax) and Mycpt (as cpt). *Remember to preseve case
// remember to include in functions.php

add_post_type_support( 'mycpt', 'page-attributes' );

function tax_mytax() {
	$labels = array(
		'name'              => _x( 'Mytax', 'taxonomy general name', 'bb_' ),
		'singular_name'     => _x( 'Mytax', 'taxonomy singular name', 'bb_' ),
		'search_items'      => __( 'Search Mytaxs', 'bb_' ),
		'all_items'         => __( 'All Mytaxs', 'bb_' ),
		'parent_item'       => __( 'Parent Mytax', 'bb_' ),
		'parent_item_colon' => __( 'Parent Mytax:', 'bb_' ),
		'edit_item'         => __( 'Edit Mytax', 'bb_' ),
		'update_item'       => __( 'Update Mytax', 'bb_' ),
		'add_new_item'      => __( 'Add New Mytax', 'bb_' ),
		'new_item_name'     => __( 'New Mytax', 'bb_' ),
		'menu_name'         => __( 'Mytaxs', 'bb_' ),
	);
	$args = array(
		'labels'                => $labels,
		'hierarchical'          => true, // true = categories & false = tags
		'public' 															=> true,
		'show_ui' 														=> true,
		'show_tagcloud' 								=> true,
		'show_in_nav_menus' 				=> true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_generic_term_count',
		'query_var'             => 'mytax',
		'rewrite'               => array( 'slug' => 'mytax', 'bb_' ),
	);
	register_taxonomy( 'mytax', array( 'mycpt', 'bb_' ), $args );
}
add_action( 'init', 'tax_mytax', 0 );

?>