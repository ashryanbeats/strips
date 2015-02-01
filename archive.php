	<?php get_header() ?>
	
			<div class="well well-archive"> 
				<!-- main archive title -->
				<!--<div class="col-sm-5"> -->
					<h4 id="archive-well-title">This is the archive for</h4>
						<?php if (is_category()) : ?>
							<div class="catpill">
							<?php single_cat_title() ?></div>
						<?php elseif (is_tag()) : ?>
							<div class="catpill">
							<?php single_tag_title() ?></div>
						<?php elseif (is_day()) : ?>
							<div class="catpill">
							<?php echo get_the_date() ?></div>
						<?php elseif (is_month()) : ?>
							<div class="catpill">
							<?php echo get_the_date('F Y') ?></div>
						<?php elseif (is_year()) : ?>
							<div class="catpill">
							<?php echo get_the_date('Y') ?></div>
						<?php else : ?>
							your selection.
						<?php endif ?>

				<!-- </div> -->
				<!-- nav link list
				<div class="col-sm-6">
					<div class="row">
						<ul class="archive-well-list">
							<div class="col-sm-6">
								<li><a href="<?php echo home_url(); ?>">Go to the front page</a></li>
							</div>
							<div class="col-sm-6">
								<?php if(get_page_by_title('Archives')) : ?>
									<?php
										$page = get_page_by_title('Archives'); /*save the page object as a variable */ 
										$id = $page->ID; /*save the page id as a variable*/
									?> 
								<li><a href="<?php echo get_page_link($id); ?>">Browse all archives</a></li>
								<?php endif;?>
							</div>
						</ul>
					</div>
				</div> -->
			<hr>
			
			<!-- the archive posts -->
			<?php while ( have_posts()) : the_post(); ?>
				<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('blog-thumb') ?></a>
				<p class="excerpt"><?php the_excerpt() ?></p>

				<?php locate_template('post-category.php', true, false) ?>			
				<?php if( ($wp_query->current_post + 1) < ($wp_query->post_count) ) : ?>
					<!-- Do something unless it's the last post. -->
					<hr style="clear: both;"/>
				<?php endif ?>
				</article>
			<?php endwhile ?>
		
			<div class="archive-link-container">
				<?php posts_nav_link('', '<< Newer posts', 'Older posts >>') ?>
			</div>
		</div>
		
		<!--if a page titled Archives exists-->
		<?php if(get_page_by_title('Archives')) : ?>
		<?php
			$page = get_page_by_title('Archives'); /*save the page object as a variable */ 
			$id = $page->ID; /*save the page id as a variable*/
		?> 
		
		<div class="archive-link-container">
			<a href="<?php echo get_page_link($id); ?>">Browse the archives</a>
		</div>
		<?php endif;?>

		
	<?php get_footer() ?>