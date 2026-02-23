<?php

require_once "hooks.php";

register_nav_menus([
  "menu-main-navigation" => "Main Navigation",
]);

add_theme_support("post-thumbnails");

add_action('wp_enqueue_scripts', function() {
    // Poista admin bar tyylien etusivulta (ei admin-käyttäjille)
    if (!is_user_logged_in()) {
        wp_dequeue_style('admin-bar');
        wp_dequeue_style('dashicons');
        wp_dequeue_style('yoast-seo-adminbar');
    }
});

add_action('wp_enqueue_scripts', function() {
    if (!is_admin()) {
        // Poista blokkieditorin CSS etusivulta
        wp_dequeue_style('wp-block-library');
        // Klassisen teeman CSS vain jos tarvitaan
        wp_dequeue_style('classic-theme-styles');
    }
});

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
  return "...";
}

add_filter("excerpt_more", "wpdocs_excerpt_more");

// Remove emoji scripts and styles
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rsd_link');

// Remove default WP favicon/site icon output (we'll add our own minimal one)
add_filter('site_icon_meta_tags', '__return_empty_array');

// Disable tag, category, author and comment feeds
add_action('template_redirect', function () {
    if (is_feed()) {
        // Allow main site feed, block everything else
        if (is_tag() || is_category() || is_author() || is_comment_feed() || is_search()) {
            wp_redirect(home_url(), 301);
            exit;
        }
    }
});

// Remove feed links from <head>
remove_action('wp_head', 'feed_links_extra', 3);

// Remove tag/category feed links from archives
add_filter('feed_links_extra_show_tag_feed', '__return_false');
add_filter('feed_links_extra_show_category_feed', '__return_false');
