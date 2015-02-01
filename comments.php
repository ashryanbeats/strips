	<?php if (have_comments()) : ?>
		<div id="comments" class="well">
			<ul class="comment-list">
				<?php wp_list_comments(array('format' => 'html5')) ?>
			</ul>
			<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
				<nav id="comment-navigation">
					<?php previous_comments_link() ?>
					<?php next_comments_link() ?>
				</nav>
			<?php endif ?>
		</div>
	<?php endif ?>
	<?php comment_form(
		array(
			//gets rid of the "You may use these HTML tags and attributes" notice
			'comment_notes_after' => '',
		) 
	); ?>