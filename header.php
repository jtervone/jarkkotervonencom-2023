<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php wp_title("|", true, "right"); ?></title>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>">
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
