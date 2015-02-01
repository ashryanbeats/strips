	<?php get_header() ?>

		<?php while ( have_posts()) : the_post(); ?>
		<article>
			<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			<?php the_post_thumbnail('blog-thumb') ?>	
			<?php the_content() ?>
		</article>
		<?php endwhile ?>
		
	<?php get_footer() ?>