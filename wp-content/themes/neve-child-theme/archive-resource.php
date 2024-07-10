<?php
/**
 * Template Name: Resource Archive
 *
 * This is the template for displaying a resource archive.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Neve-child
 * @subpackage Template
 * @since 1.0.0
 */

 get_header(); ?>
<div class="resource-title"><h1>Resource</h1></div>
<div id="resource-filter">
    <select id="resource_type">
        <option value="">Resource Type</option>
        <?php
        $terms = get_terms('resource_type');
        foreach ($terms as $term) {
            echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
        }
        ?>
    </select>

    <select id="resource_topic">
        <option value="">Resource Topic</option>
        <?php
        $terms = get_terms('resource_topic');
        foreach ($terms as $term) {
            echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
        }
        ?>
    </select>

    
    <button id="filter">Filter</button>
    <?php get_search_form(); ?>
</div>

<div id="resource-container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
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
            <?php
        endwhile;
    endif;
    ?>
</div>
 
 <?php get_footer(); ?>
 