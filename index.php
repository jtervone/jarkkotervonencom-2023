<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
			<?php if (has_post_thumbnail()) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php echo get_the_post_thumbnail(null, ["800", "800"]); ?>
				</a>
			<?php } ?>

			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<h2>
					<?php the_title(); ?>
				</h2>
			</a>

			<div class="details">
				<time class="post-date" datetime="<?php the_time("Y-m-d") ?>">
					<?php the_time("j.n.Y") ?>
				</time>

				<p>Aiheet: <?php echo get_the_category_list(", "); ?></p>
			</div>


			<?php
			if (is_search() || !is_singular()) {
				the_excerpt();
			} else {
				the_content(__("Continue reading"));
			}
			?>

			<a class="readmore" href="<?php the_permalink(); ?>">Lue lisää</a>

			<p class="tags">
				Tunnisteet: <?php echo get_the_tag_list(); ?>
			</p>

		</article>
	<?php endwhile;
else : ?>
	<p><?php _e("Sorry, no posts matched your criteria."); ?></p>
<?php endif; ?>

<?php
	global $wp_query;
	if ($wp_query->max_num_pages > 1) {
 	echo '<nav role="navigation" class="pagination">';
		echo paginate_links([
			"prev_text" => "← EDELLINEN",
			"next_text" => "SEURAAVA →",
		]);
 	echo '</nav>';
	}
?>


<?php get_footer(); ?>