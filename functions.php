<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
//Custom post type 
//
// Register Custom Post Type
function mise_au_point_post_type() {

	$labels = array(
		'name'                  => _x( 'Mises au points', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Mise au point', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Mise au point', 'text_domain' ),
		'name_admin_bar'        => __( 'Mise au point', 'text_domain' ),
		'archives'              => __( 'Archive des mises au point', 'text_domain' ),
		'attributes'            => __( 'Attribu des mises au point', 'text_domain' ),
		'parent_item_colon'     => __( 'Mise au point parent', 'text_domain' ),
		'all_items'             => __( 'Toutes les mises au point', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une mise au point', 'text_domain' ),
		'add_new'               => __( 'Ajouter une nouvelle', 'text_domain' ),
		'new_item'              => __( 'Nouvelle mise au point', 'text_domain' ),
		'edit_item'             => __( 'Éditer la mise au point', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour la mise au point', 'text_domain' ),
		'view_item'             => __( 'Voir la mise au point', 'text_domain' ),
		'view_items'            => __( 'Voir les mises au point', 'text_domain' ),
		'search_items'          => __( 'Rechercher une mise au point', 'text_domain' ),
		'not_found'             => __( 'Mise au point non trouvé', 'text_domain' ),
		'not_found_in_trash'    => __( 'Pas trouvé dans la poubelle', 'text_domain' ),
		'featured_image'        => __( 'Image de la mise au point', 'text_domain' ),
		'set_featured_image'    => __( 'Définir l\'image de la mise au point', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image de la mise au point', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans la mise au point', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Téléverser la mise au point', 'text_domain' ),
		'items_list'            => __( 'Liste de mises au point', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation de liste de mise au point', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer les mises au point', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Mise au point', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'mise_au_point', $args );

}
add_action( 'init', 'mise_au_point_post_type', 0 );

// Register Custom Post Type
function post_type_slideshow() {

	$labels = array(
		'name'                  => _x( 'Diaporama', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Diaporama', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Diaporama', 'text_domain' ),
		'name_admin_bar'        => __( 'Diaporama', 'text_domain' ),
		'archives'              => __( 'Archives des diapositives', 'text_domain' ),
		'attributes'            => __( 'Attributs des diapositives', 'text_domain' ),
		'parent_item_colon'     => __( 'Diapositive parente', 'text_domain' ),
		'all_items'             => __( 'Toutes les diapositives', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une diapositive', 'text_domain' ),
		'add_new'               => __( 'Ajouter diapositive', 'text_domain' ),
		'new_item'              => __( 'Nouvelle diapositive', 'text_domain' ),
		'edit_item'             => __( 'Modifier diapositive', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour la diapositive', 'text_domain' ),
		'view_item'             => __( 'Voir la diapositive', 'text_domain' ),
		'view_items'            => __( 'Voir les diapositives', 'text_domain' ),
		'search_items'          => __( 'Rechercher une diapositive', 'text_domain' ),
		'not_found'             => __( 'Pas trouver', 'text_domain' ),
		'not_found_in_trash'    => __( 'Pas trouver dans la poubelle', 'text_domain' ),
		'featured_image'        => __( 'Arrière plan de la diapositive', 'text_domain' ),
		'set_featured_image'    => __( 'Définir l\'arrière plan de la diapositive', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'arrière pan', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image d\'arrière plan', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans la diapositive', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Téléverser dans cette diapositive', 'text_domain' ),
		'items_list'            => __( 'Liste des diapositives', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation de la liste des diapositives', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer les Liste des diapositives', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Diaporama', 'text_domain' ),
		'description'           => __( 'Diaporama de la page d\'acceuil', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest' 			=> true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-slides',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'slideshow', $args );

}
add_action( 'init', 'post_type_slideshow', 0 );

// Register Custom Post Type
function custom_post_type_media() {

	$labels = array(
		'name'                  => _x( 'Médias sociaux', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Média social', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Médias sociaux', 'text_domain' ),
		'name_admin_bar'        => __( 'Médias sociaux', 'text_domain' ),
		'archives'              => __( 'Archive du média social', 'text_domain' ),
		'attributes'            => __( 'Attribut du média social', 'text_domain' ),
		'parent_item_colon'     => __( 'Média parent', 'text_domain' ),
		'all_items'             => __( 'Tout les médias sociaux', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter un média social', 'text_domain' ),
		'add_new'               => __( 'Ajouter nouveau', 'text_domain' ),
		'new_item'              => __( 'Nouveau média social', 'text_domain' ),
		'edit_item'             => __( 'Modifier le média social', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour le média social', 'text_domain' ),
		'view_item'             => __( 'Voir le média social', 'text_domain' ),
		'view_items'            => __( 'Voir les médias sociaux', 'text_domain' ),
		'search_items'          => __( 'Rechercher les médias sociaux', 'text_domain' ),
		'not_found'             => __( 'Pas trouver', 'text_domain' ),
		'not_found_in_trash'    => __( 'Pas trouver dans la poubelle', 'text_domain' ),
		'featured_image'        => __( 'Logo du média social', 'text_domain' ),
		'set_featured_image'    => __( 'Définir le logo du média social', 'text_domain' ),
		'remove_featured_image' => __( 'Enlever le logo du média social', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme logo du média social', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans le média social', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Téléverser dans le média social', 'text_domain' ),
		'items_list'            => __( 'Liste des médias sociaux', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation des médias sociaux', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer les médias sociaux', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Média social', 'text_domain' ),
		'description'           => __( 'Liste des médias sociaux pour le site de la boutique Messier bicyclettes', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-share-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'medias_sociaux', $args );

}
add_action( 'init', 'custom_post_type_media', 0 );

// Register Custom Post Type
function custom_post_type_rando() {

	$labels = array(
		'name'                  => _x( 'Randos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Rando ', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Randos', 'text_domain' ),
		'name_admin_bar'        => __( 'Randos', 'text_domain' ),
		'archives'              => __( 'Archive des randos', 'text_domain' ),
		'attributes'            => __( 'Attribut des randos', 'text_domain' ),
		'parent_item_colon'     => __( 'Rando parente', 'text_domain' ),
		'all_items'             => __( 'Toutes les randos', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une rando', 'text_domain' ),
		'add_new'               => __( 'Ajouter nouveau', 'text_domain' ),
		'new_item'              => __( 'Nouvelle rando', 'text_domain' ),
		'edit_item'             => __( 'Modifier la rando', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour la rando', 'text_domain' ),
		'view_item'             => __( 'Voir la rando', 'text_domain' ),
		'view_items'            => __( 'Voir les randos', 'text_domain' ),
		'search_items'          => __( 'Rechercher les randos', 'text_domain' ),
		'not_found'             => __( 'Pas trouver', 'text_domain' ),
		'not_found_in_trash'    => __( 'Pas trouver dans la poubelle', 'text_domain' ),
		'featured_image'        => __( 'Bannier de la rando', 'text_domain' ),
		'set_featured_image'    => __( 'Définir la banniere de la rando', 'text_domain' ),
		'remove_featured_image' => __( 'Enlever la banniere de la rando', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme banniere de la randos', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans la rando', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Téléverser dans la randos', 'text_domain' ),
		'items_list'            => __( 'Liste des randos', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation des randos', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer les randos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Rando', 'text_domain' ),
		'description'           => __( 'Liste des randos de produit pour le site de la boutique Messier bicyclettes', 'text_domain' ),
		'labels'                => $labels,
		'show_in_rest' => true,
		'supports'              => array( 'title', 'editor','thumbnail', 'custom-fields' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'rando', $args );

}
add_action( 'init', 'custom_post_type_rando', 0 );
// Register Custom Post Type
function custom_post_type_marque() {

	$labels = array(
		'name'                  => _x( 'Marques', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Marque', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Marques', 'text_domain' ),
		'name_admin_bar'        => __( 'Marques', 'text_domain' ),
		'archives'              => __( 'Archive des marques', 'text_domain' ),
		'attributes'            => __( 'Attribut des marques', 'text_domain' ),
		'parent_item_colon'     => __( 'Marque parente', 'text_domain' ),
		'all_items'             => __( 'Toutes les marques', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une marque', 'text_domain' ),
		'add_new'               => __( 'Ajouter nouveau', 'text_domain' ),
		'new_item'              => __( 'Nouvelle marque', 'text_domain' ),
		'edit_item'             => __( 'Modifier la marque', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour la marque', 'text_domain' ),
		'view_item'             => __( 'Voir la marque', 'text_domain' ),
		'view_items'            => __( 'Voir les marques', 'text_domain' ),
		'search_items'          => __( 'Rechercher les marques', 'text_domain' ),
		'not_found'             => __( 'Pas trouver', 'text_domain' ),
		'not_found_in_trash'    => __( 'Pas trouver dans la poubelle', 'text_domain' ),
		'featured_image'        => __( 'Logo de la marque', 'text_domain' ),
		'set_featured_image'    => __( 'Définir le logo de la marque', 'text_domain' ),
		'remove_featured_image' => __( 'Enlever le logo de la marque', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme logo de la marques', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans la marque', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Téléverser dans la marques', 'text_domain' ),
		'items_list'            => __( 'Liste des marques', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation des marques', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer les marques', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Marque', 'text_domain' ),
		'description'           => __( 'Liste des marques de produit pour le site de la boutique Messier bicyclettes', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-universal-access-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'marque', $args );

}
add_action( 'init', 'custom_post_type_marque', 0 );

function custom_post_type_service() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Services', 'text_domain' ),
		'name_admin_bar'        => __( 'Services', 'text_domain' ),
		'archives'              => __( 'Archive du service', 'text_domain' ),
		'attributes'            => __( 'Attribut du service', 'text_domain' ),
		'parent_item_colon'     => __( 'Média parent', 'text_domain' ),
		'all_items'             => __( 'Tout les services', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter un service', 'text_domain' ),
		'add_new'               => __( 'Ajouter nouveau', 'text_domain' ),
		'new_item'              => __( 'Nouveau service', 'text_domain' ),
		'edit_item'             => __( 'Modifier le service', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour le service', 'text_domain' ),
		'view_item'             => __( 'Voir le service', 'text_domain' ),
		'view_items'            => __( 'Voir les services', 'text_domain' ),
		'search_items'          => __( 'Rechercher les services', 'text_domain' ),
		'not_found'             => __( 'Pas trouver', 'text_domain' ),
		'not_found_in_trash'    => __( 'Pas trouver dans la poubelle', 'text_domain' ),
		'featured_image'        => __( 'Image du service', 'text_domain' ),
		'set_featured_image'    => __( 'Définir le image du service', 'text_domain' ),
		'remove_featured_image' => __( 'Enlever le image du service', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image du service', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans le service', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Téléverser dans le service', 'text_domain' ),
		'items_list'            => __( 'Liste des services', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation des services', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer les services', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'text_domain' ),
		'description'           => __( 'Liste des services pour le site de la boutique Messier bicyclettes', 'text_domain' ),
		'labels'                => $labels,
		'show_in_rest' => true,
		'supports'              => array( 'title', 'editor','thumbnail', 'custom-fields'),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-screenoptions',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'services', $args );

}
add_action( 'init', 'custom_post_type_service', 0 );

function custom_post_type_option() {

	$labels = array(
		'name'                  => _x( 'Options', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Option', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Options', 'text_domain' ),
		'name_admin_bar'        => __( 'Options', 'text_domain' ),
		'archives'              => __( 'Archive des options', 'text_domain' ),
		'attributes'            => __( 'Attribut des options', 'text_domain' ),
		'parent_item_colon'     => __( 'Option parente', 'text_domain' ),
		'all_items'             => __( 'Toutes les options', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une option', 'text_domain' ),
		'add_new'               => __( 'Ajouter nouvelle', 'text_domain' ),
		'new_item'              => __( 'Nouvelle option', 'text_domain' ),
		'edit_item'             => __( 'Modifier la option', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour la option', 'text_domain' ),
		'view_item'             => __( 'Voir la option', 'text_domain' ),
		'view_items'            => __( 'Voir les options', 'text_domain' ),
		'search_items'          => __( 'Rechercher les options', 'text_domain' ),
		'not_found'             => __( 'Pas trouver', 'text_domain' ),
		'not_found_in_trash'    => __( 'Pas trouver dans la poubelle', 'text_domain' ),
		'featured_image'        => __( 'Logo de la option', 'text_domain' ),
		'set_featured_image'    => __( 'Définir le logo de la option', 'text_domain' ),
		'remove_featured_image' => __( 'Enlever le logo de la option', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme logo de la options', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans la option', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Téléverser dans la options', 'text_domain' ),
		'items_list'            => __( 'Liste des options', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation des options', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer les options', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Option', 'text_domain' ),
		'description'           => __( 'Liste des options', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'custom-fields' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-generic',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'option', $args );

}
add_action( 'init', 'custom_post_type_option', 0 );



function register_my_menu() {
	register_nav_menu('footer-menu',__( 'Menu du footer' ));
  }
  add_action( 'init', 'register_my_menu' );
