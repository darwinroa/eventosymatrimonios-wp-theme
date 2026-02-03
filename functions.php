<?php
/*
 * This is the child theme for ListingHive theme, generated with Generate Child Theme plugin by catchthemes.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
add_action( 'wp_enqueue_scripts', 'eventos_y_matrimonios_enqueue_styles' );
function eventos_y_matrimonios_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
/*
 * Your code goes below
 */

function mdw_eventos_matrimonios_scripts() {
    wp_enqueue_style('mdw-styles', get_stylesheet_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('mdw-scripts', get_stylesheet_directory_uri() . '/assets/js/script.js');
    
    // 1. Estilos de Swiper (CDN)
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11.0.0' );

    // 2. Script de Swiper (CDN)
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mdw_eventos_matrimonios_scripts' );

function mdw_breadcrumbs() {
    // Configuraciones
    $separator  = ' / ';
    $home_title = 'Inicio';
    
    // Si es la página de inicio, no mostrar nada
    if ( is_front_page() ) {
        return '';
    }

    global $post;
    $output = '<nav class="mdw__breadcrumbs">';
    
    // Enlace al inicio
    $output .= '<a href="' . get_home_url() . '">' . $home_title . '</a>' . $separator;

    if ( is_category() || is_single() ) {
        // Mostrar categorías si es un post
        $cats = get_the_category( $post->ID );
        if( !empty($cats) ){
            $output .= '<a href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->name . '</a>' . $separator;
        }
        if ( is_single() ) {
            $output .= '<span>' . get_the_title() . '</span>';
        }
    } elseif ( is_page() ) {
        // Manejar páginas padre/hijo
        if ( $post->post_parent ) {
            $anc = get_post_ancestors( $post->ID );
            $anc = array_reverse( $anc );
            foreach ( $anc as $ancestor ) {
                $output .= '<a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a>' . $separator;
            }
        }
        $output .= '<span>' . get_the_title() . '</span>';
    }

    $output .= '</nav>';
    
    return $output;
}
add_shortcode( 'breadcrumbs', 'mdw_breadcrumbs' );