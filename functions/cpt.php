<?php 

// Register Custom Taxonomy
function legal_topic() {

	$labels = array(
		'name'                       => _x( 'Legal Topics', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Legal Topic', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Legal Topic', 'text_domain' ),
		'all_items'                  => __( 'All Legal Topics', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Legal Topic', 'text_domain' ),
		'add_new_item'               => __( 'Add Legal Topic', 'text_domain' ),
		'edit_item'                  => __( 'Edit Legal Topic', 'text_domain' ),
		'update_item'                => __( 'Update Legal Topic', 'text_domain' ),
		'view_item'                  => __( 'View Legal Topic', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),

	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite' => array('slug' => 'legal-information/legal-topic', 'with_front' => false),
	);
	register_taxonomy( 'legal_topic', array( 'resource' ), $args );

}
add_action( 'init', 'legal_topic', 0 );

// Register Custom Post Type
function resource_cpt() {

	$labels = array(
		'name'                  => _x( 'Legal Information', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Legal Information', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Legal Information', 'text_domain' ),
		'name_admin_bar'        => __( 'Legal Information', 'text_domain' ),
		'archives'              => __( 'Legal Information Archives', 'text_domain' ),
		'attributes'            => __( 'Legal Information Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Legal Information', 'text_domain' ),
		'add_new_item'          => __( 'Add New Legal Information', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Legal Information', 'text_domain' ),
		'edit_item'             => __( 'Edit Legal Information', 'text_domain' ),
		'update_item'           => __( 'Update Legal Information', 'text_domain' ),
		'view_item'             => __( 'View Legal Information', 'text_domain' ),
		'view_items'            => __( 'View Legal Information', 'text_domain' ),
		'search_items'          => __( 'Search Legal Information', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Legal Information', 'text_domain' ),
		'description'           => __( 'Custom post for resources', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'page-attributes' ),
		'show_in_rest'			=> 'true',
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' => array('slug' => 'legal-information', 'with_front' => false),
	);
	register_post_type( 'resource', $args );

}
add_action( 'init', 'resource_cpt', 0 );

function reg_tag() {
     register_taxonomy_for_object_type('post_tag', 'resource');
}
add_action('init', 'reg_tag');



// Register Custom Taxonomy
function legal_subtopic() {

	$labels = array(
		'name'                       => _x( 'Legal Subtopics', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Legal Subtopic', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Legal Subtopic', 'text_domain' ),
		'all_items'                  => __( 'All Legal Subtopics', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Legal Subtopic', 'text_domain' ),
		'add_new_item'               => __( 'Add Legal Subtopic', 'text_domain' ),
		'edit_item'                  => __( 'Edit Legal Subtopic', 'text_domain' ),
		'update_item'                => __( 'Update Legal Subtopic', 'text_domain' ),
		'view_item'                  => __( 'View Legal Subtopic', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'legal_subtopic', array( 'resource' ), $args );

}
add_action( 'init', 'legal_subtopic', 0 );

// Register Custom Taxonomy
function content_type() {

	$labels = array(
		'name'                       => _x( 'Content Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Content Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Content Type', 'text_domain' ),
		'all_items'                  => __( 'All Content Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Content Type', 'text_domain' ),
		'add_new_item'               => __( 'Add Content Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Content Type', 'text_domain' ),
		'update_item'                => __( 'Update Content Type', 'text_domain' ),
		'view_item'                  => __( 'View Content Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'content_type', array( 'resource' ), $args );

}
add_action( 'init', 'content_type', 0 );
?>