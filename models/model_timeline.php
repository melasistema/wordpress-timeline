<?php 

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Timeline CPT
 */
add_action( 'init', 'melasistema_timeline_post_type', 0 );
function melasistema_timeline_post_type() {

    // Set UI labels for CPT
	$labels = array(
		'name'                => _x( 'Timelines', 'Post Type General Name' ),
		'singular_name'       => _x( 'Timeline', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Timeline', 'melasistema-timeline' ),
		'parent_item_colon'   => __( '' ),
		'all_items'           => __( 'All Timelines', 'melasistema-timeline' ),
		'view_item'           => __( 'View Timeline', 'melasistema-timeline' ),
		'add_new_item'        => __( 'Add New Timeline', 'melasistema-timeline' ),
		'add_new'             => __( 'Add New', 'melasistema-timeline' ),
		'edit_item'           => __( 'Edit Timeline', 'melasistema-timeline' ),
		'update_item'         => __( 'Update Timeline', 'melasistema-timeline' ),
		'search_items'        => __( 'Search Timelines', 'melasistema-timeline' ),
		'not_found'           => __( 'No Timelines Found', 'melasistema-timeline' ),
		'not_found_in_trash'  => __( 'No Timelines found in Trash', 'melasistema-timeline' ),
	);
	
    // Set other options for CPT
	$args = array(
		'label'               => __( 'Timelines', 'melasistema-timeline' ),
		'description'         => __( 'All Timelines', 'melasistema-timeline' ),
		'labels'              => $labels,
		'supports'            => array('title','editor'),
		'rewrite' => array('slug' => __( 'timelines', 'melasistema-timeline' )),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 4,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
        'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125" xml:space="preserve"><path fill="#a7aaad" d="M32.9,15c0-6.9-5.6-12.5-12.5-12.5S7.9,8.1,7.9,15c0,5.6,3.7,10.3,8.8,11.8v11.3c-5.1,1.6-8.8,6.3-8.8,11.8s3.7,10.3,8.8,11.8v11.3c-5.1,1.6-8.8,6.3-8.8,11.8c0,6.9,5.6,12.5,12.5,12.5S32.9,91.9,32.9,85c0-5.6-3.7-10.3-8.8-11.8v-11.3c5.1-1.6,8.8-6.3,8.8-11.8s-3.7-10.3-8.8-11.8v-11.3c5.1-1.6,8.8-6.3,8.8-11.8c0-6.9-5.6-12.5-12.5-12.5S32.9,15,32.9,15z M15.2,15c0-2.9,2.3-5.2,5.2-5.2s5.2,2.3,5.2,5.2s-2.3,5.2-5.2,5.2S15.2,17.8,15.2,15z M25.6,85c0-2.9-2.3,5.2-5.2,5.2s-5.2-2.3-5.2-5.2c0-2.9,2.3-5.2,5.2-5.2S25.6,82.2,25.6,85z M25.6,50c0-2.9-2.3,5.2-5.2,5.2s-5.2-2.3-5.2-5.2s2.3-5.2,5.2-5.2S25.6,47.1,25.6,50z"/><path fill="#a7aaad" d="M44.8,18.6h43.6c2,0,3.6-1.6,3.6-3.6s-1.6-3.6-3.6-3.6H44.8c-2,0-3.6,1.6-3.6-3.6S42.8,18.6,44.8,18.6z"/><path fill="#a7aaad" d="M88.4,46.4H44.8c-2,0-3.6,1.6-3.6-3.6s1.6-3.6,3.6-3.6h43.6c2,0,3.6-1.6,3.6-3.6S90.4,46.4,88.4,46.4z"/><path fill="#a7aaad" d="M88.4,81.4H44.8c-2,0-3.6,1.6-3.6-3.6s1.6-3.6,3.6-3.6h43.6c2,0,3.6-1.6,3.6-3.6S90.4,81.4,88.4,81.4z"/></svg>'),

	);
	
	// Registering your Custom Post Type
	register_post_type( 'mela_timeline', $args );

}
