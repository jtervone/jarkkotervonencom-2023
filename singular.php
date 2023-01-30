<?php get_header(); ?>

<?php

if (has_post_thumbnail()) {
  echo get_the_post_thumbnail(null, ["800", "800"]);
}

?>

<h1><?php the_title(); ?></h1>

<?php if (get_post_type() !== 'page') : ?>
  <div class="details">
    <time class="post-date" datetime="<?php the_time("Y-m-d") ?>">
      <?php the_time("j.n.Y") ?>
    </time>
    <p>Aiheet: <?php echo get_the_category_list(", "); ?></p>
  </div>
<?php endif; ?>

<?php the_content(__("Continue reading")); ?>

<?php if (get_the_tag_list()) : ?>
  <p class="tags">
    Tunnisteet: <?php echo get_the_tag_list(); ?>
  </p>
<?php endif; ?>

<div>
  <?php

  if (comments_open() || get_comments_number()) {
    comments_template();
  }

  ?>
</div>

<div class="author">
  <p>
    Kirjoittaja eli
    <?php echo get_the_author_meta("first_name", get_post_field("post_author")); ?>
    <?php echo get_the_author_meta("last_name", get_post_field("post_author")); ?>
    on
    <?php echo get_the_author_meta("description", get_post_field("post_author")); ?>
  </p>
</div>

<?php get_footer(); ?>
