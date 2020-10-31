<?php

function register_post_type_noticias() {

    // post type customizado

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

    // taxonomia customizada

    $pluralTax = 'Temas';
    $singularTax = 'Tema';
    
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
    
    register_taxonomy('tema', 'noticias', $argsTax);

}



add_theme_support('post-thumbnails');
add_action('init', 'register_post_type_noticias');
