	<?php get_header() ?>
			
			<?php while ( have_posts()) : the_post(); ?>
				<article>
					<!-- title -->
					<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					<!-- thumb image -->
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('blog-thumb'); ?></a>
					<!-- blog excerpt -->
					<?php the_excerpt() ?>
					<!--categories-->
					<?php locate_template('post-category.php', true, false) ?>
					<!--hr test -->
					<?php if( ($wp_query->current_post + 1) < ($wp_query->post_count) ) : ?>
						<!-- insert hr unless it's the last post. -->
						<hr style="clear: both;"/>
					<?php endif ?>
				</article>		
			<?php endwhile ?>

			<!-- post navigation -->
			<?php
				$page = get_page_by_title('Archives'); /*save the page object as a variable */ 
				$id = $page->ID; /*save the page id as a variable*/
			?> 
			<div class="archive-link-container">
				<?php posts_nav_link('', '<< Newer posts', 'Older posts >>') ?>
				<!--if a page titled Archives exists-->
				<?php if(get_page_by_title('Archives')) : ?>
					<br>
					<a href="<?php echo get_page_link($id); ?>">Browse the archives</a>
				<?php endif; ?>
			</div>	
					
	<?php get_footer() ?>