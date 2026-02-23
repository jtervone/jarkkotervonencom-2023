<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php wp_title("|", true, "right"); ?></title>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo get_site_icon_url(192); ?>" sizes="any" />
    <?php wp_head(); ?>
    <style><?php echo file_get_contents(get_theme_file_path('dist/main.css')); ?></style>
  </head>

  <body>
    <header>
      <div class="header">
        <?php if (have_posts() && !is_single() && !is_page()) { ?>
          <h1><a href="/">Jarkko Tervonen</a></h1>
        <?php } else { ?>
          <h2><a href="/">Jarkko Tervonen</a></h2>
        <?php } ?>

        <nav>
          <?php wp_nav_menu([
            "theme_location" => "menu-main-navigation",
          ]); ?>
        </nav>
      </div>
    </header>
    <main>
