<?php

require_once "hooks.php";

register_nav_menus([
  "menu-main-navigation" => "Main Navigation",
]);

add_theme_support("post-thumbnails");

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
