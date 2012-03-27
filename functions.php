<?php

/**
 * @package WordPress
 * @subpackage Yoko-Tresiyo
 */
function yokoTresiyo_header_image_height($height) {
    return '250';
}

add_filter('yoko_header_image_height', 'yokoTresiyo_header_image_height');

function yokoTresiyo_after_setup_theme() {
    define('HEADER_IMAGE', get_stylesheet_directory_uri() . '/images/headers/tresiyo.jpg');

    register_default_headers(array(
        'tresiyo' => array(
            'url' => get_stylesheet_directory_uri() . '/images/headers/tresiyo.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/tresiyo-thumbnail.jpg',
            /* translators: header image description */
            'description' => __('TRESiYO', 'yoko')
        ),
        'parecidos-razonables' => array(
            'url' => get_stylesheet_directory_uri() . '/images/headers/parecidos-razonables.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/parecidos-razonables-thumbnail.jpg',
            /* translators: header image description */
            'description' => __('Parecidos Razonables', 'yoko')
        ),
        'parecidos-razonados' => array(
            'url' => get_stylesheet_directory_uri() . '/images/headers/parecidos-razonados.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/parecidos-razonados-thumbnail.jpg',
            /* translators: header image description */
            'description' => __('Parecidos Razonados', 'yoko')
        ),
        'y-como-se-hace' => array(
            'url' => get_stylesheet_directory_uri() . '/images/headers/y-como-se-hace.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/y-como-se-hace-thumbnail.jpg',
            /* translators: header image description */
            'description' => __('¿Y cómo se hace?', 'yoko')
        ),
        'daguerrotipo' => array(
            'url' => get_stylesheet_directory_uri() . '/images/headers/daguerrotipo.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/daguerrotipo-thumbnail.jpg',
            /* translators: header image description */
            'description' => __('Daguerrotipo', 'yoko')
        ),
        'diseccion' => array(
            'url' => get_stylesheet_directory_uri() . '/images/headers/diseccion.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/diseccion-thumbnail.jpg',
            /* translators: header image description */
            'description' => __('Disección', 'yoko')
        ),
        'evolucion' => array(
            'url' => get_stylesheet_directory_uri() . '/images/headers/evolucion.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/evolucion-thumbnail.jpg',
            /* translators: header image description */
            'description' => __('Evolución', 'yoko')
        ),
        'pildoras-de-viaje' => array(
            'url' => get_stylesheet_directory_uri() . '/images/headers/pildoras-de-viaje.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/pildoras-de-viaje-thumbnail.jpg',
            /* translators: header image description */
            'description' => __('Píldoras de viaje', 'yoko')
        ),
    ));
}

add_action('after_setup_theme', 'yokoTresiyo_after_setup_theme');
