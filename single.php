	<?php get_header() ?>
		<?php while ( have_posts()) : the_post(); ?>

			<article>
			<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

			<?php the_post_thumbnail('large', array('class' => 'aligncenter')) ?>
			<!-- shows the featured image caption -->
			<?php echo '<span class="feat-caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>'; ?>
			<?php the_content() ?>

			<?php locate_template('post-category.php', true, false) ?>			
			</article>
		<?php endwhile ?>
		
	<?php get_footer() ?>