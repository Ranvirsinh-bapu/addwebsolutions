<?php
function enqueue_custom_scripts() {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/style.css', array(), true);
    wp_enqueue_script('custom-ajax-filter', get_stylesheet_directory_uri() . '/js/custom-ajax-filter.js', array('jquery'), null, true);

    wp_localize_script('custom-ajax-filter', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax_filter_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
function create_posttype() {
    // Register Custom Post Type
    register_post_type(
        'resource',
        array(
            'labels' => array(
                'name' => __('Resources'),
                'singular_name' => __('Resource'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'resources'),
            'show_in_rest' => true,
            'supports' => array('title', 'thumbnail', 'editor', 'page-attributes', 'excerpt'),
        )
    );

    // Register Custom Taxonomy for Resource Type
    register_taxonomy(
        'resource_type',
        'resource',
        array(
            'label' => __('Resource Type'),
            'rewrite' => array('slug' => 'resource-type'),
            'hierarchical' => true,
        )
    );

    // Register Custom Taxonomy for Resource Topic
    register_taxonomy(
        'resource_topic',
        'resource',
        array(
            'label' => __('Resource Topic'),
            'rewrite' => array('slug' => 'resource-topic'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'create_posttype');


// AJAX filter function
function load_resources_by_ajax() {
    check_ajax_referer('ajax_filter_nonce', 'security');

    $args = array(
        'post_type' => 'resource',
        'posts_per_page' => -1,
    );

    if (isset($_POST['resource_type']) && !empty($_POST['resource_type'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'resource_type',
            'field' => 'slug',
            'terms' => sanitize_text_field($_POST['resource_type'])
        );
    }

    if (isset($_POST['resource_topic']) && !empty($_POST['resource_topic'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'resource_topic',
            'field' => 'slug',
            'terms' => sanitize_text_field($_POST['resource_topic'])
        );
    }

    if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
        $args['s'] = sanitize_text_field($_POST['keyword']);
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()): $query->the_post(); ?>
            <div class="resource-item">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="resource-thumbnail">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>
                <div class="resource-content">
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    else :
        echo 'No resources found';
    endif;

    die();
}

add_action('wp_ajax_load_resources', 'load_resources_by_ajax');
add_action('wp_ajax_nopriv_load_resources', 'load_resources_by_ajax');



