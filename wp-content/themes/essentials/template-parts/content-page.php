<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pixfort theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry-content2'); ?>>


	<?php
	if (post_password_required()) {
	?>
		<div class="pix-main-intro-placeholder"></div>
		<div class="container">
			<?php the_content(); ?>
		</div>
	<?php
	} else {
		the_content();
	}


	wp_link_pages(array(
		'before' => '<div class="page-links">' . esc_attr__('Pages:', 'essentials'),
		'after'  => '</div>',
	));
	?>

	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'essentials'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->