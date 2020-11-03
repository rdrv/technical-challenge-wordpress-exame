<?php

// theme supports
add_theme_support('post-thumbnails');

// custom post type noticias

function register_post_type_noticias() {

    // cria um post type customizado

    $plural = 'Notícias';
    $singular = 'Notícia';
    $descricao = 'Dashboard para Notícias';

    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'add_new' => 'Adicionar ' . $singular,
        'add_new_item' => 'Adicionar nova ' . $singular,
        'edit_item' => 'Editar ' . $singular,
        'featured_image' => 'Capa da ' . $singular,
        'set_featured_image' => 'Clique para escolher uma capa',
        'remove_featured_image' => 'Remover Capa da ' . $singular,
        'use_featured_image' => 'Usar Imagem como Capa da ' . $singular,
    );

    $supports = array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'description' => $descricao,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'supports' => $supports,
        'show_in_rest' => true,
    );

    register_post_type( 'noticias', $args );

    // cria taxonomia customizada

    $pluralTax = 'Categorias';
    $singularTax = 'Categoria';

    $labelsTax = array(
        'name' => $pluralTax,
        'singular_name' => $singularTax,
        'edit_item' => 'Editar ' . $singularTax,
        'add_new_item' => 'Adicionar novo ' . $singularTax,
        'search_items' => 'Pesquisar ' . $pluralTax
    );

    $argsTax = array(
        'labels' => $labelsTax,
        'public' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true
    );

    register_taxonomy('categorias', 'noticias', $argsTax);

}

// custom post type noticias - return post thumbnail url in api 

function get_post_img_for_api( $object ) {

    $more_post_meta['image_url'] = get_the_post_thumbnail_url( $object['id'], 'large' );    

    return $more_post_meta;
}

function create_api_posts_img_field() {
 
    register_rest_field( 'noticias', 'main_image', array(
       'get_callback'    => 'get_post_img_for_api',
       'schema'          => null,
    	)
	);

}

// custom post type noticias - return post taxonomy in api 

function get_post_taxonomy_for_api( $object ) {

    $more_post_taxonomy['taxonomy_names'] = wp_get_object_terms( $object['id'], 'categorias');

    return $more_post_taxonomy;
}

function create_api_posts_taxonomy_field() {
 
    register_rest_field( 'noticias', 'taxonomy', array(
       'get_callback'    => 'get_post_taxonomy_for_api',
       'schema'          => null,
    	)
	);

}

// instancia custom post type noticia

add_action('init', 'register_post_type_noticias');
add_action( 'rest_api_init', 'create_api_posts_img_field' );
add_action( 'rest_api_init', 'create_api_posts_taxonomy_field' );

// menu do tema

function register_nav_menu_tema() {
    register_nav_menu('header-menu', 'main-menu');
}

add_action('init', 'register_nav_menu_tema');

// set page title dinamicamente

function set_title() {
    bloginfo('name');
    if( !is_home() && !is_tax('categorias') ) {
        echo ' | ';
        the_title();
    }
    if( is_tax('categorias') ) {
        echo ' | ';
        single_term_title();
    }
}

// limpando o dash dos editores

function remove_menus() {

    // pega current login user's role
    $roles = wp_get_current_user()->roles;
     
    // testa user's role
    if( !in_array('editor',$roles)){
        return;
    }
     
    //removendo itens do menu:

    //Dashboard
    remove_menu_page( 'index.php' );

    //Default Posts
    remove_menu_page( 'edit.php' );

    //Comments
    remove_menu_page( 'edit-comments.php' );

    //Appearance
    remove_menu_page( 'themes.php' );

    //Plugins
    remove_menu_page( 'plugins.php' );
    
    //Users
    remove_menu_page( 'users.php' );

    //Tools
    remove_menu_page( 'tools.php' );

    //Settings
    remove_menu_page( 'options-general.php' );

    //Pages
    remove_menu_page( 'edit.php?post_type=page' );

}

add_action( 'admin_menu', 'remove_menus' , 100 );



