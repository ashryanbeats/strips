	<?php get_header() ?>
	<?php /*
		Template Name: Archives page
		*/
	?>

			<h2>Archives</h2>
			<?php the_post_thumbnail('blog-thumb') ?>
			<h3>Past posts by category</h3>
			<div>
			<?php wp_list_categories(array(
				'title_li'=>'', 
				'hierarchical'=>0
				)
			); ?>
			</div>
			<h3>Past posts by month</h3>
			<?php wp_get_archives(array(
				'type'=>'monthly', 
				'format'=>'custom',
				'before'=>'<div class="catpill">',
				'after'=>'</div>'
				)
			); ?>
		
	<?php get_footer() ?>