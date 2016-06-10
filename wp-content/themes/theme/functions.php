<?php

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

add_theme_support( 'post-thumbnails' );


// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
    'primary' => __( 'Главное меню', 'vlas' ),
    'about-holding' => __( 'О Холдинге', 'vlas' ),
    'press-center' => __( 'Пресс центр', 'vlas' ),
    'assets' => __( 'Активы', 'vlas' ),
    'cooperation' => __( 'Сотрудничество', 'vlas' )
) );

function register_my_menus() {
    register_nav_menus(
        array(
            'new-menu' => __( 'Новое меню' ),
            'another-menu' => __( 'Another Menu' ),
            'an-extra-menu' => __( 'An Extra Menu' )
        )
    );
}

/* Pagination */

function vlas_pagenavi() {
    global $wp_query;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
    $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
    $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = ''; //текст ссылки "Предыдущая страница"
    $a['next_text'] = ''; //текст ссылки "Следующая страница"

    if ($max > 1) echo '<div class="animated fadeInUp go navigation">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';
}