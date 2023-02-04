<?php
if ( ! function_exists('custom_post_types') ) {
    function custom_post_types()
    {
        $labels = array(
            'name' => _x('Офферы', 'Post Type General Name', 'xpartners'),
            'singular_name' => _x('Офферы', 'Post Type Singular Name', 'xpartners'),
            'menu_name' => __('Офферы', 'xpartners'),
            'name_admin_bar' => __('Офферы', 'xpartners'),
            'archives' => __('Офферы', 'xpartners'),
            'all_items' => __('Офферы', 'xpartners'),
            'add_new_item' => __('Добавить оффер', 'xpartners'),
            'add_new' => __('Добавить оффер', 'xpartners'),
            'new_item' => __('Добавить оффер', 'xpartners'),
            'edit_item' => __('Редактировать оффер', 'xpartners'),
            'update_item' => __('Обновить оффер', 'xpartners'),
            'view_item' => __('Просмотреть', 'xpartners'),
            'view_items' => __('Просмотреть офферы', 'xpartners'),
            'search_items' => __('Найти оффер', 'xpartners'),
            'not_found' => __('Не найдено', 'xpartners'),
            'not_found_in_trash' => __('Не найдено в корзине', 'xpartners'),
            'featured_image' => __('Изображение', 'xpartners'),
            'set_featured_image' => __('Установить изображение', 'xpartners'),
            'remove_featured_image' => __('Удалить изображение', 'xpartners'),
            'use_featured_image' => __('Использовать изображение', 'xpartners'),
            'insert_into_item' => __('Вставить в оффер', 'xpartners'),
            'uploaded_to_this_item' => __('Загрузить в оффер', 'xpartners'),
            'items_list' => __('Список записей', 'xpartners'),
            'items_list_navigation' => __('офферы', 'xpartners'),
            'filter_items_list' => __('Фильтровать', 'xpartners'),
        );
        $args = array(
            'label' => __('Офферы', 'xpartners'),
            'labels' => $labels,
            'supports' => array('title', 'custom-fields', 'revisions','thumbnail', 'excerpt'),
            'hierarchical' => true,
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'menu_position' => 2,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'rewrite' => array('slug' => 'offers', 'with_front' => false)

        );
        register_post_type('offers', $args);
        /*$labels = array(
            'name' => _x('Платежные системы', 'taxonomy general name', 'pdl24'),
            'singular_name' => _x('Платежные системы', 'taxonomy singular name', 'pdl24'),
            'search_items' => __('Найти Платежные системы', 'pdl24'),
            'all_items' => __('Все Платежные системы', 'pdl24'),
            'edit_item' => __('Редактировать', 'pdl24'),
            'update_item' => __('Обновить', 'pdl24'),
            'add_new_item' => __('Добавить', 'pdl24'),
            'new_item_name' => __('Новая категория', 'pdl24'),
            'menu_name' => __('Платежные системы', 'pdl24'),
        );

        $args = array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'pay'),
        );

        register_taxonomy('pay', array('offers'), $args);*/
    }
    add_action( 'init', 'custom_post_types', 0);
}
