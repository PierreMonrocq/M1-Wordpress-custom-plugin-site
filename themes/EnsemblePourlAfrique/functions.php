<?php

if(!current_user_can('edit_posts')){
    show_admin_bar(false);
}

function theme_support(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header','En tête du menu');
    register_nav_menu('footer','Pied de page');
}

function theme_register_assets(){
    wp_register_script('bootstrap',get_template_directory_uri().'/scripts/bootstrap.min.js', ['jquery'], false, true);
    wp_deregister_script('jquery');
    wp_register_style('roboto',"https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700");
    wp_register_script('jquery',get_template_directory_uri().'/scripts/jquery-3.2.1.min.js',[],false,true);
    wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('fonta',get_template_directory_uri().'/css/font-awesome.min.css',array(),null);
    wp_enqueue_style('style',get_template_directory_uri().'/style.css');
    wp_enqueue_script('bootstrap');
    wp_enqueue_style('roboto');
   
}

function theme_menu_class($classes){

    $classes[] = 'nav-item';
    return $classes;
}

function theme_menu_link_class($attrs){

    $attrs['class'] = 'nav-link js-scroll-trigger';
    return $attrs;
}

function theme_init(){
    register_post_type('lettre',[
        'label' => 'Lettre information',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-email',
        'supports' => ['title','editor','thumbnail','comments'],
        'show_in_rest' => true,
        'show_in_menu' => true,
        'has_archive' => true,
        'hierarchical'  => false,
       
    ]);
    
    $labels = array(
        'name'                  => _x( 'Événements', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Événement', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Événements', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Événements', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Ajouter un nouvel', 'textdomain' ),
        'add_new_item'          => __( 'Ajouter un nouvel événement', 'textdomain' ),
        'new_item'              => __( 'Nouvel événement', 'textdomain' ),
        'edit_item'             => __( 'Editer l\'événement', 'textdomain' ),
        'view_item'             => __( 'Voir l\'événement', 'textdomain' ),
        'all_items'             => __( 'Tous les événements', 'textdomain' ),
        'search_items'          => __( 'Recherche un événement', 'textdomain' ),
        'not_found'             => __( 'Aucun événement trouvé.', 'textdomain' ),
        'not_found_in_trash'    => __( 'Aucun événement trouvé dans la corbeille.', 'textdomain' ),
        'featured_image'        => _x( 'Image couverture de l\'événement', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Ajouter une image de couverture', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Supprimer l\'image de couverture', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Utiliser comme image de couverture', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Archives des événements', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filtrer la liste des événements', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Liste des événements', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
    register_post_type('event',[
        'labels' => $labels,
        'public' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => ['title','excerpt','editor','thumbnail','comments'],
        'has_archive' => true,
        'show_in_menu' => true,
    ]);
}

function my_wp_nav_menu_args($args = '') {
    if(is_user_logged_in()) {
        $args['menu'] = 'logged-in';
    }
    else {
        $args['menu'] = 'logged-out';
    }
    return $args;
}
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args');

add_filter('wp_nav_menu_items', 'wti_loginout_menu_link', 10);

function wti_loginout_menu_link( $items ) {
      if (is_user_logged_in()) {
         $items .= '<li class="nav-item"><a href="'. "http://epa.rf.gd/forum/users/". wp_get_current_user()->data->user_nicename .'" class="nav-link js-scroll-trigger">Profil</a></li>';
         $items .= '<li class="nav-item"><a href="'. wp_logout_url() .'" class="nav-link js-scroll-trigger">Déconnexion</a></li>';
    }
   return $items;
}

function check_user_role($roles, $user_id = null) {
	if ($user_id) $user = get_userdata($user_id);
	else $user = wp_get_current_user();
	if (empty($user)) return false;
	foreach ($user->roles as $role) {
		if (in_array($role, $roles)) {
			return true;
		}
	}
	return false;
}

add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
         wp_redirect( home_url() );
         exit();
}

add_action('init', 'theme_init');
add_action('after_setup_theme', 'theme_support');
add_action('wp_enqueue_scripts','theme_register_assets');

add_filter('nav_menu_css_class','theme_menu_class');
add_filter('nav_menu_link_attributes', 'theme_menu_link_class');

require_once('metaboxes/event.php');
require_once('options/reunion.php');

EventMetaBox::register();
ReunionPage::register();

?>